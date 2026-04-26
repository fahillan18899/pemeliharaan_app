<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Print Pemeliharaan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .card {
            border: 1px solid #000;
            padding: 20px;
            width: 300px;
        }

        .center {
            text-align: center;
        }

        .mt-2 { margin-top: 10px; }

        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="card">
      <!-- QR CODE -->
      <div class="mt-4">
        <center><p><b>{{ $data->alat ?? '-' }}</b></p></center>
        <center>{!! QrCode::size(120)->generate( "Link: " . url('/pemeliharaan/' . $data->id) ) !!}</center>
        <center><p><b>{{ $data->sn ?? '-' }}</b></p></center>
      </div>
    </div>

    <br>

    <script>
        // Auto print saat dibuka
        window.onload = function() {
            window.print();
        }
    </script>

</body>
</html>