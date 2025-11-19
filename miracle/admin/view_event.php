<?php include 'config.php';

// ---- QUERY EVENTS ----
$sql = "SELECT * FROM event ORDER BY event_id ASC";
$result = $conn->query($sql);


if (isset($_GET['action']) == 'delete') {
$id  = $_GET['id'];
 $sql = "DELETE FROM event WHERE event_id = '$id';";
$query = mysqli_query($conn,$sql) or die("There was a problem while deleting: " . mysqli_error());
echo "<div style='width: 350px; text-align: center; margin: 20% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update the record loading...</div>";
echo "<script type='text/javascript'>window.location = 'view_event.php'</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>View Events</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f8;
      padding: 30px;
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      background: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    th, td {
      padding: 10px 12px;
      border: 1px solid #ddd;
      text-align: left;
      vertical-align: top;
    }
    th {
      background: #2563eb;
      color: #fff;
    }
    tr:nth-child(even) { background: #f9f9f9; }
    img {
      width: 120px;
      height: auto;
      border-radius: 6px;
    }
    .container {
      max-width: 1200px;
      margin: auto;
    }
    .add-btn {
      display: inline-block;
      margin-bottom: 20px;
      padding: 10px 15px;
      background: #2563eb;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
    }
    .add-btn:hover { background: #1d4ed8; }
  </style>
 
    <script>

function confirmDelete(idurl)
{
go_on = confirm("Are you sure you want to delete? ");
if(go_on)
{
document.location.href=idurl;
}
}
</script>

</head>
<body>
<div class="container">
  <h2>🎟️ All Events</h2>
  <a href="eventadd.php" class="add-btn">➕ Add New Event</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Date</th>
      <th>Time</th>
      <th>Place</th>
      <th>Information</th>
      <th>Description</th>
      <th>Price</th>
      <th>Amenities</th>
      <th>Location</th>
      <th>Image</th>
        <th>Modify</th>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['event_id']) ?></td>
        <td><?= htmlspecialchars($row['event_name']) ?></td>
        <td><?= htmlspecialchars($row['event_date']) ?></td>
        <td><?= htmlspecialchars($row['event_time']) ?></td>
        <td><?= htmlspecialchars($row['event_place']) ?></td>
        <td><?= htmlspecialchars($row['event_information']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['event_description'])) ?></td>
        <td>$<?= htmlspecialchars($row['event_price']) ?></td>
        <td><?= htmlspecialchars($row['event_aminities']) ?></td>
        <td><?= htmlspecialchars($row['event_location']) ?></td>
        <td>
          <?php if (!empty($row['event_image'])): ?>
            <img src="<?= htmlspecialchars($row['event_image']) ?>" alt="Event Image">
          <?php else: ?>
            <em>No image</em>
          <?php endif; ?>
        </td>
             <td>
          <a href="editevent.php?id=<?= $row['event_id'] ?>" class="action-btn edit-btn">✏️ Edit</a>
          <a href="javascript:void(0)" onclick="confirmDelete('view_event.php?action=delete&id=<?= $row['event_id'] ?>')" class="action-btn delete-btn">🗑️ Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="11" style="text-align:center; padding:20px;">No events found.</td></tr>
    <?php endif; ?>
  </table>
</div>
</body>
</html>
<?php $conn->close(); ?>
