<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   
   body{
    background-color: #BF6415;
    color:#FDFEF7;
    font-family: "Open Sans", sans-serif;
    padding: 0 20px;
   }

  </style>

</head>
<body>
    <h1>Area de Pesquisa</h1>
<div>
        <form method = 'POST'>
            <label for = "nome">Digite o nome do livro </label>
            <input type = "text" id = "nome" name = "nome"  maxlength = "80"><br>
            <label for = "autor">Autor: </label>
            <input type = "text" id = "autor" name = "autor"  maxlength = "20"><br>
            <label for = "editora">Editora: </label>
            <input type = "text" id = "editora" name = "editora"  maxlength = "20"><br>
      
            <input type="submit" value="Enviar" name= "Enviar">
</form>
                <a href="../menu.php"><button>Voltar</button></a>
</div>

<?php
if (isset($_POST["Enviar"])){
            

            $con = mysqli_connect("10.67.22.216","s222","web@2023","s222_natalia39");
            

            $nome = $_POST["nome"];
            $autor = $_POST["autor"];
            $editora = $_POST["editora"];
       
if ($nome != "" && $autor != "" && $editora != ""){
    
    $livro = " SELECT livro_nome,  livro_autor , livro_editora, 
    FROM livro 
    WHERE ( livro_nome = '$nome' && livro_autor = '$autor' && livro_editora = '$editora' )
    ";
 }

else if($nome != "" && $autor != ""){               

    $livro = " SELECT livro_nome,  livro_autor , livro_editora
    FROM livro  
    WHERE ( livro_nome = '$nome' && livro_autor = '$autor' )
    ";

}else if($nome != "" && $editora != ""){

    $livro = " SELECT livro_nome,  livro_autor , livro_editora
    FROM livro 
  WHERE ( livro_nome = '$nome' && livro_editora = '$editora' )
  ";

}else if ($autor != "" && $editora != ""){

    $livro = " SELECT livro_nome,  livro_autor , livro_editora
    FROM livro
    WHERE (livro_autor = '$autor' && livro_editora = '$editora' )
    ";
}

 else if ($nome != "") {
   
    $livro = " SELECT livro_nome, livro_autor , livro_editora
    FROM livro 
    WHERE ( livro_nome = '$nome' )
    ";

}else if ($autor != "") {

    $livro = " SELECT livro_nome,  livro_autor , livro_editora
    FROM livro 
    WHERE ( livro_autor = '$autor' )
    ";

}else if ($editora != "") {

    $livro = " SELECT livro_nome,  livro_autor , livro_editora
    FROM livro
    WHERE ( livro_editora = '$editora' )
    ";
}

else {
    $livro = " SELECT livro_nome,  livro_autor , livro_editora
    FROM livro";
}

$resultado = mysqli_query($con, $livro);

if (mysqli_num_rows($resultado) == 0) {

    echo "Nenhum livro encontrado com os dados informados.";
}

else {

    while ($informacao = mysqli_fetch_assoc($resultado)) {
        echo "<br>nome: " . $informacao["livro_nome"] . "<br>";
        echo "autor: " . $informacao["livro_autor"] . "<br>";
        echo "editora: " . $informacao["livro_editora"] . "<br>";
    }
}

}
mysqli_close($con); 

?>

</body>

</html>