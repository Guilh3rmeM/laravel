<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style_register.css">
    <title>Register</title>
</head>

<body>

<div id="main-div">
    @if (session('msg'))
        
    <div id="flash-message">
        <div id="flash-message-content">
            
            <p>{{session('msg')}}<p>
        </div>
    </div>

    @endif
    <form method="POST">
        @csrf
        <label>Título</label>
        <br>
        <input type="text" name="titulo" required/>
        <br><br>

        <label>Categoria</label>
        <br>
        <select name="categoria[]" multiple required>

            @foreach ($categorias as $c)
                <option value={{ $c->id }}>{{ $c->categoria }}</option>
            @endforeach

        </select>
        <br><br>

        <label>Telefone</label>
        <br>
        <input type="text" name="telefone" required/>
        <br><br>

        <label>Endereço</label>
        <br>
        <input type="text" name="endereco" required/>
        <br><br>

        <label>CEP</label>
        <br>
        <input type="text" name="cep" required/>
        <br><br>

        <label>Cidade</label>
        <br>
        <input type="text" name="cidade" required/>
        <br><br>

        <label>Estado</label>
        <br>
        <input type="text" name="estado" required/>
        <br><br>

        <label>Descrição</label>
        <br>
        <textarea name="descricao" cols="35" rows="10" required></textarea>
        <br><br>


        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

</div>
</body>

</html>
