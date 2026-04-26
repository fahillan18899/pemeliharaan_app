<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kartu Pemeliharaan Alat</title>

<style>
@page {
    size: A4 portrait;
    margin: 0;
}

html, body {
    width: 210mm;
    height: 297mm;
}

@media print {

    body {
        margin: 0;
        padding: 0;
        background: white;
    }

    .container {
        width: 190mm !important;
        margin: 10mm auto !important;
        padding: 10mm;
        border: 1px solid black;
        box-sizing: border-box;
    }

    .no-print {
        display: none !important;
    }

}
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

    .header h2 {
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

    @keyframes fadeIn {
        from { opacity:0; transform:scale(0.95); }
        to { opacity:1; transform:scale(1); }
    }

    /* PRINT MODE */
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            background: white;
        }

        .container {
            border: none;
            margin: 0;
            width: 100%;
        }
    }
</style>
</head>

<body>

<div class="container">

    <!-- ACTION BUTTON -->
    <div class="no-print" style="display:flex; justify-content:space-between; margin-bottom:10px;">

        <!-- Kembali -->
        <a href="{{ route('dashboard') }}" 
            style="background:#6b7280;color:white;padding:8px 14px;border-radius:6px;text-decoration:none;">
            ← Kembali
        </a>

        <div style="display:flex; gap:10px;">
            
            <!-- Print -->
            <button onclick="printPage()" 
                style="background:#2563eb;color:white;padding:8px 14px;border:none;border-radius:6px;cursor:pointer;">
                🖨️ Print
            </button>

            <!-- Tambah -->
            <button onclick="openModal()" 
                style="background:#16a34a;color:white;padding:8px 14px;border:none;border-radius:6px;cursor:pointer;">
                + Tambah
            </button>

        </div>
    </div>

    <!-- HEADER -->
    <div class="header">
        <h2>RSUD</h2>
    </div>

    <div class="title">KARTU PEMELIHARAAN ALAT</div>

    <!-- INFO -->
    <table class="info">
        <tr>
            <td class="label">Nama Alat</td>
            <td>: {{ $alat->alat ?? '-' }}</td>
            <td class="label">No. Seri</td>
            <td>: {{ $alat->sn ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Merk/Tipe</td>
            <td>: {{ $alat->type ?? '-' }}</td>
            <td class="label">Lokasi</td>
            <td>: {{ $alat->ruang ?? '-' }}</td>
        </tr>
    </table>

    <!-- TABLE -->
    <table class="main">
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>JENIS KEGIATAN</th>
                <th>TEKNISI</th>
                <th>PARAF</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alat->riwayat as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>    
                <td>{{ $item->waktu ?? '-' }}</td>
                <td>{{ $item->ket ?? '-' }}</td>
                <td>{{ $item->teknisi ?? '-' }}</td>
                <td>✔</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

<!-- MODAL -->
<div id="modal" style="
    display:none;
    position:fixed;
    top:0; left:0;
    width:100%; height:100%;
    background:rgba(0,0,0,0.5);
    align-items:center;
    justify-content:center;
">

    <div onclick="event.stopPropagation()" style="
        background:white;
        width:400px;
        padding:20px;
        border-radius:10px;
        animation:fadeIn 0.2s ease-in-out;
    ">
        
        <h3>Tambah Pemeliharaan</h3>

        <form action="{{ route('pemeliharaandua.store') }}" method="POST">
            @csrf

            <input type="hidden" name="alat_id" value="{{ $alat->id }}">

            <div style="margin-bottom:10px;">
                <label>Tanggal</label>
                <input type="date" name="waktu" value="{{ date('Y-m-d') }}" required style="width:100%;padding:6px;">
            </div>

            <div style="margin-bottom:10px;">
                <label>Keterangan</label>
                <textarea name="ket" style="width:100%;padding:6px;"></textarea>
            </div>

            <div style="margin-bottom:10px;">
                <label>Teknisi</label>
                <input type="text" name="teknisi" value="{{ auth()->user()->name ?? '' }}" required style="width:100%;padding:6px;">
            </div>

            <div style="display:flex; justify-content:flex-end; gap:10px;">
                <button type="button" onclick="closeModal()">Batal</button>

                <button type="submit" 
                    style="background:#16a34a;color:white;padding:6px 12px;border:none;border-radius:5px;">
                    Simpan
                </button>
            </div>
        </form>

    </div>
</div>

<!-- SCRIPT -->
<script>
function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function printPage() {
    window.print();
}
</script>

</body>
</html>