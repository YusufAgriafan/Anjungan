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
            margin: 50px auto; /* tambahkan margin untuk membuat kertas di tengah layar */
            width: 20%; /* set lebar kertas */
            background-color: #f9f9f9; /* tambahkan warna latar belakang */
            padding: 20px; /* tambahkan padding untuk membuat kertas lebih nyaman */
            border: 1px solid #ddd; /* tambahkan border untuk membuat kertas lebih jelas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* tambahkan efek bayangan */
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
    <div class="content"><br>
        <h1 style="font-weight: bold; font-size: 60px;">A9</h1><br>
        <p>[{{ now()->format('Y-m-d H:i') }}]</p><br>
        <p>Loket Pendaftaran</p>
    </div>
</body>
</html>