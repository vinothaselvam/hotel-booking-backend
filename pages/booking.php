

<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
if(isset($_POST["btn_save"])){

/*echo "<pre>"; */
extract($_POST);
$roomname=explode(',',$_POST['roomname']);
/*print_r($roomname[1]); */
$tax=explode(',',$_POST['tax']);
/*print_r($tax[1]); */

$discount=explode(',',$_POST['discount']);
//print_r($discount[1]); 
?>

<?php $earlier = new DateTime($_POST['fromdate']);
$later = new DateTime($_POST['todate']);

$diff = $later->diff($earlier)->format("%a");
/*echo "$diff";echo "<br>";*/
/*
$sql = "SELECT * FROM `tbl_booking`";
$result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
  $sql2 = "SELECT * FROM `tbl_rooms`WHERE id='".$row['roomname']."'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();*/

      $c1 = "SELECT * FROM `tbl_tax`" ;
     $result6 = $conn->query($c1);
     $row6=$result6->fetch_assoc();
      extract($row6);
      

    

     $c2 = "SELECT * FROM `tbl_discount`" ;
     $result7 = $conn->query($c2);
     $row7=$result7->fetch_assoc();
      extract($row7);
    
    $totalamount = 0.0;
    $totalamountperday = $roomname[1];

$totalamountperday = $_POST['kidno'] * $roomname[2] + $_POST['adultno'] * $roomname[1]   ;echo "<br>";  

    $totalamount = $totalamountperday * $diff;
/*echo $totalamount; */
   $taxamount = 0.0;
   $num = $totalamount * $tax[1];
   $deno = 100;
   $total1 = $num / $deno;
   $taxrupee = $total1 ;
   $taxid = $tax[1];
   
   $num1 = $totalamount * $discount[1];
   $deno1 = 100;
   $total2 = $num1 / $deno1;
   $discountrupee = $total2 ;
 $discountper = $discount[1];
    
   $taxamount = $totalamount + $total1 + $electricity_amount + $kitchen_amount + $Cleaning_charges - $total2 + $swimming;

  // $paid = 0.0;
   /*echo if($paid!=Null){
  $sql = "INSERT INTO `tbl_booking`(`name`, `roomname`, `kidno`, `adultno`, `fromdate`, `todate`,`taxamount`, `totalamount`, `paid`) VALUES ('$name', '$roomname[0]', '$kidno', '$adultno', '$fromdate', '$todate', '$taxamount', '$totalamount', '$paid')";
} echo "<pre>"; print_r($sql) exit; else{
  $paid = 0;
  $sql = "INSERT INTO `tbl_booking`(`name`, `roomname`, `kidno`, `adultno`, `fromdate`, `todate`,`taxamount`, `totalamount`, `paid`) VALUES ('$name', '$roomname[0]', '$kidno', '$adultno', '$fromdate', '$todate', '$taxamount', '$totalamount', '$paid')";
}*/
   /*echo $taxamount; */
} 

$paid = 0;

   $sql = "INSERT INTO `tbl_booking`(`name`, `roomname`, `kidno`, `adultno`, `fromdate`, `todate`,`taxamount`,`taxid`,`tax`, `totalamount`,`electricity_amount`,`kitchen_amount`,`Cleaning_charges`,`discountper`,`discount`,`swimming`,`paid`, `created_date` ) VALUES ('$name', '$roomname[0],', '$kidno', '$adultno', '$fromdate', '$todate', '$taxamount','$taxid','$taxrupee', '$totalamount','$electricity_amount','$kitchen_amount','$Cleaning_charges','$discountper','$discountrupee','$swimming', '$paid', CURDATE())";

   

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php } ?>

