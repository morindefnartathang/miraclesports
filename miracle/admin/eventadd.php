<?php include 'config.php'; ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Add Event</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 600px;
    }
    h2 { text-align: center; margin-bottom: 20px; }
    label { display: block; margin-top: 10px; font-weight: bold; }
    input, textarea, select {
      width: 100%;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-top: 5px;
      box-sizing: border-box;
    }
    button {
      margin-top: 20px;
      padding: 10px 15px;
      background-color: #2563eb;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #1d4ed8;
    }
  </style>
</head>
<body>
  <form action="sample.php" method="POST" enctype="multipart/form-data">
    <h2>Add New Event</h2>

    <label for="event_name">Event Name</label>
    <input type="text" id="event_name" name="event_name" >

    <label for="event_date">Event Date</label>
    <input type="date" id="event_date" name="event_date" >

    <label for="event_time">Event Time</label>
    <input type="time" id="event_time" name="event_time" >

    <label for="event_place">Event Place</label>
    <input type="text" id="event_place" name="event_place">

    <label for="event_information">Event Information</label>
    <input type="text" id="event_information" name="event_information">

    <label for="event_description">Event Description</label>
    <textarea id="event_description" name="event_description" rows="4"></textarea>

    <label for="event_price">Event Price ($)</label>
    <input type="number" step="0.01" id="event_price" name="event_price">

    <label for="event_amenities">Event Amenities</label>
    <input type="text" id="event_amenities" name="event_aminities">

    <label for="event_location">Event Location</label>
    <input type="text" id="event_location" name="event_location">

    <label for="event_image">Event Image</label>
    <input type="file" id="event_image" name="event_image" accept="image/*">

    <button type="submit" name="addevent">Save Event</button>
  </form>
</body>
</html>
