<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca - LOGIN</title>

</head>
<body>

<h1> LOGIN </h1>
    <div>    

        <form method="post">
            <label for = "usuario">Digite seu Usuário: </label>
            <input type = "text" id = "usuario" name = "usuario"  maxlength = "20"><br>
            <label for = "senha">Digite sua Senha: </label>
            <input type = "password" id = "senha" name = "senha"  maxlength = "20"><br>

            <input type="submit" value="Enviar" name="Enviar">
        </form>
        
        <a href="./cadastro/usuario.php"><button>cadastrar</button></a><br>

        <?php

    if (isset($_POST["Enviar"])) {
  
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];    
        
        $con = mysqli_connect("10.67.22.216","s222","web@2023","s222_natalia39");

        if (!$con) {
            echo "erro ao conectar com a base de dados: " . mysqli_connect_error();
        
        }else{

            $usu =  "SELECT usu_usuario, usu_id, usu_senha, usu_nome
            FROM usuario 
            WHERE ( usu_usuario = '$usuario' 0)
            ";
            $resultado = mysqli_query($con , $usu);

            if (mysqli_num_rows($resultado) == 0){
                echo "Usuário inexistente";
         
            }else if (mysqli_num_rows($resultado) == 1){ 

                $row = mysqli_fetch_assoc($resultado);
      
                $usu_id = $row["usu_id"];

                $usu_senha = $row["usu_senha"];
                $usu_nome = $row["usu_nome"];

                if ($senha == $usu_senha) {
          
                    session_start();
                    $_SESSION['usu_id'] = $usu_id;
                    $_SESSION['nome'] = $usu_nome;
                
       
                    mysqli_close($con);   

                    
                } else {

                    echo "Senha incorreta";   
                }
            }else {
                echo "erro de usuario";
            }  
        }
        mysqli_close($con);       
    }     
?>
</body>
</html>

<?php
    session_start();
    $id = $_SESSION["id"]; 
    $nome = $_SESSION["nome"]; 
    $tipo = $_SESSION["tipo"]; 
    $status = $_SESSION["status"];
    $usuario = $_SESSION["usuario"];
    $senha = $_SESSION["senha"]; 
    echo "id: " . $id .' nome: ' .$nome.' tipo: ' .$tipo.' status: ' .$status.' usuario: ' .$usuario.' senha: ' .$senha;
    if (empty($id)) {
        header('location:../index.php');
    }else if ($tipo !== "usuario") {
        session_unset();
        session_destroy();
        header('location:../../index.php');  
        exit();
    }
?>