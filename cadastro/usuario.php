<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro usuário</title>
    </head>
<body>
    <div>

        <form method = 'POST'>
            <label for = "nome">Digite seu Nome Completo: </label>
            <input type = "text" id = "nome" name = "nome"  maxlength = "80"><br>
            <label for = "usuario">Digite seu Usuário: </label>
            <input type = "text" id = "usuario" name = "usuario"  maxlength = "20"><br>
            <label for = "senha">Digite sua Senha: )</label>
            <input type = "password" id = "senha" name = "senha"  maxlength = "20"><br>
            <label for = "cpf">Digite seu CPF: </label>
            <input type = "number" id = "cpf" name = "cpf"  maxlength = "20"><br>
            

            <input type="submit" value="Enviar" name= "Enviar">
        </form>


        <a href="../inicio.php"><button>logar</button></a>
</div>
    <?php


        if (isset($_POST["Enviar"])) {

            $nome = $_POST["nome"];
            $usuario = $_POST["usuario"];
            $senha = $_POST["senha"];
            $cpf = $_POST["cpf"];


            $con = mysqli_connect("10.67.22.216","s222","web@2023","s222_natalia39");
            

            if (!$con) {
                echo "erro ao conectar com a base de dados: " . mysqli_connect_error();
                
            }else{
                echo "Conexão Aberta<br>";
            }


            $usu =  "SELECT usu_usuario
            FROM usuario
            WHERE ( usu_usuario = '$usuario'  )
            ";

            $resultado = mysqli_query($con , $usu);

            if (mysqli_num_rows($resultado) > 0) {
                
                echo "O usuário $usuario já esta cadastrado";

            } else {
                $sql = "INSERT INTO usuario 
                (usu_usuario,
                usu_senha,
                usu_nome,
                usu_cpf)
                VALUES 
                ('$usuario',
                '$senha', 
                '$nome', 
                '$cpf')
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







