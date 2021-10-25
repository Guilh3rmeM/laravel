<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style_adm.css">
    <title>ADM</title>
</head>
<body>
    <div id="main-div">

        <div id="div-content">
            <h1>Business Finder Admin</h1>
            <div id="div-top">
                <div class="div-top-filho" id="div-top-filho-left">
                    <p><h3>Business</h3></p>
                </div>
                <div class="div-top-filho" id="div-top-filho-right">
                  
                    <button onclick="window.location='/register'">Add business</button>
                    <form method="GET" action="/logOut">
                        
                        <button type="submit">LogOut</button>
                    </form>  
                </div>
            </div>
            @php
                $aux=1
            @endphp
           @foreach ($empresas as $empresa)
           <div>
            {{$aux++.'. '.$empresa->titulo;}}
           </div>
               
               <br><br>
           @endforeach
             
           {{$empresas->links()}}
        </div>
    </div>
</body>
</html>