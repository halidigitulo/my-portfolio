<?php

namespace App\Helpers;

use Carbon\Carbon;

class FormatHelper
{
    public static function hariTanggalIndonesia($date)
    {
        if (!$date) return null;

        // Gunakan Carbon untuk parsing
        return Carbon::parse($date)
            ->locale('id') // bahasa Indonesia
            ->translatedFormat('l, d F Y');
        // contoh output: Rabu, 21 Agustus 2025
    }

    /**
     * Hitung lama hari termasuk +1
     * contoh: 2024-09-01 s/d 2024-09-02 = 2 hari
     */
    public static function lamaHari($tanggal_tugas, $tanggal_selesai = null)
    {
        $start = Carbon::parse($tanggal_tugas);

        // Jika tanggal_selesai tidak diisi → return 1 hari
        if (empty($tanggal_selesai)) {
            return '1 hari';
        }

        $end = Carbon::parse($tanggal_selesai);
        $diff = $start->diffInDays($end) + 1;

        return $diff . ' hari';
    }

    public static function periodeHari($tanggal_tugas, $tanggal_selesai)
    {
        $tanggal_tugas = Carbon::parse($tanggal_tugas)->startOfDay();
        $lama = self::lamaHari($tanggal_tugas, $tanggal_selesai);

        if ($tanggal_selesai && $tanggal_selesai != $tanggal_tugas->toDateString()) {
            return self::hariTanggalIndonesia($tanggal_tugas) . ' s.d ' .
                self::hariTanggalIndonesia($tanggal_selesai) .
                " ({$lama})";
        }

        return self::hariTanggalIndonesia($tanggal_tugas) . " ({$lama})";
    }

    /**
     * Hitung lama hari tanpa +1
     * contoh: 2024-09-01 s/d 2024-09-01 = 0 hari
     * contoh: 2024-09-01 08:00 s/d 2024-09-02 18:00 = 1.42 hari
     */
    public static function lamaHariTanpaTambah($tanggal_tugas, $tanggal_selesai)
    {
        $start = Carbon::parse($tanggal_tugas);
        $end = Carbon::parse($tanggal_selesai);

        // total jam, bagi 24 supaya bisa pecahan hari
        $diffInHours = $end->floatDiffInHours($start);
        $days = $diffInHours / 24;

        // format 2 desimal, titik sebagai pemisah desimal
        $formatted = number_format($days, 2, '.', '');

        return $formatted . ' Hari';
    }

    public static function tanggalWaktuIndonesia($datetime)
    {
        if (!$datetime) return null;

        // Gunakan Carbon untuk parsing
        return Carbon::parse($datetime)
            ->locale('id') // bahasa Indonesia
            ->translatedFormat('d F Y H:i');
        // contoh output: 21 Agustus 2025 13:45
    }

    public static function tanggalWaktuIndonesiaLengkap($datetime)
    {
        if (!$datetime) return null;

        // Gunakan Carbon untuk parsing
        return Carbon::parse($datetime)
            ->locale('id') // bahasa Indonesia
            ->translatedFormat('d F Y H:i:s');
        // contoh output: 21 Agustus 2025 13:45:10
    }

    public static function tanggalIndonesia($date)
    {
        if (!$date) return null;

        return Carbon::parse($date)
            ->locale('id')
            ->translatedFormat('d F Y');
        // contoh output: 21 Agustus 2025
    }

    public static function rupiah($angka, $withPrefix = true)
    {
        $hasil = number_format($angka, 0, ',', '.');
        return $withPrefix ? 'Rp ' . $hasil : $hasil;
    }
}
