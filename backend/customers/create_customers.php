<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (name, email, phone, address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    if ($stmt->execute()) {
        echo "Cliente criado com sucesso.";
        echo "<br><a href='../../frontend/customers.html'>Voltar</a>";
    } else {
        echo "Erro ao criar cliente: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>