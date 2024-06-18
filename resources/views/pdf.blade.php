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
            width: 100%;
            background-color: #f9f9f9;
            padding: 1px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
        }
        p {
            font-size: 1.2em;
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
        <h5>RS Islam Aminah Blitar</h5>
        <p style="font-size: 0.6em; font-weight: bold;">Jl. Kenari 54 Plosokerep Sananwetan</p>
        <p style="font-size: 0.6em; font-weight: bold;">Telp: 6282228815210</p>
    </div>
    <hr>
    <div class="content"><br>
        <h5 style="font-weight: bold; font-size: 25px;">{{ $number }}</h5>
        <p style="font-size: 0.6em;">[{{ $dateTime }}]</p>
        <p style="font-size: 0.6em;">{{ $type == 'A' ? 'Loket Pendaftaran' : 'Loket CS' }}</p>
    </div>
</body>
</html>
