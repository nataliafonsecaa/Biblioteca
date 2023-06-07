<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Livros</title>
    </head>
<body>
    <div>
        <form method = 'POST'>
            <label for = "nome">Digite o nome do livro </label>
            <input type = "text" id = "nome" name = "nome"  maxlength = "80"><br>
            <label for = "ano">Ano: </label>
            <input type = "date" id = "usuario" name = "ano"  maxlength = "20"><br>
            <label for = "autor">Autor: )</label>
            <input type = "text" id = "autor" name = "autor"  maxlength = "20"><br>
            <label for = "editora">Editora: </label>
            <input type = "text" id = "editora" name = "editora"  maxlength = "20"><br>
            <label for = "edicao">Edição: </label>
            <input type = "text" id = "edicao" name = "edicao"  maxlength = "20"><br>
            

            <input type="submit" value="Enviar" name= "Enviar">
        </form>