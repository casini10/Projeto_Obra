<?php
include_once("pgbanco.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html{
    background-color:A9A9A9	;
}
body{
    border:2px solid A9A9A9;
}
input {
border: 2px solid; /* Define uma borda de 2 pixels sólida na cor preta */
border-radius: 5px; /* Define o raio da borda como 0, criando uma borda quadrada */
padding: 5px; /* Adiciona um espaço interno de 5 pixels para o conteúdo do input */
line-height: 20px;

}
label {
font-weight: bold; /* Define o texto do label como negrito */
line-height: 40px;
}
form{
background-color:808080;
width:65%;
height:70%;
border-radius: 5px;
border:2px solid black;

}

    </style>
</head>
<body>
    <center>
    <form action="idex.php" method="post">
        <label for="n1"><strong> Email:<strong>  </label><br><br>
        <input type="email" name="n1" id="n1"><br><br><br><br>
        <label for="n2">Senha: </label><br><br>
        <input type="password" name="n2" id="n2"><br><br><br><br>
        <input type="submit" value="acessar">
    </form>
    </center>
</body>
</html>