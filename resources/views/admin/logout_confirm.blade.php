<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Konfirmasi Logout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logout-container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .logout-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }
        .logout-container .btn {
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Apakah Anda yakin ingin keluar?</h2>
        <p>Anda akan diarahkan kembali ke halaman login.</p>
        <div>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">Ya, Logout</button>
            </form>
            
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg">Tidak, Tetap di Dashboard</a>
        </div>
    </div>
</body>
</html>