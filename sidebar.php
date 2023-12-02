        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>

                        </li>

                        <li class="nav-label">Management</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customer Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_customer.php">Add Customer</a></li>
                                <li><a href="view_customer.php">View Customer</a></li>
                                
                            </ul>
                        </li>


                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-th-large"></i><span class="hide-menu">Room Booking Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_booking.php">Add Booking</a></li>
                                <li><a href="view_booking.php">View Booking</a></li>
                               
                            </ul>
                        </li>

                        </li>
                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Banquet hall</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_hall.php">Add Category</a></li>
                                <li><a href="view_hall.php">View Category</a></li>
                                
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Swimming pool Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="add_swimmingpool.php">add details</a></li>
                                <li><a href="view_swimmingpool.php">view details</a></li>
                               
                            </ul>
                        </li>
                        


                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Room Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_room.php">Add Room</a></li>
                                <li><a href="view_room.php">View Room</a></li>
                                
                            </ul>
                        </li>

                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Room Category</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="room_category.php">Add Category</a></li>
                                <li><a href="view_roomcategory.php">View Category</a></li>
                                
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa  fa-sticky-note"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="report_customer.php">Customer Report</a></li>
                                <li><a href="report_booking.php">Booking Report</a></li>
                                <li><a href="report_payment.php">Payment Reports</a></li>
                               
                            </ul>
                        </li>

                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Enquiry Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="enquire_form.php">View Enquiry</a></li>
                               
                                
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa  fa-sticky-note"></i><span class="hide-menu">Discount</span></a>
                                                    <ul aria-expanded="false" class="collapse">
                                <li><a href="add_discount.php">Add Discount</a></li>
                                <li><a href="view_discount.php">View Discount</a></li>
                                
                               
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-rupee (alias)"></i><span class="hide-menu">Currency Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_curr.php">Add Currency</a></li>
                                <li><a href="view_curr.php">View Currency</a></li>
                               
                            </ul>
                        </li>

                    
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <?php //if($_SESSION["username"]=='user' || $_SESSION["username"]=='admin') { ?>
                               <li><a href="manage_website.php">Appearance Management</a></li>
                              
                             <?php //} ?>
                              
                              
                            </ul>
                        </li> 

                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-files-o"></i><span class="hide-menu">Tax Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_tax.php">Add Tax</a></li>
                                <li><a href="view_tax.php">View Tax</a></li>
                                
                            </ul>
                        </li>
                        
                        <!-- <li> <a class="has-arrow" href="" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="hide-menu">About Author</span></a> -->
                          
                           
                        </li> 
                         



                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->