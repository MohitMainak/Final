<?php 
include 'header.php'; 
include 'db_connect.php';
?>
<div class="container mt-5">
  <h3>All Records</h3>
  <?php
  $conn = getConnection();
  $res = $conn->query("SELECT * FROM string_info");

  while ($row = $res->fetch_assoc()) {
    echo "<p>ID: {$row['string_id']} | Message: {$row['message']}</p>";
  }

  closeConnection($conn);
  ?>

  <form method="post" action="showAll.php" class="mt-4">
    <div class="mb-3">
      <label for="id" class="form-label">Enter ID to delete</label>
      <input type="number" class="form-control" name="delete_id" required>
    </div>
    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
  </form>

  <?php
  if (isset($_POST['delete'])) {
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM string_info WHERE string_id = ?");
    $stmt->bind_param("i", $_POST['delete_id']);
    $stmt->execute();
    echo "<p class='text-success mt-3'>Deleted successfully!</p>";
    $stmt->close();
    closeConnection($conn);
  }
  ?>
</div>
</body>
</html>
