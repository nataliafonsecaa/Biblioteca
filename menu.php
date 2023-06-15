<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Loja de Veiculos</title>
  <style>
   
   body{
    background-color: #DE9485;
    color:#FDFEF7;
    font-family: "Open Sans", sans-serif;
    padding: 0 20px;
   }

  </style>
</head>
<body>
    <h1> PÁGINA INICIAL </h1>

 
    <a href="./cadastro/livro.php"><button>Cadastrar Livros</button></a>
    <br><br>
    <a href="./cadastro/autor.php"><button>Cadastrar Autor</button></a>
    <br><br>
    <a href="./inicio.php"><button>trocar de usuario</button></a>      
    <br><br>
    <a href="./cadastro/usuario.php"><button> Cadastrar  Usuario</button>
    <br><br>
    <a href="./pesquisa.php"><button> Area de Pesquisa</button>
    <br><br>
    <a href="./inicio.php"><button> Sair </button></a>
    <br>

</body>

<?php

    $con = mysqli_connect("10.67.22.216","s222","web@2023","s222_natalia39");

    session_start();
    $usu_id= $_SESSION["usu_id"];

   $nome= $_SESSION['nome'];
  echo "<br> Olá, ".$nome;
  if (!isset( $_SESSION["usu_id"])) {
    header("location: ./inicio.php");
  
    exit;
}

            if (!$con) {
                echo "erro ao conectar com a base de dados: " . mysqli_connect_error();
                
            }else{
                echo " <br> Conexão Aberta<br>";
            }

       
        mysqli_close($con);  
?>
</html>