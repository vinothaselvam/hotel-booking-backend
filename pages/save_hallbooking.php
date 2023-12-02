
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);

$tax=explode(',',$_POST['tax']);
//print_r($tax[1]);

$discount=explode(',',$_POST['discount']);
//print_r($discount[1]); 


$c1 = "SELECT * FROM `tbl_tax`" ;
     $result6 = $conn->query($c1);
     $row6=$result6->fetch_assoc();
      extract($row6);
      
 $c2 = "SELECT * FROM `tbl_discount`" ;
     $result7 = $conn->query($c2);
     $row7=$result7->fetch_assoc();
      extract($row7);
     
    $totalamount = 0.0;
$totalamountperday =$hallcharge  ; echo "<br>"; /*}*/
 $totalamount = $totalamountperday ;
    //echo "$totalamount";
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
 // $taxamount = $totalamount  - $total2 ;
 // $finalamount = $taxamount + $total1 + $electricity_amount + $kitchen_amount  ;

    $sql = "INSERT INTO `tbl_hall`(`name`,`hallcharge`, `fromdate`, `todate`, `totalamount`, `taxamount`,`electricity_amount`,`kitchen_amount`,`discountper`,`discount`,`paid`,`created_date`,`taxid`, `tax`) VALUES ('$name','$hallcharge', '$fromdate', '$todate', '$taxamount', '$totalamount','$electricity_amount','$kitchen_amount','$discountper','$discountrupee', '0', CURDATE(),'$taxid','$total1')";
  
// /*  echo */ $sql = "INSERT INTO `tbl_swimmingpool`(`customername`, `phno`, `address`,`noofpersons`, `fromdate`, `hours`,`amount`, `tax`, `taxamount`,`totalamount`,  `created_date`) VALUES ('$customername', '$phno', '$address', '$noofpersons', '$fromdate', '$hours', '$amount','$taxid','$taxrupee','$taxamount', CURDATE())";
//echo "<pre>";print_r($sql); exit;
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_hall.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_hall.php";
</script>
<?php } ?>