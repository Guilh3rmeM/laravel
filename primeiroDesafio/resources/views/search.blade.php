<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style_search.css">
    <title>Search</title>
</head>
<body>
@if (session('msg'))

<div id="msg-error">
   <p>{{session('msg')}}</p>
</div>

@endif
    <div id="mainContent">
        <h1>Business Finder</h1>
        
        <div id="div-search-bar">
            <form method="GET" action="/business">
            <input type="text" name="q" placeholder="What you looking for?"/>
           
            <div id="div-button">
                <button type="submit">Search</button>
            </div>
            </form>
        </div>

    </div>


    
</body>
</html>