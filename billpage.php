 
<html>
<head>
  <title>Bill Page</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
<body>



<?php
include('connect.php');
session_start();
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

$que="SELECT * FROM `tbl_booking` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
     $sql2 = "SELECT * FROM `tbl_customer` WHERE id='".$row['name']."'";
     $result2=$conn->query($sql2);
     $row2=$result2->fetch_assoc();
     $sql3 = "SELECT * FROM `tbl_payment` WHERE id='".$row['id']."'";
     $result3=$conn->query($sql3);
     $row3=$result3->fetch_assoc();

     $sql4 = "SELECT SUM(amount) as amt from tbl_payment WHERE bookingid='".$_GET["id"]."'";
                                    $result4 = $conn->query($sql4);
                                    $row4 = $result4->fetch_assoc();
     $sql5 = "SELECT * FROM `tbl_rooms` WHERE id='".$row['roomname']."'";
    $result5=$conn->query($sql5);
    $row5=$result5->fetch_assoc();

     $c1 = "SELECT * FROM `tbl_tax` " ;
     $result6 = $conn->query($c1);
     $row6=$result6->fetch_assoc();
      extract($row6);
     

//print_r($row);
    extract($row);
$bookingid = $row['id'];
$name = $row2['name'];
$address = $row2['address'];
$email = $row2['email'];
$contact = $row2['contact'];
$created_date = $row2['created_date'];
$adultno = $row['adultno'];
$kidno = $row['kidno'];

$fromdate = $row['fromdate'];
$todate = $row['todate'];
$taxamount = $row['taxamount'];
$totalamount = $row['totalamount'];
$amount = $row4['amt'];
$remainamount=$row['taxamount'] - $row4['amt'] ;
$electricity_amount = $row['electricity_amount'];
$kitchen_amount = $row['kitchen_amount'];
$Cleaning_charges = $row['Cleaning_charges'];
$taxper = $row['taxid'];
 $taxname = $row6['taxname'];
}
?>
   
  <div>
  <script src="js/bootstrap.min.js"></script>



 <table width="100%" border="1" cellpadding="5" cellspacing="0" >
 <tr>
 
                        <!-- Logo icon -->
                         
  <td width="20%" align="center" >
    <?php
             $sql_header_logo = "select * from manage_website"; 
             $result_header_logo = $conn->query($sql_header_logo);
             $row_header_logo = mysqli_fetch_array($result_header_logo);
             ?>
                       
                        <span><img src="uploadImage/Logo/<?php echo $row_header_logo['logo'];?>" alt="homepage" class="dark-logo" style="width:75%;height:100%;backgroundcolor:black;"/></span> 
                    </td>
               <td  align="center" style="font-size:18px; color:white;  ;">
      <br/><h1 align="center" style="color:orange"><b>ROYAL HOTEL</b></h1>
                  <p style="color:darkgreen">    XXX, Chennai, Tamil Nadu - 625515<br />
   Contact Number : 7898765676<br /> website : www.hotel.com <br /></p>
  </td>
  
  </tr>
  <tr>
  <td colspan="4" align="center" style="font-size:18px"><b>Invoice</b> <button align="right" onclick="window.print()">Print this page</button>
  </td>
  </tr>
  <tr>
  <td colspan="2">
  <table width="100%" cellpadding="5">
  <tr>
  <td width="65%">
  To,<br />
  <b>RECEIVER (BILL TO)</b><br />
  Name : <?php echo $row2['name']; ?><br /> 
  Billing Address : <?php echo $row2['address']; ?><br />
  Contact Number : <?php echo $row2['contact']; ?><br />
  
  </td>
  <td width="35%">         
  Invoice No. : <?php echo $bookingid; ?><br />
  Invoice Date : <?php echo date("Y-m-d h:i:sa"); ?><br />
  RoomNo : <?php echo $row5['floorno']; ?><br />
  </td>
  </tr>
  </table>
  <br />
  <table width="100%" border="1" cellpadding="4" cellspacing="0">
  <tr>
  
  <th align="left">Room Type</th>
  <th align="left">Room Rental Price</th>
  <th align="left">Adult No</th>
  <th align="left">Kid No</th>
  <th align="left">From </th>
  <th align="left">To </th> 
  </tr>
  <tr>
 
  <td align="left"><?php echo $row5['roomname']; ?></td>
  <td align="left"><?php echo $row5['peradultprice']; ?></td>
  <!--<td align="left"><?php echo $row5['perkidprice']; ?></td>-->
  <td align="left"><?php echo $adultno; ?></td>
  <td align="left"> <?php echo $kidno; ?></td>  
  <td align="left"> <?php echo $fromdate; ?></td>
  <td align="left"> <?php echo $todate; ?></td>      
  </tr>
 <tr>
  <td align="right" colspan="5"><b>Amount</b></td>
  <td align="left"><b><?php echo $totalamount; ?></b></td>
  </tr>
  <tr>
  <td align="right" colspan="5"><b><?php echo $taxname; ?></b></td>
  <td align="left"><b><?php echo $taxper; ?>%</b></td>
  </tr>
 
  <tr>
  <td align="right" colspan="5">Electricity Charges: </td>
  <td align="left"><?php echo $electricity_amount ?></td>
  </tr>
  <tr>
  <td align="right" colspan="5">Kitchen / Gas Charges </td>
  <td align="left"><?php echo $kitchen_amount ?></td>
  </tr>
  <tr>
  <td align="right" colspan="5">Cleaning/Other Charges </td>
  <td align="left"><?php echo $Cleaning_charges ?></td>
  </tr>
   <tr>
  <td align="right" colspan="5">Swimming Charges </td>
  <td align="left"><?php echo $swimming ?></td>
  </tr>
   <tr>
  <td align="right" colspan="5"><b>Total Amount :</b></td>
  <td align="left"><?php echo $taxamount; ?></td>
  </tr>
  <tr>
  <td align="right" colspan="5"><b>Discount:</b></td>
  <td align="left"><?php echo $discountper;?>%</td>
  </tr>
   <tr>
  <td align="right" colspan="5"><b>Discount amount:</b></td>
  <td align="left"><?php echo $discount;?></td>
  </tr>
  

  <tr>
  <td align="right" colspan="5"><strong>Amount Paid</strong></td>
  <td align="left"><b><?php echo $amount; ?></b></td>
  </tr>
  <tr>
  <td align="right" colspan="5">Amount Due:</td>
  <td align="left"><?php echo $remainamount; ?></td>
  </tr>
  </table>
  </td>
  </tr>
   
                                        
  </table><h2 style="color:green">Thank you for Visiting, <strong>ROYAL HOTEL</strong></h2>
    <h2>Following rooms have been booked.Have a nice day :)</h2>



</body>
</html>