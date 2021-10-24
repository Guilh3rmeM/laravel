<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style_showBusiness.css">
    <title>{{$business->titulo}}</title>
</head>
<body>
   
    <div>

        <div>
            <h1>Business Finder</h1>
        </div>

        <div>
            <p><h3>{{$business->titulo}}</h3></p>
            <p>
                @foreach ($categorias as $categoria)
                    in {{$categoria->categoria}}
                    <br>
                @endforeach
            </p>

            <div id="div-desc">
                <h4>About</h4>
            
               {{$business->descricao}}
               <br>
               Adress: {{$business->endereco}}, {{$business->cidade}} - {{$business->estado}}, {{$business->cep}}
               <br>
               Phone: {{$business->telefone}}
            </div>
        </div>
    </div>
</body>
</html>