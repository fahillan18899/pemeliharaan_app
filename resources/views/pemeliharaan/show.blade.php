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
        <tr>
            <td class="label">Nama Alat</td>
            <td>: {{ $data->alat ?? '-' }}</td>
            <td class="label">No. Seri</td>
            <td>: {{ $data->sn ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Merk/Tipe</td>
            <td>: {{ $data->type ?? '-' }}</td>
            <td class="label">Lokasi</td>
            <td>: {{ $data->ruang ?? '-' }}</td>
        </tr>
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
            <!-- Baris kosong untuk diisi -->
            <tr><td>{{ $data->waktu }}</td><td>{{ $data->ket ?? '-' }}</td><td>{{ $data->teknisi ?? '-' }}</td><td>V</td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr><td></td><td></td><td></td><td></td></tr>
        </tbody>
    </table>

</div>

</body>
</html>