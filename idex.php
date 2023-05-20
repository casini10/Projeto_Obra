
<?php
include_once("pgbanco.php");
$email = $_POST['n1'];
$senha = $_POST['n2'];

$sql = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
$sql->bind_param("ss", $email, $senha);
$sql->execute();
$resultado = $sql->get_result();

if ($resultado->num_rows > 0) { 
    ?>
 <script>window.location.href="./loginCadastrarPro.html";</script>
<?php
}
else {
?>
<script>
    window.alert('usuario nao encontrado');
    window.location=('login.php');
</script>
<?php
}

$sql->close();
$conn->close();
?> 