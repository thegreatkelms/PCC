<?php
include("conn.php");

function login($username, $password, $state) {
    global $conn;
    $sql = "SELECT * FROM login WHERE Username = ? AND Password = ? AND State = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $password, $state);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION["ID"] = $row["ID"];
        $_SESSION["username"] = $row["Username"];
        $_SESSION["state"] = $row["State"];
        
        if ($state == 1) {
            header("Location: ../frontend/views/admin/dashboard.php");
        } else if ($state == 0) {
            header("Location: ../frontend/views/staff/dashboard.php");
        }
        exit();
    } else {
        echo "Invalid Email and Password";
    }
}

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $state = $_POST['state'];
    login($username, $password, $state);
} else {
    echo "failed";
}
?>