<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');?>

        <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                                <h4>Room Booking Details</h4>
                                <div class="form-validation">
                                    
                                    <form class="form-valide"  method="post" action="pages/booking.php" enctype="multipart/form-data">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Customer Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                               
                                                      <select size="15"  class="form-control" id="val-skill" name="name" onfocus='this.size=10;'  onblur='this.size=1;' onchange='this.size=1; this.blur();'  >
                                                    <option value="">--Select Customer--</option>
                                                   <?php  
                                                            $c1 = "SELECT * FROM `tbl_customer`ORDER BY id DESC ";
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room No:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="roomname" required=""  onchange="calculate();" onkeyup="calculate();" >
                                                    <option value="">--Select Room--</option>
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
                                            </div>
                                        </div>
                                       <!--  <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room Category:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="roomno" required="">
                                                    <option value="">-- Select Room Category --</option>
                                                   <?php  
                                                            $c1 = "SELECT * FROM `tbl_rooms`  ";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["roomname"];?>">
                                                                        <?php echo $row['roomname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>  -->
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Adults<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="adultno" placeholder="No of Adults"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Kid:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="kidno" placeholder="No of Kid"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="fromdate" name="fromdate" placeholder="From Date" required="" onchange="CompareDate();" >
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="todate" name="todate" placeholder="To Date" required="" onchange="CompareDate();"   >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tax Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="tax" required=""  onchange="calculate(); " onkeyup="calculate();">
                                                    <option value="">--Select tax--</option>
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
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Discount:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="discount" required=""  onchange="calculate(); " onkeyup="calculate();">
                                                    <option value="">--Select Discount--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_discount`";
                                                            $result = $conn->query($c1);

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
                                                <input type="text" class="form-control" id="val-digits" name="electricity_amount" value="" placeholder=""  onchange="calculate();"  required="" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Kitchen Charges<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="kitchen_amount" value="" required="" placeholder=""  onchange="calculate();" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Cleaning Charges/Other Charges<span class="text-danger"></span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="Cleaning_charges"  required="" value="" placeholder="Cleaning & Others"  onchange="calculate();" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Swimming Pool<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" 
                                                name="swimming" value="" placeholder=""  onchange="calculate();"  required="" onkeyup="calculate();" >
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Total Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="totalamount" placeholder="Total Amount" required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Advance Paid<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="advance_paid" placeholder="Advance Paid" required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" id="btnValidate" name="btn_save" class="btn btn-primary">Submit</button>
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
           
                                     


<?php include('footer.php');?>
<!-- <div class="popup popup--icon -error js_error-popup" id="show_error">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Enter valid date</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div> -->

<!-- <script type="text/javascript">
    $("#fromdate, #todate").datepicker();

$("#todate").change(function () {
    var startDate = document.getElementById("fromdate").value;
    var endDate = document.getElementById("todate").value;
 
    if ((Date.parse(endDate) <= Date.parse(startDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("todate").value = "";
    }
});
</script>--------------------------------- -->

-----------------------------------------
 <script type="text/javascript">
    function CompareDate() {
        var Fromdate = document.getElementById("fromdate").value;
var ToDate = document.getElementById("todate").value;
    const date1 = new Date(Fromdate);
const date2 = new Date(ToDate);
const diffTime = date2.getTime() - date1.getTime();
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
console.log(diffDays);

if(diffDays<0)
{
    alert("enter valid date");
    document.getElementById("todate").value = "";
}else{
    alert("valid date")
} 
}
</script>
<!-- <script type="text/javascript" src="js/general.min.js"></script> -->