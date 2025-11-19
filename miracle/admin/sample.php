<?php include 'config.php'; ?>
<?php

//`event_id`, `event_name`, `event_date`,
//  `event_time`, `event_place`, `event_information`, `event_description`,
//  `event_price`, `event_aminities`, `event_location`, `event_image`SELECT * FROM `event` WHERE 1
//  $getuser = mysqli_query($conn, "select * from event");
//  while($getstorevalue = mysqli_fetch_array($getuser)){
//     echo    $event_image = $getstorevalue['event_image'];
//     echo "<br>";
   
 
//  }

 if(isset($_POST['addevent'])){

   
    $event_name = $_POST['event_name'];

   $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
     $event_place = $_POST['event_place'];
      $event_information = $_POST['event_information'];
       $event_description = $_POST['event_description'];
        $event_aminities = $_POST['event_aminities'];
         $event_location = $_POST['event_location'];
          $event_price = $_POST['event_price'];
        //   $event_image = $_POST['event_image'];
        

  // Handle image upload
  $image_name = $_FILES['event_image']['name'];
  $image_tmp = $_FILES['event_image']['tmp_name'];
  $upload_dir = "eventimage/";
  if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
  }
  $target_file = $upload_dir . basename($image_name);
  move_uploaded_file($image_tmp, $target_file);

  
  // Insert into database
  $sql = "INSERT INTO event (event_name, event_date, event_time, event_place, event_information, event_description, event_price, event_aminities, event_location, event_image)
          VALUES ('$event_name', '$event_date', '$event_time', '$event_place', '$event_information', '$event_description', '$event_price', '$event_aminities', '$event_location', '$target_file')";

  if ($conn->query($sql) === TRUE) {
    echo "<h3>New event added successfully!</h3>";
    echo "<a href='view_event.php'>View All Events</a>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



 }
?>