<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `tbl_swimmingpool`(`customername`, `date`, `hours`, `amount`,`tax`) VALUES ('$customername', '$date', '$hours', '$amount','$tax')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_swimmingpool.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_swimmingpool.php";
</script>
<?php } ?>