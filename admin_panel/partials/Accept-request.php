<?php
include("config.php"); 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE students SET request = 'accepted' WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $id);

    if(mysqli_stmt_execute($stmt)) {
        echo "<alert>Record updated successfully</alert>";
        header("Location: ../buses.php");

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "ID parameter is missing";
}
?>
