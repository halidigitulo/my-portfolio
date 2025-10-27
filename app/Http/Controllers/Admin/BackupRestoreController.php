<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BackupRestoreController extends Controller
{
    private $backupPath = 'backups';

    public function index()
    {
        $files = Storage::files($this->backupPath);
        return view('admin.backup.index', compact('files'));
    }

    public function backup(Request $request)
    {
        $database = env('DB_DATABASE');
        $tables = DB::select('SHOW TABLES');
        $key = "Tables_in_{$database}";
        $sqlDump = "";

        foreach ($tables as $tableObj) {
            $table = $tableObj->$key;

            // === Struktur tabel
            $createTable = DB::select("SHOW CREATE TABLE `$table`")[0]->{'Create Table'};
            $sqlDump .= "DROP TABLE IF EXISTS `$table`;\n";
            $sqlDump .= $createTable . ";\n\n";

            // === Data tabel
            $rows = DB::table($table)->get();
            if ($rows->count() > 0) {
                foreach ($rows as $row) {
                    $values = array_map(function ($value) {
                        return is_null($value) ? 'NULL' : DB::getPdo()->quote($value);
                    }, (array) $row);

                    $sqlDump .= "INSERT INTO `$table` (`" . implode("`, `", array_keys((array)$row)) . "`) VALUES (" . implode(", ", $values) . ");\n";
                }
                $sqlDump .= "\n";
            }
        }

        // === Simpan file
        $fileName = "backup_" . date("Y-m-d_H-i-s") . ".sql";
        $backupPath = public_path('downloads');
        if (!File::exists($backupPath)) {
            File::makeDirectory($backupPath, 0777, true);
        }

        $fileName = "backup_" . date('Y-m-d_H-i-s') . ".sql";
        $filePath = $backupPath . '/' . $fileName;

        File::put($filePath, $sqlDump);
        // Storage::put("{$fileName}", $sqlDump);

        return response()->json([
            'success' => true,
            'message' => 'Backup berhasil dibuat',
            'download_url' => route('backup-restore.download', urlencode($fileName)),
        ]);
    }

    public function list()
    {
        $path = public_path('downloads'); // folder tujuan backup
        $files = File::files($path);
        $data = [];

        foreach ($files as $file) {
            $filename = $file->getFilename();
            $data[] = [
                'name' => $filename,
                'size' => round($file->getSize() / 1024, 2) . ' KB',
                'date' => date('Y-m-d H:i:s', $file->getMTime()),
                'action' => view('admin.backup.actions', compact('filename'))->render()
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function download($file)
    {
        $file = urldecode($file);
        $path = public_path("downloads/{$file}");

        if (File::exists($path)) {
            return response()->download($path);
        }

        abort(404, 'File tidak ditemukan');
    }

    // Delete file
    public function delete($file)
    {
        $file = urldecode($file);
        $path = public_path("downloads/{$file}");

        if (File::exists($path)) {
            File::delete($path);
            return response()->json([
                'success' => true,
                'message' => 'Backup berhasil dihapus'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'File tidak ditemukan'
        ], 404);
    }

    public function restore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:sql,txt',
        ]);

        $sql = file_get_contents($request->file('file')->getRealPath());

        // pecah per query
        $queries = array_filter(array_map('trim', explode(";", $sql)));

        DB::beginTransaction();
        try {
            foreach ($queries as $query) {
                if (!empty($query)) {
                    DB::statement($query);
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Restore berhasil!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Restore gagal: ' . $e->getMessage()]);
        }
    }

    public function reset()
    {
        try {
            // DB::beginTransaction();

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Hapus data dari tabel
            DB::table('clients')->truncate();
            DB::table('invoices')->truncate();
            DB::table('posts')->truncate();
            DB::table('products')->truncate();
            DB::table('product_stack')->truncate();
            DB::table('projects')->truncate();
            DB::table('services')->truncate();
            // DB::table('stacks')->truncate();
            DB::table('testimonis')->truncate();

            DB::statement('ALTER TABLE clients AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE invoices AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE posts AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE products AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE product_stack AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE projects AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE services AUTO_INCREMENT = 1');
            // DB::statement('ALTER TABLE stacks AUTO_INCREMENT = 1');
            DB::statement('ALTER TABLE testimonis AUTO_INCREMENT = 1');

            // DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
