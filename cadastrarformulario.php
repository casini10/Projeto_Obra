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
</head>
<body>
    <form action="envioformulario.php" method="post">
        <label for="n1">Nome do produto:  </label>
        <input type="text" name="n1" id="n1"><br><br><br>
        <label for="n2">Categoria: </label>
        <select name="n2" id="n2">
            <option value="0">--Categoria--</option>
            <?php
             $sql="SELECT * FROM categorias ORDER BY id";
             $y=$conn->query($sql);
             while ($exibir=$y->fetch_assoc()) {
                ?>
                <option value="<?php echo $exibir['id']?>"><?php echo $exibir['nmCategoria']?></option>

            <?php
             }
             ?>
        </select>
        <label for="n3">Valor: R$ </label>
        <input type="texte" name="n3" id="n3" placeholder="Modelo 15427,45"><br><br><br>

        <label for="n4">Quantidade: </label>
        <input type="number" name="n4" id="n4"> 
        <select name="n5" id="n5">
        <?php $sql="SELECT * FROM medidas ORDER BY id"; 
        $z=$conn->query($sql);
        while ($exibirM=$z->fetch_assoc()) { 
        ?>
        <option value="<?php echo $exibirM['id']?>"><?php echo $exibirM['nmMedida']?></option>

            <?php
             }
             ?>
        </select>
        <br><br><br><br>
        <input type="submit" value="enviar">
        <input type="reset" value="apagar">
    </form>
</body>
</html>