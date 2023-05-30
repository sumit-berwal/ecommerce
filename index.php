
<?php
   
// Check if the form was submitted
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Check if file was uploaded without errors
   
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
         
        $file_name     = $_FILES["photo"]["name"];
        $file_type     = $_FILES["photo"]["type"];
        $file_size     = $_FILES["photo"]["size"];
        $file_tmp_name = $_FILES["photo"]["tmp_name"];
        $file_error =  $_FILES["photo"]["error"];
         
        echo "<div style='text-align: center; background: #4CB974;
        padding: 30px 0 10px 0; font-size: 20px; color: #fff'>
        File Name: " . $file_name . "</div>";
         
        echo "<div style='text-align: center; background: #4CB974;
        padding: 10px; font-size: 20px; color: #fff'>
        File Type: " . $file_type . "</div>";
         
        echo "<div style='text-align: center; background: #4CB974;
        padding: 10px; font-size: 20px; color: #fff'>
        File Size: " . $file_size . "</div>";
         
        echo "<div style='text-align: center; background: #4CB974;
        padding: 10px; font-size: 20px; color: #fff'>
        File Error: " . $file_error . "</div>";
         
        echo "<div style='text-align: center; background: #4CB974;
        padding: 10px; font-size: 20px; color: #fff'>
        File Temporary Name: " . $file_tmp_name . "</div>";
         
    }
}
?>


<!DOCTYPE html>
<html>
 
<head>
    <title>GeeksForGeeks</title>
    <style type="text/css">
        div {
            background: #4CB974;
            text-align: center;
            font-size: 20px;
            padding: 30px;
            color: #fff;
            font-family: sans-serif;
        }
 
        form {
            border: 1px solid #1f1f1f;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
 
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <!--multipart/form-data ensures that form
        data is going to be encoded as MIME data-->
 
        <h2>Upload File</h2>
        <input type="file" name="photo" id="fileSelect"><br><br>
        <input type="submit" name="submit" value="Upload"><br><br>
        <!-- name of the input fields are going to be used in our php script-->
        <div> This Video is made for GFG</div>
    </form>
</body>
 
</html>