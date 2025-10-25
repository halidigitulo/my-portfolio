<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = invoice::select('no_invoice','client_id','terima_dari','tgl_invoice','jumlah','status','keterangan')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('client', function ($client) {
                    return optional($client->client)->nama ?: 'N/A';
                })
                ->editColumn('jumlah', function ($row) {
                    return 'Rp ' . number_format($row->jumlah, 0, ',', '.');
                })
                ->addColumn('aksi', function ($invoice) {
                    if (!auth()->user()->can('invoice.update') && !auth()->user()->can('invoice.delete')) {
                        return '<span class="text-muted">No Access</span>';
                    }
                    $paidButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-primary paid-invoice" data-id="' . $invoice->id . '" name="edit" title="Update Status"><span class="tf-icons bx bx-check-square"></span></button>';

                    $editButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-warning edit-invoice" data-id="' . $invoice->id . '" name="edit" title="Edit"><span class="tf-icons bx bxs-edit"></span></button>';

                    $deleteButton = '<button type="button" class="btn btn-sm btn-outline-danger btn-icon hapus-invoice" data-id="' . $invoice->id . '" name="edit" title="Hapus"><span class="tf-icons bx bx-trash"></span></button>';

                    $spasi = ' ';
                    if ($invoice->status === 1) {
                        // Jika sudah paid, tombol paid tidak ditampilkan
                        $printButton = '<button type="button" class="btn btn-sm btn-icon btn-outline-success print-invoice" data-id="' . $invoice->id . '" name="edit" title="Print"><span class="tf-icons bx bx-printer"></span></button>';
                        // return $printButton . ' ' . $spasi . ''. $editButton . ' ' . $spasi . ' ' . $deleteButton;
                        return $printButton;
                    }
                    return $paidButton . ' ' . $spasi . '' . $editButton . ' ' . $spasi . ' ' . $deleteButton;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        $clients = Client::all();
        return view('admin.invoice.index', compact('clients'));
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $invoice = [

            'client_id' => 'nullable|string',
            'terima_dari' => 'nullable|string',
            'tgl_invoice' => 'nullable|date',
            'due_date' => 'nullable|date',
            'jumlah' => 'nullable|numeric',
            'status' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ];

        $validatedData = $request->validate($invoice);
        $invoice = $id ? invoice::findOrFail($id) : new invoice();

        if (!$id) {
            $tahun = date('y');
            $bulan = date('m');
            $hari  = date('d');

            $lastInvoice = Invoice::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $bulan)
                ->whereDay('created_at', $hari)
                ->orderBy('no_invoice', 'desc')
                ->first();

            $nextNumber = $lastInvoice
                ? str_pad(((int) substr($lastInvoice->no_invoice, -4)) + 1, 4, '0', STR_PAD_LEFT)
                : "0001";

            $validatedData['no_invoice'] = "INV{$tahun}{$bulan}{$hari}{$nextNumber}";
        }

        if ($request->client_id == 'lainnya') {
            $validatedData['client_id'] = null;  // Set client_id ke null jika memilih "Lainnya"
        }

        // Save invoice data
        $invoice->fill($validatedData)->save();

        return response()->json([
            'message' => $id ? 'Invoice updated successfully!' : 'Invoice created successfully!',
            // 'icon' => $invoice->icon ?? null
        ]);
    }

    public function updateStatus($id, Request $request)
    {
        // Temukan invoice berdasarkan ID
        $invoice = Invoice::find($id);

        if ($invoice) {
            // Update status invoice
            $invoice->status = 1;  // Contoh: 'paid'
            $invoice->save();

            return response()->json(['success' => true, 'message' => 'Status invoice berhasil diperbarui']);
        }

        return response()->json(['success' => false, 'message' => 'Invoice tidak ditemukan'], 404);
    }

    public function print($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);

        // Konversi nominal ke terbilang
        $terbilang = $this->terbilang($invoice->jumlah);
        return view('admin.invoice.print', compact('invoice', 'terbilang'));
    }

    // Fungsi terbilang (Bahasa Indonesia)
    private function terbilang($angka)
    {
        $angka = abs($angka);
        $baca = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        $hasil = "";

        if ($angka < 12) {
            $hasil = " " . $baca[$angka];
        } elseif ($angka < 20) {
            $hasil = $this->terbilang($angka - 10) . " Belas";
        } elseif ($angka < 100) {
            $hasil = $this->terbilang(intval($angka / 10)) . " Puluh" . $this->terbilang($angka % 10);
        } elseif ($angka < 200) {
            $hasil = " Seratus" . $this->terbilang($angka - 100);
        } elseif ($angka < 1000) {
            $hasil = $this->terbilang(intval($angka / 100)) . " Ratus" . $this->terbilang($angka % 100);
        } elseif ($angka < 2000) {
            $hasil = " Seribu" . $this->terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            $hasil = $this->terbilang(intval($angka / 1000)) . " Ribu" . $this->terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            $hasil = $this->terbilang(intval($angka / 1000000)) . " Juta" . $this->terbilang($angka % 1000000);
        }

        return trim($hasil);
    }

    public function edit($id)
    {
        if (!Auth::user()->can('invoice.update')) {
            abort(403, 'Anda tidak punya akses untuk mengedit invoice');
        }
        $invoice = Invoice::findOrFail($id);
        return response()->json($invoice);
    }

    public function destroy($id)
    {
        if (!Auth::user()->can('invoices.delete')) {
            abort(403, 'Anda tidak punya akses untuk menghapus invoice');
        }
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return response()->json([
            'message' => 'Invoice successfully deleted.',
        ]);
    }
}
