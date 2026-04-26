<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kartu Pemeliharaan Alat</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f5f5f5;
    }
    .container {
        width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border: 2px solid #000;
    }
    .header {
        text-align: center;
    }
    .header h3, .header h2, .header p {
        margin: 2px;
    }
    .title {
        text-align: center;
        font-weight: bold;
        margin: 10px 0;
    }
    .info {
        width: 100%;
        margin-bottom: 10px;
    }
    .info td {
        padding: 5px;
    }
    .info .label {
        width: 120px;
    }
    table.main {
        width: 100%;
        border-collapse: collapse;
    }
    table.main th, table.main td {
        border: 1px solid #000;
        padding: 6px;
        text-align: center;
        height: 30px;
    }
    table.main th {
        background-color: #eaeaea;
    }
</style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>RSUD</h2>
    </div>

    <div class="title">KARTU PEMELIHARAAN ALAT</div>

    <table class="info">
        @foreach ($data as $item1)
        <tr>
            <td class="label">Nama Alat</td>
            <td>: {{ $item1->alat ?? '-' }}</td>
            <td class="label">No. Seri</td>
            <td>: {{ $item1->sn ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Merk/Tipe</td>
            <td>: {{ $item1->type ?? '-' }}</td>
            <td class="label">Lokasi</td>
            <td>: {{ $item1->ruang ?? '-' }}</td>
        </tr>
        @endforeach
    </table>

    <table class="main">
        <thead>
            <tr>
                <th>TANGGAL</th>
                <th>JENIS KEGIATAN PEMELIHARAAN</th>
                <th>TEKNISI</th>
                <th>PARAF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item2)
            <!-- Baris kosong untuk diisi -->
            <tr><td>{{ $item2->waktu }}</td><td>{{ $item2->ket ?? '-' }}</td><td>{{ $item2->teknisi ?? '-' }}</td><td>V</td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>