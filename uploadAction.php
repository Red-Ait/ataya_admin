<!-- PHP -->
<?php

require 'auth.php';

// Checking the file was submitted
if(!isset($_FILES['userfile'])) { echo '<p>Please Select a file</p>'; 
echo '<script>
window.location.replace("galeri.php");
</script>';}
 
else
{ try {
$msg = upload(); // function calling to upload an image
echo $msg;
}
catch(Exception $e) {
echo $e->getMessage();
echo 'Sorry, Could not upload file';
echo '<script>
window.location.replace("galeri.php");
</script>';
}
}
 
 
function upload() {
//include "database/dbco.php";
$maxsize = 100000000; //set to approx 10 MB
 
//check associated error code
if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
 
//check whether file is uploaded with HTTP POST
if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {
 
//checks size of uploaded image on server side
if( $_FILES['userfile']['size'] < $maxsize) {
 
//checks whether uploaded file is of image type
if($_FILES['userfile']['type']=="image/gif" || $_FILES['userfile']['type']== "image/png" || $_FILES['userfile']['type']== "image/jpeg" || $_FILES['userfile']['type']== "image/JPEG" || $_FILES['userfile']['type']== "image/PNG" || $_FILES['userfile']['type']== "image/GIF") {
 
// prepare the image for insertion
$imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
 
// put the image in the db...
// database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ataya';
$dataTime = date("Y-m-d H:i:s");
 
$con=mysqli_connect($host, $user, $pass,$db) OR DIE (mysqli_connect_error());
 
// select the db
/*mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());*/
 
// our sql query
 
$sql = "INSERT INTO images
(name,image, size,created) 
VALUES
('".$_FILES['userfile']['name']."','".$imgData."','".$_FILES['userfile']['size']."','".$dataTime."');";
mysqli_query($con,$sql) or die("Error in Query insert: " . mysqli_error($con));
// insert the image
 
$msg='<p>Image successfully saved in database . </p>';
mysqli_close($con);
}
else
$msg="<p>Uploaded file is not an image.</p>";
}
else {
// if the file is not less than the maximum allowed, print an error
$msg='<div>File exceeds the Maximum File limit</div>
<div>Maximum File limit is '.$maxsize.' bytes</div>
<div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
' bytes</div><hr />';
}
}
else
$msg="File not uploaded successfully.";
echo '<script>
window.location.replace("galeri.php?msg=ok");
</script>';
 
}
else {
$msg= file_upload_error_message($_FILES['userfile']['error']);
echo '<script>
window.location.replace("galeri.php?msg='.$msg.'");
</script>';
}
return $msg;
}
 
// Function to return error message based on error code
 
function file_upload_error_message($error_code) {
switch ($error_code) {
case UPLOAD_ERR_INI_SIZE:
return 'UPLOAD_ERR_INI_SIZE';
case UPLOAD_ERR_FORM_SIZE:
return'UPLOAD_ERR_FORM_SIZE';
case UPLOAD_ERR_PARTIAL:
return 'UPLOAD_ERR_PARTIAL';
case UPLOAD_ERR_NO_FILE:
return 'UPLOAD_ERR_NO_FILE';
case UPLOAD_ERR_NO_TMP_DIR:
return 'UPLOAD_ERR_NO_TMP_DIR';
case UPLOAD_ERR_CANT_WRITE:
return 'UPLOAD_ERR_CANT_WRITE';
case UPLOAD_ERR_EXTENSION:
return 'UPLOAD_ERR_EXTENSION';
default:
return 'Unknown upload error';
}
}
              echo '<script>
                            window.location.replace("dashboard.php");
                            </script>';
               
?>
</div>
 
</body>
</html>