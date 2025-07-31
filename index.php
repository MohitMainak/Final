<?php 
include 'header.php'; 
include 'db_connect.php';
?>
<div class="container mt-5">
  <form method="post" action="index.php">
    <div class="mb-3">
      <label for="message" class="form-label">Enter Message</label>
      <input type="text" class="form-control" name="message" maxlength="50" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <a href="showAll.php" class="btn btn-secondary">Show all records</a>
  </form>
</div>

<?php
if (isset($_POST['submit'])) {
  $conn = getConnection();

  $stmt = $conn->prepare("INSERT INTO string_info (message) VALUES (?)");
  $stmt->bind_param("s", $_POST['message']);
  $stmt->execute();
  $stmt->close();
  closeConnection($conn);

  echo "<p class='text-success text-center mt-3'>Message saved!</p>";
}
?>
</body>
</html>