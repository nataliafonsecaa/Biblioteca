<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Livros</title>
    <style>
   
   body{
    background-color:  #DBC7A3;
    color:#FDFEF7;
    font-family: "Open Sans", sans-serif;
   }

  </style>

    </head>
<body>
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

        <?php

session_start();
$usu_id= $_SESSION["usu_id"];

$nome= $_SESSION['nome'];
echo "Olá, ".$nome;
if (!isset( $_SESSION["usu_id"])) {
header("location: ../login.php");
exit;
}

if (isset($_POST["Enviar"])) {

  
    $nome = $_POST["nome"];
    $autor = $_POST["autor"];
    $editora = $_POST["editora"];

    $con = mysqli_connect("10.67.22.216","s222","web@2023","s222_natalia39");

    if (!$con) {
        echo "erro ao conectar com a base de dados: " . mysqli_connect_error();
    }else{
        echo "Conexão Aberta<br>";
    }

    $livro = "SELECT livro_nome
    FROM livro
    WHERE ( livro_nome = '$nome')
    ";
    $resultado = mysqli_query($con , $livro);

    if (mysqli_num_rows($resultado) > 0){   
        echo "O livro $nome já existe no banco de dados";
    } else {

        $sql = "INSERT INTO livro
         (livro_nome,
          livro_autor,
          livro_editora)

        VALUES 
        ('$nome',
        '$autor',
        '$editora')
        ";
        mysqli_query($con,$sql);

        if (mysqli_error($con)) {
            echo "Erro ao executar a query: ". mysqli_error($con);
        } else {
            echo "Dados inseridos com sucesso!";
        }
    }
    mysqli_close($con); 
}
?>
</body>
</html>


