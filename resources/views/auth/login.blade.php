<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        /* Gaya Umum untuk Halaman Login */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .login-container h1 {
            text-align: center;
            font-size: 28px;
            color: #343a40;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }
        input[type="text"],
        input[type="password"] {
            padding: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Masuk</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Masuk">
    </form>
    <a href="/register">Belum punya akun? Daftar sekarang!</a>
</div>

</body>
</html>
