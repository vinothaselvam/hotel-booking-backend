<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["btn_update"]))
{
    extract($_POST);
    $q1="UPDATE `room category` SET `roomcategory`='$roomcategory',`adultno`='$adultno',`kidno`='$kidno',`facilities`='$facilities' WHERE `id`='".$_GET['id']."'";
    //$q2=$conn->query($q1);
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_roomcategory.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_roomcategory.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `room category` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$roomcategory = $row['roomcategory'];
$adultno = $row['adultno'];
$kidno = $row['kidno'];
$facilities = $row['facilities'];
}

?> 


<!-- Page wrapper  -->

         <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Room Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Room Management</li>
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
                                            <label class="col-lg-4 col-form-label" for="val-roomcategory">room category : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-roomcategory" name="roomcategory" value="<?php echo $roomcategory; ?>"  required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-adultno">No of Adults : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-adultno" name="adultno" value="<?php echo $adultno; ?>"  required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-kidno">No of kids : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-kidno" name="kidno" value="<?php echo $kidno; ?>"  required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-facilities">Facilities: <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-facilities" name="facilities" value="<?php echo $facilities; ?>"  required="">
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" name="btn_update" class="btn btn-primary">Submit</button>
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
       
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('footer.php');?>

