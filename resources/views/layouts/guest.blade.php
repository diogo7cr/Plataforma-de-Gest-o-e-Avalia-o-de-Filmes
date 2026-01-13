<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MovieC') }}</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(to bottom, rgba(0,0,0,0.8), rgba(0,0,0,0.5)),
                        url('https://images.unsplash.com/photo-1574267432644-f76af00c31be?w=1920') center/cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .auth-container {
            background: rgba(0, 0, 0, 0.85);
            padding: 60px 70px;
            border-radius: 8px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.7);
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h1 {
            font-size: 3rem;
            color: #e50914;
            font-weight: bold;
            letter-spacing: 2px;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #b3b3b3;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 16px;
            background: #333;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: background 0.3s;
        }

        input:focus {
            outline: none;
            background: #454545;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-container input[type="checkbox"] {
            width: auto;
            margin-right: 10px;
        }

        .checkbox-container label {
            margin: 0;
            color: #b3b3b3;
        }

        button[type="submit"],
        .btn {
            width: 100%;
            padding: 16px;
            background: #e50914;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            text-align: center;
            display: inline-block;
        }

        button[type="submit"]:hover,
        .btn:hover {
            background: #f40612;
        }

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            color: #b3b3b3;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .links a:hover {
            color: #fff;
        }

        .error {
            background: #e50914;
            color: #fff;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .divider {
            margin: 30px 0;
            text-align: center;
            color: #b3b3b3;
        }

        @media (max-width: 768px) {
            .auth-container {
                padding: 40px 30px;
                margin: 20px;
            }

            .logo h1 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="logo">
            <h1>🎬 MOVIEC</h1>
        </div>

        {{ $slot }}
    </div>
</body>
</html>