<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi Pembayaran</title>
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .kwitansi {
            width: 100%;
            max-width: 210mm;
            height: 148.5mm; /* Setengah dari A4 */
            border: 1px solid #000;
            padding: 20px 25px;
            box-sizing: border-box;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header img {
            height: 60px;
        }

        .company-info {
            text-align: right;
            font-size: 12px;
            line-height: 1.3;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            text-decoration: underline;
        }

        .content table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .content td {
            padding: 5px 0;
            vertical-align: top;
        }

        .content td:first-child {
            width: 150px;
        }

        .amount {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            right: 25px;
            text-align: center;
        }

        .signature {
            margin-top: 60px;
            text-decoration: underline;
            font-weight: bold;
        }

        .terbilang {
            margin-top: 10px;
            font-style: italic;
            font-size: 12px;
            color: #444;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="kwitansi">
        <div class="header">
            <div class="logo">
                <img src="{{ asset('uploads/'. $profile->logo) }}" alt="Logo">
            </div>
            <div class="company-info">
                <strong>{{ $profile->nama ?? 'Nama Perusahaan' }}</strong><br>
                {{ $profile->alamat ?? 'Alamat Lengkap' }}<br>
                Telp: {{ $profile->telp ?? '-' }} | Email: {{ $profile->email ?? '-' }}
            </div>
        </div>

        <div class="title">KWITANSI PEMBAYARAN</div>

        <div class="content">
            <table>
                <tr>
                    <td>Nomor Kwitansi</td>
                    <td>: {{ $invoice->no_invoice ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Telah diterima dari</td>
                    <td>: {{ $invoice->client->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Untuk pembayaran</td>
                    <td>: {{ $invoice->keterangan ?? 'Jasa Pembuatan Website' }}</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td class="amount">: Rp {{ number_format($invoice->jumlah, 0, ',', '.') }}</td>
                </tr>
            </table>

            <div class="terbilang">
                Terbilang: <strong>{{ ucwords($terbilang) }} Rupiah</strong>
            </div>
        </div>

        <div class="footer">
            <div>{{$profile->kota}}, {{ \App\Helpers\FormatHelper::tanggalIndonesia($invoice->tgl_invoice) }}</div>
            <div class="signature">{{ $profile->direktur ?? 'Pimpinan Perusahaan' }}</div>
        </div>
    </div>

    <div class="no-print" style="text-align:center; margin-top:10px;">
        <button onclick="window.print()">🖨 Cetak Kwitansi</button>
    </div>
</body>
</html>
