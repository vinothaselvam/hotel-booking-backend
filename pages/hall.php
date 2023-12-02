<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
if(isset($_POST["btn_save"])){

/*echo "<pre>"; */
extract($_POST);

/*print_r($roomname[1]); */
$tax=explode(',',$_POST['tax']);
/*print_r($tax[1]); */

$discount=explode(',',$_POST['discount']);
//print_r($discount[1]); 
?>

<?php 
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
$totalamountperday = $hallcharge   ;echo "<br>"; /*}*/
 $totalamount = $totalamountperday;
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
    
   $taxamount = $totalamount + $total1 + $electricity_amount + $kitchen_amount  - $total2 ;

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


   $sql = "INSERT INTO `tbl_hall`(`name`,`hallcharge`, `fromdate`, `todate`, `totalamount`, `taxamount`,`electricity_amount `,`kitchen_amount`,`discountper`,`discount`,`paid`,`created_date`,`taxid`, `tax`) VALUES ('$name','$hallcharge', '$fromdate', '$todate', '0', '0','$electricity_amount','$kitchen_amount','0','0', '0', CURDATE(),'0','0')";

   
//print_r($sql); exit;
 if ($conn->query($sql) === TRUE) {

      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="/view_hall.php";
</script>
<?php
} else {

      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="/view_hall.php";
</script>
<?php } ?>

