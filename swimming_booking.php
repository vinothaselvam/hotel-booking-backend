 
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

$que="SELECT * FROM `tbl_swimmingpool` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
     // $sql2 = "SELECT * FROM `tbl_customer` WHERE id='".$row['customername']."'";
     // $result2=$conn->query($sql2);
     // $row2=$result2->fetch_assoc();
    
    

     $c1 = "SELECT * FROM `tbl_tax` " ;
     $result6 = $conn->query($c1);
     $row6=$result6->fetch_assoc();
      extract($row6);
     

//print_r($row);
    extract($row);
$bookingid = $row['id'];
$customername = $row['customername'];
$address = $row['address'];
$phno = $row['phno'];

$created_date = $row['created_date'];
$taxamount = $row['taxamount'];
$totalamount = $row['totalamount'];
$amount = $row['amount'];
$taxper = $row['tax'];
 $taxname = $row6['taxname'];
 $amt=$totalamount-$taxamount;
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
  <table width="100%" cellpadding="4">
  <tr>
  <td width="65%">
  To,<br />
  <b>RECEIVER (BILL TO)</b><br />
  Name : <?php echo $customername; ?><br /> 
  Billing Address : <?php echo $address; ?><br />
  Contact Number : <?php echo $phno; ?><br />
 
  </td>
  <td width="35%">         
  Invoice No. : <?php echo $bookingid; ?><br />
  Invoice Date : <?php echo date("Y-m-d h:i:sa"); ?><br />
  
  </td>
  </tr>
  </table>
  <br />
  <table width="100%" border="1" cellpadding="4" cellspacing="0">
  
  <tr>
  
  <th align="left">Room Type</th>
  <th align="left">Per Hour Rate</th>
  <th align="left">Number of Persons</th>
  <th align="left">Hours</th>
  <th align="left">Date </th>
  
  </tr>
  <tr>
 
  <td align="left">Swimming Pool</td>
  <td align="left"><?php echo  $amount; ?></td>
  
  <td align="left"><?php echo $noofpersons; ?></td>
  <td align="left"> <?php echo $hours; ?></td>  
  <td align="left"> <?php echo $fromdate; ?></td>
       
  </tr>
 <tr>
  <td align="right" colspan="4"><b>Amount</b></td>
  <td align="left"><b><?php echo $totalamount-$taxamount; ?></b></td>
  </tr>
  <tr>
  <td align="right" colspan="4"><b><?php echo $taxname; ?></b></td>
  <td align="left"><b><?php echo $taxper; ?>%</b></td>
  </tr>
   <tr>
  <td align="right" colspan="4"><b>Total Amount :</b></td>
  <td align="left"><b><?php echo $totalamount; ?></b></td>
  </tr>
  
  
   
                                        
  </table><h2 style="color:green">Thank you for Visiting, <strong>ROYAL HOTEL</strong></h2>
    <h2>Following rooms have been booked.Have a nice day :)</h2>



</body>
</html>