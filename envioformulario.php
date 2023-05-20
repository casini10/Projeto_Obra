<?php
include_once("pgbanco.php");

$nome = isset($_POST['n1']) ? $_POST['n1'] : null;
$cat = isset($_POST['n2']) ? $_POST['n2'] : null;
$val = isset($_POST['n3']) ? $_POST['n3'] : null;
$quant = isset($_POST['n4']) ? $_POST['n4'] : null;
$med = isset($_POST['n5']) ? $_POST['n5'] : null;

if ($nome == null || $cat == null || $val == null || $quant == null || $med == null) {
    ?>
    <script>
        var a = confirm("Campo vazio. Deseja voltar à página anterior?");
        if (a == true) {
            window.location = "cadastrarformulario.php";
        } else {
            alert("Produto não foi cadastrado.");
        }
    </script>
    <?php
} else {
    $val = str_replace(',', '.', $val); // Substitui a vírgula por ponto (caso seja inserida como separador decimal)
    
    $sql = $conn->prepare("SELECT * FROM produtos WHERE nmProduto = ? AND categoria_id = ?");//prepare aqui meio que "prepara" para depois receber a variavel.
    $sql->bind_param("si", $nome, $cat);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows > 0) {
        $exibir = $resultado->fetch_assoc();
        $novaQuantidade = $exibir['quantidade']; + $quant;
        $novoValor = $exibir['valor']; + $val;
        $sql = $conn->prepare("UPDATE produtos SET quantidade = ?, valor = ? WHERE nmProduto = ? AND categoria_id = ?");
        $sql->bind_param("ddsi", $novaQuantidade, $novoValor, $nome, $cat);
    } else {
        $sql = $conn->prepare("INSERT INTO produtos (nmProduto, categoria_id, valor, quantidade, medida_id) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param("siddi", $nome, $cat, $val, $quant, $med);
    }

    if ($sql->execute()) {
        echo "Produto cadastrado/atualizado com sucesso.";
    } else {
        echo "Erro ao cadastrar/atualizar produto: " . $conn->error;
    }

    $sql->close();
    $conn->close();
}
