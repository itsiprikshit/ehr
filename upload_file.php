<center><?php
//$allowedExts = array("gif", "jpeg", "jpg", "png","mp3","mp4","mpeg","pdf");

for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
$j = $i;
//$temp = explode(".", $_FILES["file"]["name"][$i]);                 
//$extension = end($temp);                                       
//if (in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"][$i] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br>";
  } else {
    echo ++$j."."."<br>Upload: " . $_FILES["file"]["name"][$i] . "<br>";
    echo "Type: " . $_FILES["file"]["type"][$i] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"][$i] / (1024*1024)) . " mb<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"][$i] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"][$i])) {
      echo $_FILES["file"]["name"][$i] . " already exists.<br><br> ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"][$i],
      "upload/" . $_FILES["file"]["name"][$i]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"][$i]."<br><br>";
    }
  }
//} else {
//  echo "Invalid file.<br><br>";
//}
}
?>
<h1 style="text-transform:uppercase;color:#ff6600">FILE UPLOADED</h1>
<h1><a href="index.php">Go Back</a></h1>
</center>