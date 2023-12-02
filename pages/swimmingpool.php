
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
$diff = $later->diff($earlier)->format("%a");
/*echo "$diff";echo "<br>";*/
/*
$sql = "SELECT * FROM `tbl_booking`";
$result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
  $sql2 = "SELECT * FROM `tbl_rooms`WHERE id='".$ro w['roomname']."'";
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
   $totalamountperday = $_POST['amount'];
   $totalamount = $totalamountperday ;
/*echo $totalamount; */
   $taxamount = 0.0;
   $num = $totalamount * $tax[1];
   $deno = 100;
   $total1 = $num / $deno;
   $taxrupee = $total1 ;
   $taxid = $tax[1];
  
    
   $taxamount = $totalamount + $total1  ;

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

   $sql = "INSERT INTO `tbl_swimmingpool`(`customername`, `date`, `hours`, `amount`,`tax`,`taxamount`, `totalamount`,`taxid`,`paid`, `created_date` ) VALUES ('$customername', '$date,', '$hours', '$amount', '$tax',`$taxamount`, '$totalamount',`$taxid`, '$paid', CURDATE())";

   

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="view_swimmingpool.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_swimmingpool.php";
</script>
<?php } ?>

