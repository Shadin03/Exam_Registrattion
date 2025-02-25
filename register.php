<?php
include('../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $exam_name = $_POST['exam_name'];
    $seat_number = $_POST['seat_number'];

    $conn->autocommit(FALSE);

    try {
        $stmt = $conn->prepare("SELECT * FROM students WHERE seat_number = ? FOR UPDATE");
        $stmt->bind_param("i", $seat_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            throw new Exception("Seat is already booked.");
        }

        $stmt = $conn->prepare("INSERT INTO students (student_name, student_id, exam_name, seat_number) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $student_name, $student_id, $exam_name, $seat_number);

        if ($stmt->execute()) {
            $conn->commit();
            header("Location: success.php");
            exit();
        } else {
            throw new Exception("Error in registration.");
        }
    } catch (Exception $e) {
        $conn->rollback();
        echo "Registration failed: " . $e->getMessage();
    }

    $conn->autocommit(TRUE);
    $conn->close();
}
?>
