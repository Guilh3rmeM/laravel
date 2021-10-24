<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style_businessList.css">
    <title>Search Result</title>

    <style>
        .page-item{
            display: inline-block;
        }
    </style>
</head>

<body>

    <div>

        <h1>Results for "{{ $search }}"</h1>
        @if (count($business) > 0)
            @foreach ($business as $item)
                <h2><a href="/business/{{$item->titulo}}?q={{$item->id}}" id="business-name">{{ $index++ . '. ' . $item->titulo }}</a></h3>

                @foreach ($categorias as $categoria)


                    @if ($categoria[0] == $item->id /*id*/)
                        in {{ $categoria[1] }}
                        <br>
                    @endif

                @endforeach

            @endforeach
            {{ $business->links() }}
        @else
            <p>We didn't find anything :(</p>
        @endif
    </div>
</body>

</html>
