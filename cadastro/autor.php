        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Livros</title>
    <style>
   
   body{
    background-color: #95A691;
    color:#FDFEF7;
    font-family: "Open Sans", sans-serif;
   }

  </style>
    </head>
<body>
    <div>
        <form method = 'POST'>
            <label for = "nome">Digite o nome do autor </label>
            <input type = "text" id = "nome" name = "nome"  maxlength = "80"><br>
            <label for = "nasc">Nascimento Autor: </label>
            <input type = "date" id = "nasc" name = "nasc"  maxlength = "20"><br>
            <label for = "obras">Obras do Autor: )</label>
            <input type = "text" id = "obras" name = "obras"  maxlength = "20"><br>

            <input type="submit" value="Enviar" name= "Enviar">
        
        </form>


        <a href="../menu.php"><button>Voltar</button></a>
</div>