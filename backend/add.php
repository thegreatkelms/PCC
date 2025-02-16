<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $pos_title = $_POST['pos_title'];
    $salary = $_POST['salary'];
    $step = $_POST['step'];
    $basic_salary = $_POST['basic_salary'];
    $premium = $_POST['premium'];
    $name_of_incumbent = $_POST['name_of_incumbent'];
    $date_hired = $_POST['date_hired'];
    $length_of_service = $_POST['length_of_service'];
    $status = $_POST['status'];
    $date_of_separation = $_POST['date_of_separation'];
    $place_of_assignment = $_POST['place_of_assignment'];
    $permanent_or_csp = $_POST['permanent_or_csp'];
    $remarks = $_POST['remarks'];

    // Debugging: Log the received values
    error_log("Received values: " . print_r($_POST, true));

    $query = "INSERT INTO staff (Name, Pos_Title, Salary, Step, Basic_Salary, Premium, Name_of_Incumbent, Date_hired, Length_of_Service, Status, Date_of_Separation, Place_of_Assignment, Permanent_or_CSP, Remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssidissssssss", $name, $pos_title, $salary, $step, $basic_salary, $premium, $name_of_incumbent, $date_hired, $length_of_service, $status, $date_of_separation, $place_of_assignment, $permanent_or_csp, $remarks);

    if ($stmt->execute()) {
        header('Location: ../frontend/views/admin/dashboard.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>