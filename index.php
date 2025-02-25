<?php include('includes/header.php'); ?>

<h2 class="text-center">Online Exam Registration</h2>
<form action="pages/register.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" class="form-control" name="student_name" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Student ID</label>
        <input type="text" class="form-control" name="student_id" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Exam Name</label>
        <input type="text" class="form-control" name="exam_name" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Seat Number</label>
        <input type="number" class="form-control" name="seat_number" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php include('includes/footer.php'); ?>
