<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Example</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin: 50px auto;
            width: 100%;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
            margin-bottom: 0.5em;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 1em;
        }
       .code {
            font-family: monospace;
            font-size: 1.5em;
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>RS Islam Aminah Blitar</h2>
        <p style="font-size: 0.8em; font-weight: bold;">Jl. Kenari 54 Plosokerep Sananwetan</p>
        <p style="font-size: 0.8em; font-weight: bold;">Telp: 6282228815210</p>
    </div>
    <hr>
    <div class="content">
        <br>
        <h1 style="font-weight: bold; font-size: 60px;">A9</h1>
        <br>
        <p>[{{ now()->format('Y-m-d H:i') }}]</p>
        <br>
        <p>Loket Pendaftaran</p>
    </div>

    <!-- Tombol untuk mencetak PDF -->
    <button onclick="generatePDF()">Cetak PDF</button>

    <!-- Skrip JavaScript untuk menghasilkan PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        function generatePDF() {
            const doc = new jsPDF();

            // Menambahkan header
            doc.setFontSize(18);
            doc.text(10, 20, 'RS Islam Aminah Blitar');
            doc.setFontSize(12);
            doc.text(10, 30, 'Jl. Kenari 54 Plosokerep Sananwetan');
            doc.text(10, 40, 'Telp: 6282228815210');

            // Menambahkan garis horizontal
            doc.setLineWidth(1);
            doc.line(10, 50, 190, 50);

            // Menambahkan konten
            doc.setFontSize(60);
            doc.text(10, 70, 'A9');
            doc.setFontSize(18);
            doc.text(10, 100, `[{{ now()->format('Y-m-d H:i') }}]`);
            doc.text(10, 120, 'Loket Pendaftaran');

            // Simpan PDF saat ini
            doc.save('dokumen.pdf');
        }
    </script>
</body>
</html>