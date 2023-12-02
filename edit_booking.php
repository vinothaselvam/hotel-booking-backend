<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["submit"]))
{
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
     $taxid = $row6['taxname'];

     $c2 = "SELECT * FROM `tbl_discount`" ;
     $result7 = $conn->query($c2);
     $row7=$result7->fetch_assoc();
      extract($row7);
     $discountper = $row7['discountper'];

    $totalamount = 0.0;
//$totalamountperday = $_POST['kidno'] * $roomname[2] + $_POST['adultno'] * $roomname[1]   ;echo "<br>"; /*}*/ 
    $totalamountperday = $roomname[1];
    $totalamount = $totalamountperday * $diff;
/*echo $totalamount; */
   $taxamount = 0.0;
   $num = $totalamount * $tax[1];
   $deno = 100;
   $total1 = $num / $deno;
    $taxrupee = $total1 ;

    $num1 = $totalamount * $discount[1];
   $deno1 = 100;
   $total2 = $num1 / $deno1;
   $discountrupee = $total2 ;

   $taxamount = $totalamount + $total1 + $electricity_amount + $kitchen_amount + $Cleaning_charges - $total2;

$paid=0;
 $q1="UPDATE `tbl_booking` SET `name`='$name',`roomname`='$roomname[0]',`kidno`='$kidno',`adultno`='$adultno',`fromdate`='$fromdate',`todate`='$todate',`taxamount`='$taxamount',`taxid`='$taxid',`tax`='$taxrupee',`electricity_amount`='$electricity_amount',`kitchen_amount`='$kitchen_amount',`Cleaning_charges`='$Cleaning_charges',`totalamount`='$totalamount',`discountper`='$discountper',`discount`='$discountrupee', `paid`='$paid', `created_date`='CURDATE()' WHERE `id`='".$_GET['id']."'";
    //$q2=$conn->query($q1);
    if ($conn->query($q1) === TRUE) { echo "string";
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_booking.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_booking.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `tbl_booking` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
     $sql2 = "SELECT * FROM `tbl_customer` WHERE id='".$row['name']."'";
     $result2=$conn->query($sql2);
     $row2=$result2->fetch_assoc();
     $sql3 = "SELECT * FROM `tbl_rooms` WHERE id='".$row['roomname']."'";
     $result3=$conn->query($sql3);
     $row3=$result3->fetch_assoc();
    //print_r($row);
    extract($row);
$name = $row2['name'];
$name2 = $row2['name'];
$roomname = $row3['roomname'];
$floorno = $row3['floorno'];
$kidno = $row['kidno'];
$adultno = $row['adultno'];
$fromdate = $row['fromdate'];
$todate = $row['todate'];
$taxamount = $row['taxamount'];
$totalamount = $row['totalamount'];
$electricity_amount = $row['electricity_amount'];
$kitchen_amount = $row['kitchen_amount'];
$Cleaning_charges= $row['Cleaning_charges'];

$paid = $row['paid'];
}

?>         <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Room Booking</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Room Booking</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->     
                                
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                              
                                <div class="form-validation">
                                    
                                    <form class="form-valide"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                                   <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Customer Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6 wrapper">
                                           <select  class="form-control" id="val-skill" name="name" onfocus='this.size=15;' onblur='this.size=1;' onchange='this.size=1; this.blur();'  >

                                                   

                                                    <option  value="">--Select Customer--</option>
                                                  
                                                   <?php  
                                                            $c1 = "SELECT * FROM `tbl_customer` ORDER BY id DESC";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
                                                                        <?php echo $row['name'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                                  
                                                </select>


                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room Number : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control scrollable-auto" id="val-skill" name="roomname" required onchange="calculate();" onkeyup="calculate();">
                                                    <option value="">--Select --</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_rooms`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['peradultprice'].','.$row['perkidprice'];?>">
                                                                        <?php echo $row['floorno'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                                <!-- <select class="form-control" id="val-skill" name="roomname" required="">
                                                    <option value="">Please select</option>
                                                    <option value="Deluxe"<?php if($roomname=='Deluxe'){ echo "Selected";}?>>Deluxe</option>
                                                    <option value="Superior"<?php if($roomname=='Superior'){ echo "Selected";}?>>Superior</option>
                                                    <option value="Single"<?php if($roomname=='Single'){ echo "Selected";}?>>Single</option>
                                                    <option value="Double"<?php if($roomname=='Double'){ echo "Selected";}?>>Double</option>
                                                    <option value="Triple"<?php if($roomname=='Triple'){ echo "Selected";}?>>Triple</option>
                                                    <option value="Quad"<?php if($roomname=='Quad'){ echo "Selected";}?>>Quad</option>
                                                </select> -->
                                            </div>
                                        </div>
                                       
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Adults<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="adultno" value="<?php echo $adultno; ?>" placeholder="No of Adults"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Kid:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="kidno" value="<?php echo $kidno; ?>" placeholder="No of Kid"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-digits" name="fromdate" value="<?php echo $fromdate; ?>" placeholder="From Date" required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-digits" name="todate" value="<?php echo $todate; ?>" placeholder="To Date" required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tax Name : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="tax" required=""  onchange="calculate();" onkeyup="calculate();">
                                                    <option value="">  </option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_tax`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['percentage'].','.$row['taxname'];?>">
                                                                        <?php echo $row['taxname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tax Name : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                 <?php  
                                                            $c1 = "SELECT * FROM `tbl_tax`";
                                                            $result = $conn->query($c1);
                                                            $row2=$result->fetch_assoc(); ?>
                                                <select class="form-control" id="val-skill" name="tax"   onchange="calculate();" onkeyup="calculate();">
                                                    <option value="">   </option>
                                                   <?php
                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['percentage'].','.$row['taxname'];?>">
                                                                        <?php echo $row['taxname'];?>
                                                                    </option>
                                                                    <?php  
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Discount : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                 <?php  
                                                            $c1 = "SELECT * FROM `tbl_discount`";
                                                            $result = $conn->query($c1);
                                                            $row2=$result->fetch_assoc(); ?>
                                                <select class="form-control" id="val-skill" name="discount"   onchange="calculate();" onkeyup="calculate();" required>
                                                    <option value="">   </option>
                                                   <?php
                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['percentage'].','.$row['discountname'];?>">
                                                                        <?php echo $row['discountname'];?>
                                                                    </option>
                                                                    <?php  
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Electricity Charges<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="electricity_amount" value="<?php echo $electricity_amount; ?>" placeholder=""  onchange="calculate();"  required="" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Kitchen Charges<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="kitchen_amount" value="<?php echo $kitchen_amount; ?>" required="" placeholder=""  onchange="calculate();" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Cleaning Charges/Others<span class="text-danger"></span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="Cleaning_charges"  required="" value="<?php echo $Cleaning_charges; ?>" placeholder="Cleaning & Others"  onchange="calculate();" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Swimming Pool<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="swimming" value="<?php echo $swimming; ?>" placeholder=""  onchange="calculate();"  required="" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Total Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="totalamount" value="<?php echo $totalamount; ?>" placeholder="Total Amount"  required="" onchange="calculate();" onkeyup="calculate();" readonly>
                                            </div>
                                        </div>


                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Payable Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="taxamount" value="<?php echo $taxamount; ?>" placeholder="Payable Amount"  required="" onchange="calculate();" onkeyup="calculate();" readonly>
                                            </div>
                                        </div>

                                        <!--  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Advance Paid<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="paid" value="<?php echo $paid; ?>" placeholder="Advance Paid"  required="" onchange="calculate();" onkeyup="calculate();" readonly>
                                            </div>
                                        </div> -->


                                         <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
                <!-- /# row -->
                <!-- End PAge Content -->
        </div>
            <!-- End Container fluid  -->
            <!-- End Bread crumb -->
 <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
<?php include('footer.php');?>

