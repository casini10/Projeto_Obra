
<?php
include_once("pgbanco.php");
?>
<?php
$email = (isset($_POST['e1'])==true) ? $_POST['e1']: null ;
$senha = (isset($_POST['s1'])==true) ? $_POST['s1'] : null ;

if ($email==null || $senha==null) {
    ?>
   <script>
    window.alert('senha ou email não identificados.');
    window.location=('cadastrar.php');
    </script>
    <?php
  }if ($email!=null && $senha!=null) {
    $sql = $conn->prepare("SELECT * FROM usuarios WHERE nome = ? AND email = ?");
$sql->bind_param("ss", $email, $senha);
$sql->execute();
$resultado = $sql->get_result();
   if ($resultado->num_rows > 0) {
        echo "Usuario ja existe.";
    }else{
        $sql="INSERT INTO usuarios(email,senha)";
        $sql.="VALUES ('$email', '$senha')";
        ?>
        <script>
        alert("Cadastro feito com sucesso");
        </script>
      <?php
    }
        $z=$conn->query($sql);
    
        if ($z==TRUE) {
        ?>
    <script>
    window.location=("login.php");
   </script>
  <?php
        }
      }
   ?>
    