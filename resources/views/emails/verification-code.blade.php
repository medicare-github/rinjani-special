<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kode Verifikasi Login</h2>
        <p>Halo,</p>
        <p>Berikut adalah kode verifikasi untuk login ke akun Anda:</p>
        <h3 style="color: #007bff;">{{ $code }}</h3>
        <p>Jika Anda tidak meminta kode ini, abaikan email ini.</p>
        <p>Terima kasih,</p>
        <p>Tim {{ config('app.name') }}</p>
    </div>
</body>
</html>
