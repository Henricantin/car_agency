<?php
include "../connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM customers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Cliente deletado com sucesso.";
    } else {
        echo "Erro ao deletar cliente: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    echo "<br><a href='list_customers.php'>Voltar para a lista de clientes</a>";
}
?>