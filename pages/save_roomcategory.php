
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `room category`(`roomcategory`,`adultno`, `kidno`,`facilities`) VALUES ('$roomcategory','$adultno','$kidno','$facilities')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_roomcategory.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../room_category.php";
</script>
<?php } ?>