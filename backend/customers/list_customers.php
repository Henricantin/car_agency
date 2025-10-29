<?php
include "../connection.php";

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

echo "<h1>Lista de Clientes</h1>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>
                    <a href='update_customer.php?id={$row['id']}'>Editar</a> |
                    <a href='delete_customer.php?id={$row['id']}'>Excluir</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nenhum cliente encontrado</td></tr>";
}

echo "</table>";
$conn->close();
?>