<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cpf = $_POST['cpf'];
    $address = $_POST['address'];

    $sql = "UPDATE customers SET name=?, email=?, phone=?, cpf=?, address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $name, $email, $phone, $cpf, $address, $id);

    if ($stmt->execute()) {
        echo "Customer updated successfully!";
        echo "<br><a href='list_customers.php'>Back to list</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM customers WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    ?>

    <h1>Edit Customer</h1>
    <form action="update_customer.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
        <input type="text" name="name" value="<?php echo $customer['name']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $customer['email']; ?>"><br>
        <input type="text" name="phone" value="<?php echo $customer['phone']; ?>"><br>
        <input type="text" name="cpf" value="<?php echo $customer['cpf']; ?>"><br>
        <input type="text" name="address" value="<?php echo $customer['address']; ?>"><br>
        <button type="submit">Update</button>
    </form>

    <?php
}
?>