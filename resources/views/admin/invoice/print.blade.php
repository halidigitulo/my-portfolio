<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kwitansi Pembayaran</title>
    <style>
        @page {
            size: A5 landscape;
            margin: 15mm;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            color: #222;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 100%;
            border: 2px solid #000;
            padding: 20px;
            border-radius: 6px;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .logo {
            width: 90px;
        }

        .company-info {
            flex: 1;
            text-align: left;
            padding-left: 15px;
        }

        .company-info h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .company-info p {
            margin: 0;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            font-size: 14px;
        }

        td {
            padding: 6px 0;
        }

        .right {
            text-align: right;
        }

        .amount {
            font-size: 18px;
            font-weight: bold;
            border: 1px solid #000;
            padding: 5px;
            text-align: right;
            width: 250px;
        }

        .footer {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            text-align: center;
            font-size: 14px;
        }

        .signature {
            width: 30%;
        }

        .terbilang {
            font-style: italic;
            font-size: 13px;
            margin-top: 10px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="header">
            <img src="{{ asset('uploads/' . $profile->logo) }}" class="logo" alt="Logo">
            <div class="company-info">
                <h2>{{ $profile->nama }}</h2>
                <p>{{ $profile->alamat }}</p>
                <p>Telp: {{ $profile->telp }} | Email: {{ $profile->email }}</p>
            </div>
        </div>

        <div class="title">KWITANSI PEMBAYARAN</div>

        <table>
            <tr>
                <td width="150">Telah diterima dari</td>
                <td>: {{ $invoice->client->nama ?? $invoice->terima_dari }}</td>
            </tr>
            <tr>
                <td>Sejumlah uang</td>
                <td>: <strong>Rp {{ number_format($invoice->jumlah, 0, ',', '.') }}</strong></td>
            </tr>
            <tr>
                <td>Terbilang</td>
                <td>: <span class="terbilang">{{ ucfirst($terbilang) }} Rupiah</span></td>
            </tr>
            <tr>
                <td>Untuk pembayaran</td>
                <td>: {{ $invoice->keterangan ?? '-' }}</td>
            </tr>
        </table>

        <div class="footer">
            <div class="signature"></div>
            <div class="signature">
                <p>{{$profile->kota}}, {{ \App\Helpers\FormatHelper::tanggalIndonesia($invoice->tgl_invoice) }}</p>
                <p>Hormat Kami,</p>
                <br><br><br>
                <p><strong>__________________________</strong></p>
                {{-- <p>Admin</p> --}}
            </div>
        </div>
    </div>
</body>

</html>
