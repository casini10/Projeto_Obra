<?php
include_once("pgbanco.php");
$nome = (isset($_POST['n1'])) ? $_POST['n1'] : null ;

if ($nome==null) {
    ?>
   <script>
   $a= confirm("categoria nao definida. Deseja retornar para Categorias?");
    if ($a==true) {
        window.location=("cadastrarCategoria.php");
    }else{
    console.log("ERRO!");
    }
   </script>
<?php
}else {
    $sql="INSERT INTO categorias(nmCategoria)";
    $sql.=" VALUES ('$nome')";
    mysqli_query($conn,$sql);
    ?>
    <script>
        window.location=("loginCadastrarPro.html");
    </script>
<?php
    
}

?>