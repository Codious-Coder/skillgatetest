<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-3">Welcome, {{ Auth::user()->name ?? 'User' }} 🎉</h2>
        <p class="text-muted">You are logged in as <strong>{{ Auth::user()->email ?? Auth::user()->phone }}</strong></p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>

</body>
</html>
