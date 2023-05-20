<?php
include_once("pgbanco.php");
$a=0;
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function confirmarExclusao(id, prod){
            if (window.confirm("Deseja realmente excluir o registro? \n" + id + " - " + prod + "\n\n???")) {
                window.location = "excluirProduto.php?idProduto="+id;                
            }
        }
    </script>
</head>
<body>

<?php
$sql= "SELECT * FROM produtos ORDER BY nmProduto";
$x=$conn->query($sql);

if ($x->num_rows>0) {
?>
<table>
    <tr>
        <td>nmProduto</td>
        <td>Categoria</td>
        <td>quantidade</td>
        <td>medida</td>
        <td>valor</td>
    </tr>
   
<?php
while ($exibir=$x->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $exibir['nmProduto']?></td>
        <?php
        $sqlCategoria = "select * from categorias where id = " . $exibir["categoria_id"];
        $dadosCategoria = $conn->query($sqlCategoria);
        $exibirCategoria = $dadosCategoria->fetch_assoc();
        ?>
        <td><?php echo $exibirCategoria['nmCategoria'] ?></td>
        
        <td><?php echo $exibir['quantidade']?></td>
        <td><?php echo $exibir['medida_id']?></td>
        <td><?php echo $exibir['valor']?></td>
    </tr>
<?php
 $a+=$exibir['valor'];
}
?>
<td>valor total: R$<?php echo $a?></td>
</table>
<?php
}
?>
    
</body>
</html>