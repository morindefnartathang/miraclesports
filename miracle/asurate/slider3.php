<?php
session_start();
include 'function.php';

// echo phpinfo();


error_reporting(E_ALL);
ini_set('display_errors', 1);


    if (isset($_POST['upload_video']) && $_POST['upload_video'] == 'add_video') {
 
 
    $content=$_POST['content'];
 
    
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/admin/classVideo/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['video']['tmp_name'];
       echo $fileName = basename($_FILES['video']['name']);
        $fileSize = $_FILES['video']['size'];
        $fileType = mime_content_type($fileTmpPath);
        $allowedTypes = ['video/mp4', 'video/webm', 'video/ogg'];

        if (!in_array($fileType, $allowedTypes)) {
            echo json_encode(["status" => "error", "message" => "Invalid file type."]);
            exit;
        }

        if ($fileSize > 100 * 1024 * 1024) {
            echo json_encode(["status" => "error", "message" => "File size exceeds 100 MB limit."]);
            exit;
        }

        $destPath = $uploadDir . uniqid('video_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $videoPath=basename($destPath);
        
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            mysqli_query($connect,"INSERT INTO `home_slider2` (`video_file`,`content`) VALUES ('$videoPath','$content')");
            echo "<script>alert('video uploaded');window.location.href='home.php';</script>";
        } else {
            echo "<script>alert('Failed to move uploaded file');window.location.href='home.php';</script>";
            
        }
    } else {
        $error=$_FILES['video']['error'];
        echo"<script>alert('Failed to upload file ,$error ');</script>";;
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Video Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .upload-container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
        .drop-zone {
            border: 2px dashed #008cba;
            padding: 20px;
            cursor: pointer;
            background: #f9f9f9;
            position: relative;
        }
        .drop-zone:hover {
            background: #e0f7fa;
        }
        .drop-zone input {
            display: none;
        }
        .progress-container {
            display: none;
            margin-top: 10px;
        }
        .progress-bar {
            width: 100%;
            height: 10px;
            background: #ddd;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 10px;
        }
        .progress-bar div {
            height: 100%;
            width: 0%;
            background: #008cba;
            transition: width 0.3s;
        }
        .video-preview {
            display: none;
            margin-top: 10px;
        }
        button {
            background: #008cba;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        button:hover {
            background: #005f73;
        }
    </style>
</head>
<body>

<form class="upload-container" action="" method="post" enctype="multipart/form-data">
    
 
    
    <h6>Upload a Video</h6>
    <p>Allowed file types: MP4, WebM, OGG. Max size: 100 MB.</p>


   <div style="margin-bottom:40px">
        <input type="text" class="form-control" name="content" placeholder="Enter Content for this vedio (just for your reference)">
        
    </div>
    
    



    <div class="drop-zone" id="drop-zone">
        <p>Drag & Drop a video here or <span style="color: #008cba; text-decoration: underline;">click to browse</span></p>
        <input type="file" id="videoInput" name="video" accept="video/*">
    </div>

    <video id="videoPreview" class="video-preview" width="100%" controls></video>

    <div class="progress-container">
        <div class="progress-bar"><div></div></div>
    </div>

    <button id="uploadBtn" type="submit" name="upload_video" value="add_video" disabled>Upload Video</button>
</form>

<script>
    const dropZone = document.getElementById('drop-zone');
    const videoInput = document.getElementById('videoInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const progressBar = document.querySelector('.progress-bar div');
    const progressContainer = document.querySelector('.progress-container');
    const videoPreview = document.getElementById('videoPreview');

    let selectedFile = null;

    dropZone.addEventListener('click', () => videoInput.click());

    dropZone.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropZone.style.background = '#e0f7fa';
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.style.background = '#f9f9f9';
    });

    dropZone.addEventListener('drop', (event) => {
        event.preventDefault();
        dropZone.style.background = '#f9f9f9';
        selectedFile = event.dataTransfer.files[0];
        previewVideo(selectedFile);
    });

    videoInput.addEventListener('change', () => {
        selectedFile = videoInput.files[0];
        previewVideo(selectedFile);
    });

    function previewVideo(file) {
        if (file && file.type.startsWith('video/')) {
            const fileURL = URL.createObjectURL(file);
            videoPreview.src = fileURL;
            videoPreview.style.display = 'block';
            uploadBtn.disabled = false;
        } else {
            alert('Please select a valid video file.');
            videoPreview.style.display = 'none';
            uploadBtn.disabled = true;
        }
    }

      uploadBtn.addEventListener('click', () => {
        if (!selectedFile) return;

        const formData = new FormData();
        formData.append('video', selectedFile);
        formData.append('upload_video', 'add_video');  // <-- Add this line

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);

        xhr.upload.onprogress = (event) => {
            if (event.lengthComputable) {
                const percentComplete = (event.loaded / event.total) * 100;
                progressBar.style.width = percentComplete + '%';
                progressContainer.style.display = 'block';
            }
        };

        xhr.onload = () => {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                alert(response.message);
                if (response.status === "success") {
                    videoPreview.src = "";
                    videoPreview.style.display = "none";
                    progressContainer.style.display = "none";
                    uploadBtn.disabled = true;
                }
            } else {
                alert('Error uploading file.');
            }
        };

        xhr.onerror = () => alert('Upload failed. Please try again.');

        xhr.send(formData);
    });

</script>

</body>
</html>
