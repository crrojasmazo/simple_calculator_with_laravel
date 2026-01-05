<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            background-color: #333;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        input,
        button {
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #555;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #666;
        }

        .error-message {
            color: #d9534f;
            background-color: #f2dede;
            border-color: #ebccd1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 300px;
            text-align: center;
            box-sizing: border-box;
        }

        a {
            color: #88ccff;
            text-decoration: none;
            margin-top: 10px;
            font-size: 0.9em;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Registro</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="post">
        @csrf
        <div>
            <label for="name" style="display: block; margin-bottom: 5px; text-align: left;">Nombre:</label>
            <input type="text" name="name" id="name" required value="{{ old('name') }}">
        </div>
        <div>
            <label for="email" style="display: block; margin-bottom: 5px; text-align: left;">Email:</label>
            <input type="email" name="email" id="email" required value="{{ old('email') }}">
        </div>
        <div>
            <label for="password" style="display: block; margin-bottom: 5px; text-align: left;">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Registrarse</button>
    </form>
    <a href="/login">¿Ya tienes cuenta? Inicia sesión aquí</a>
</body>

</html>