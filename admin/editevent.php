<?php
include 'config.php';

// ✅ Step 1: Get Event ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Invalid event ID'); window.location.href='view_event.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// ✅ Step 2: Fetch Existing Event Data
$sql = "SELECT * FROM event WHERE event_id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 1) {
    echo "<script>alert('Event not found!'); window.location.href='view_event.php';</script>";
    exit;
}

$row = mysqli_fetch_assoc($result);

// ✅ Step 3: Update When Form Submitted
if (isset($_POST['update'])) {
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $event_time = mysqli_real_escape_string($conn, $_POST['event_time']);
    $event_place = mysqli_real_escape_string($conn, $_POST['event_place']);
    $event_information = mysqli_real_escape_string($conn, $_POST['event_information']);
    $event_description = mysqli_real_escape_string($conn, $_POST['event_description']);
    $event_price = mysqli_real_escape_string($conn, $_POST['event_price']);
    $event_aminities = mysqli_real_escape_string($conn, $_POST['event_aminities']);
    $event_location = mysqli_real_escape_string($conn, $_POST['event_location']);

    // ✅ Handle Image Upload
    $event_image = $row['event_image']; // old image by default
    if (!empty($_FILES['event_image']['name'])) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES['event_image']['name']);
        if (move_uploaded_file($_FILES['event_image']['tmp_name'], $target_file)) {
            $event_image = $target_file;
        }
    }

    // ✅ Update Query
    $update_query = "UPDATE event SET
        event_name='$event_name',
        event_date='$event_date',
        event_time='$event_time',
        event_place='$event_place',
        event_information='$event_information',
        event_description='$event_description',
        event_price='$event_price',
        event_aminities='$event_aminities',
        event_location='$event_location',
        event_image='$event_image'
        WHERE event_id=$id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Event updated successfully!'); window.location.href='view_event.php';</script>";
    } else {
        echo "<script>alert('Error updating event: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Event</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f8;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 700px;
        margin: 40px auto;
        background: white;
        padding: 25px 35px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        color: #2563eb;
        margin-bottom: 25px;
    }
    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #333;
    }
    input[type="text"],
    input[type="date"],
    input[type="time"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-top: 6px;
        resize: none;
    }
    textarea {
        height: 80px;
    }
    input[type="file"] {
        margin-top: 10px;
    }
    button {
        width: 100%;
        margin-top: 20px;
        background: #2563eb;
        color: white;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
    }
    button:hover {
        background: #1d4ed8;
    }
    .back-link {
        display: inline-block;
        margin-bottom: 15px;
        text-decoration: none;
        color: #2563eb;
    }
    img {
        margin-top: 10px;
        width: 150px;
        border-radius: 6px;
    }
</style>
</head>
<body>
<div class="container">
    <a href="view_event.php" class="back-link">⬅ Back to Events</a>
    <h2>Edit Event</h2>

    <form method="POST" enctype="multipart/form-data">
        <label>Event Name:</label>
        <input type="text" name="event_name" value="<?= htmlspecialchars($row['event_name']) ?>" required>

        <label>Event Date:</label>
        <input type="date" name="event_date" value="<?= htmlspecialchars($row['event_date']) ?>" required>

        <label>Event Time:</label>
        <input type="time" name="event_time" value="<?= htmlspecialchars($row['event_time']) ?>" required>

        <label>Event Place:</label>
        <input type="text" name="event_place" value="<?= htmlspecialchars($row['event_place']) ?>" required>

        <label>Event Information:</label>
        <textarea name="event_information"><?= htmlspecialchars($row['event_information']) ?></textarea>

        <label>Event Description:</label>
        <textarea name="event_description"><?= htmlspecialchars($row['event_description']) ?></textarea>

        <label>Event Price:</label>
        <input type="number" name="event_price" value="<?= htmlspecialchars($row['event_price']) ?>" required>

        <label>Amenities:</label>
        <input type="text" name="event_aminities" value="<?= htmlspecialchars($row['event_aminities']) ?>">

        <label>Location:</label>
        <input type="text" name="event_location" value="<?= htmlspecialchars($row['event_location']) ?>">

        <label>Event Image:</label>
        <?php if (!empty($row['event_image'])): ?>
            <br><img src="<?= htmlspecialchars($row['event_image']) ?>" alt="Event Image">
        <?php endif; ?>
        <input type="file" name="event_image" accept="image/*">
        <input type="hidden" name="sampleid" value="<?= htmlspecialchars($row['event_id']) ?>" />

        <button type="submit" name="update">💾 Update Event</button>
    </form>
</div>
</body>
</html>

<?php mysqli_close($conn); ?>
