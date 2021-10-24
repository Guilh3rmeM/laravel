<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style_AuthAdm.css">
    <title>Autenticação ADM</title>
</head>

<body>

    <div id="main-content">

        @if (session('msg'))
            <div id="div-flash-message">
                <p>{{ session('msg') }}</p>
            </div>
        @endif
    

    <div id="div-form">
        <img src="/img/icon-admin.jpg" alt="icon-adm" height="223px" width="200px" style="margin-top: 5%">

        <div id="div-data">

            <form method="POST">
                @csrf
                <input type="text" name="email" maxlength="40px">
                <input type="password" name="password" maxlength="30px">

                <div id="div-button">
                    <br>
                    <button type="submit">Login</button>
                </div>
            </form>

        </div>

        <br><br>

    </div>

    </div>

</body>

</html>
