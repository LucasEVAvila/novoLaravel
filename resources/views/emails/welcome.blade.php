<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Olá, {{ $userName }}!</h1>
    <p>Obrigado por se juntar à nossa comunidade. Sua conta foi ativada com sucesso.</p>
    <p>Acesse sua área: <a href="{{ route('login') }}">Fazer Login</a></p>
</body>
</html>