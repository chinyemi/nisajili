<?php 

require_once('header.php');

include('pagelinks.php');

?>
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      
                       
                       
                       <?php 
						$getAllSeasons=mysqli_query($conn,"SELECT * FROM `siteseason`");
						
						while ($rowAllSeasons=mysqli_fetch_array($getAllSeasons)) {
							
				        if ($rowAllSeasons['SeasonStatus']=='OPEN') {
							
							$Season="(Current)";
							
							?>
							 <li><a href="index.php?Id=<?php echo $Id;?>&Year=<?php echo $rowAllSeasons['Year'];?>"><?php echo $rowAllSeasons['Year'];?> | Season <?php echo $Season;?></a></li>
							<?php
						} else {
							
							
						   ?>
                       <li><a href="index.php?Id=<?php echo $Id;?>&Year=<?php echo $rowAllSeasons['Year'];?>"><?php echo $rowAllSeasons['Year'];?> | Season</a></li>
                
                       <?php }} ?>
                    </ul>
                  </li>
                 
                  <li><a><i class="fa fa-desktop"></i>Reg & Check-in <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <?php if (($_SESSION['UserLevel']=='Manager') || ($_SESSION['UserLevel']=='Administrator')) { ?>
                      <li><a href="PageSelector.php?pageID=FrameContent_NoCash&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Registration | No Cash</a></li>
                      <li><a href="PageSelector.php?pageID=FrameContent_Cash&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Registration | Individual Payment</a></li>
                     
                    
                     <?php } ?>
                 
                      <li><a href="PageSelector.php?pageID=FrameContent_CheckIn&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Check in | TicketNo</a></li>
                      <li><a href="PageSelector.php?pageID=FrameContent_CheckInQRCode&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Check in | QR Codes</a></li>
                       <li><a href="PageSelector.php?pageID=FrameContent_Car_CheckIn&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Check-in | Vehicles</a></li>
                      
                    </ul>
                  </li>
                  
                  
                  <li><a><i class="fa fa-credit-card"></i>Order Processing <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <?php if (($_SESSION['UserLevel']=='Manager') || ($_SESSION['UserLevel']=='Administrator')) { ?>
                  
                      <li><a href="PageSelector.php?pageID=FrameContent_Orders_Individual&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Process Orders | Individual</a></li>
                      
                         <li><a href="PageSelector.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Process Orders | Group</a></li>
                    
                     <?php } ?>
                 
                      
                    </ul>
                  </li>
                  
                 
                    </ul>
                </li>
                </ul>
              </div>
              
              
                  <div class="menu_section">
                <h3>Reports</h3>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-th"></i>Dynamic Reports<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                    
                     
						  
                        <li><a href="PageSelector.php?pageID=FrameContent_RegistrantsReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Registrants | Delegate</a></li>
          
                       <li><a href="PageSelector.php?pageID=FrameContent_CollectionReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Collections | Summary</a></li>
                        <li><a href="PageSelector.php?pageID=FrameContent_ActualRevenueReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Actual | Revenue</a></li>

                        <li><a href="PageSelector.php?pageID=FrameContent_ActuaExpensesReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Actual | Expenses</a></li>

                       <li><a href="PageSelector.php?pageID=FrameContent_BudgetRevenueReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Budgeted | Revenue</a></li>
                        <li><a href="PageSelector.php?pageID=FrameContent_BudgetExpensesReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Budgeted | Expenses</a></li>
                        <li><a href="PageSelector.php?pageID=FrameContent_CheckedVehicleReport&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Checked-in | Vehicle</a></li>
                        
                        <li><a href="PageSelector.php?pageID=sentMsgs&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Message | Sents</a></li>
                    
                  
                      
                    </ul>
                  </li>
                  
                 
                                  
                
                </ul>
              </div> 
              
              <div class="menu_section">
                <h3>Communication</h3>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-phone"></i>Messaging Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                     
						   <li><a href="PageSelector.php?pageID=defineGroups&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Create | Group</a></li>
                      
                        <li><a href="PageSelector.php?pageID=assignMemberToGroups&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Assign | Group</a></li>
                       
                       <li><a href="PageSelector.php?pageID=assignMemberToIndividual&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Assign | Individual</a></li>
                      
                        
                       <li><a href="PageSelector.php?pageID=textSMS&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Create | SMS</a></li>
                       
                       <li><a href="PageSelector.php?pageID=sendSMS&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Send | SMS</a></li>
                       
                       
                       
                        <li><a href="PageSelector.php?pageID=sendeEmail&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Send | Email</a></li>
                       
                       
                      <li><a href="PageSelector.php?pageID=watsapMsgs&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Send | WhatsApp</a></li>
                      
                       <li><a href="PageSelector.php?pageID=smsBalance&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Recharge | Messaging</a></li>
                    
                        
                      <?php } ?>
                      
                    </ul>
                  </li>
                  
            
                
                </ul>
              </div> 
                  
            <div class="menu_section">
                <h3>Financials</h3>
                 <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-tasks"></i>Actual Revenue<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
              
						  
                       
                        <li><a href="PageSelector.php?pageID=FrameContent_ActualRevenue&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Revenue | Register</a></li>
          
                        
                        
                      
                    </ul>
                  </li>
                  
               
                </ul>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-tasks"></i>Actual Expenses<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
              
						  
                        <li><a href="PageSelector.php?pageID=FrameContent_RecordExpenses&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Expense | Register</a></li>
          
                         
                      
                    </ul>
                  </li>
                            
                </ul>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-list-alt"></i>Budget Revenue<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
              
						  
                       <li><a href="PageSelector.php?pageID=FrameContent_BudgetRevenue&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Revenue | Register</a></li>
          
                        <li><a href="PageSelector.php?pageID=FrameContent_RevenueType&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Revenue | Type</a></li>
                      
                    </ul>
                  </li>
                  
               
                </ul>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-list-alt"></i>Budget Expenses<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
              
						  
                          
                        <li><a href="PageSelector.php?pageID=FrameContent_RecordBudgetExpenses&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Budget Expense | Register</a></li>
          
                         <li><a href="PageSelector.php?pageID=FrameContent_BudgetExpensesType&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Budget Expense | Type</a></li>
                      
                      
                    </ul>
                  </li>
                  
               
                </ul>
              </div>  
              
              
            
               <div class="menu_section">
                <h3>Website Administration</h3>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-link"></i>Contents Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                      <li><a href="PageSelector.php?pageID=FrameContent_Speaker_Bio&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Speaker | Biography</a></li>
                      
                      <li><a href="PageSelector.php?pageID=FrameContent_Web_Video&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Web | Videos</a></li>
                      
                      <li><a href="PageSelector.php?pageID=FrameContent_Testimonies&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Testimonies | Feedback</a></li>
                      
                      <li><a href="PageSelector.php?pageID=FrameContent_Element&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Web | Element</a></li>
                    
                        
                      <?php } ?>
                      
                    </ul>
                  </li>
                  
             
                </ul>
              </div>
              
            
             
               <div class="menu_section">
                <h3>System Administration</h3>
                <ul class="nav side-menu">
                 <li><a><i class="glyphicon glyphicon-certificate"></i> Manage | Certificate <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                   
                      <li><a href="Generate_Certificates.php?pageID=FrameContent_Gen_Cert&Id=<?php echo $Id;?>&Year=<?php echo '2019';?>">Certificate | Process</a></li>
  
                       <li><a href="Process_Payment_CRUD.php?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Certificate | Payment</a></li>
                  
                      
                      <?php } ?>
                      
                    </ul>
                  </li>
                  
                  <li><a><i class="glyphicon glyphicon-map-marker"></i> Site | Event <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
          
                      <li><a href="PageSelector.php?pageID=SysInfo&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Event | Details</a></li>
          
                        <li><a href="PageSelector.php?pageID=SysRates&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Registration | Fees</a></li>
                        
                        <li><a href="PageSelector.php?pageID=GLSdates&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Event | Dates</a></li>
                        <li><a href="PageSelector.php?pageID=FrameContent_PackageInfo&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Package | Details</a></li>
                      
                      <?php } ?>
                      
                    </ul>
                  </li>
                 
                    <li><a><i class="glyphicon glyphicon-user"></i> System | Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                      
                      
                     <li><a href="PageSelector.php?pageID=FrameContent_UserManagement&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> User | Management</a></li>
                     <li><a href="PageSelector.php?pageID=FrameContent_Designation&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"> Designation | Management</a></li>
                     
                      
                      <?php } ?>
                      
                    </ul>
                  </li>  
                  <li><a><i class="glyphicon glyphicon-eye-open"></i> Create | Views <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                     <li><a href="PageSelector.php?pageID=GenerateDelRpt&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Views | Delegates</a></li>
                     <li><a href="PageSelector.php?pageID=GenerateColRpt&Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>">Views | Collections</a></li>  
                        <li><a href="PageSelector.php?pageID=GenerateCarRpt&Id=<?php echo $Id;?>&Year=<?php echo '2019';?>">Views | Car Parking</a></li>
                       <li><a href="PageSelector.php?pageID=GenerateBudgetRevenueRpt&Id=<?php echo $Id; ?>&Year=<?php echo '2019'; ?>">Views | Budget Revenue</a></li>
                        <li><a href="PageSelector.php?pageID=GenerateActualRevenueRpt&Id=<?php echo $Id; ?>&Year=<?php echo '2019'; ?>">Views | Actual Revenue</a></li>
                        <li><a href="PageSelector.php?pageID=GenerateBudgetExpenseRpt&Id=<?php echo $Id; ?>&Year=<?php echo '2019'; ?>">Views | Budget Expenses</a></li>
                        <li><a href="PageSelector.php?pageID=GenerateActualExpenseRpt&Id=<?php echo $Id; ?>&Year=<?php echo '2019'; ?>">Views | Actual Expenses</a></li>
                        <li><a href="PageSelector.php?pageID=FrameContent_PaymentOptions&Id=<?php echo $Id; ?>&Year=<?php echo '2019'; ?>">Views | Payment Options</a></li>
                      
                      <?php } ?>
                    
                    </ul>
                  </li>   
                  
               
                  
                  <li><a><i class="glyphicon glyphicon-calendar"></i> Set up | Season  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                   
                      
                      <li><a href="PageSelector.php?pageID=FrameContent_SiteSeason&Id=<?php echo $Id;?>">Season | Management</a></li>
                    
                      <?php } ?>
                      
                    </ul>
                  </li>   
                  
                <li><a><i class="glyphicon glyphicon-credit-card"></i> Online | Payment <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     <?php if ($_SESSION['UserLevel']=='Administrator') { ?> 
                      
                 
      
                      <li><a href="paymentgateway.php?Id=<?php echo $Id;?>&Year=<?php echo '2019';?>">Payments | Gateway</a></li>
                      
                      <?php } ?>
                      
                    </ul>
                  </li>    
                  
                 <li><a><i class="glyphicon glyphicon-wrench"></i> System | Support <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"> 
                     
                      <li><a href="https://www.nisajili.com/support/" target="_blank">Online Support</a></li>
                    </ul>
                  </li>                                                                                                                                                                                 
                
                </ul>
              </div>
              

            </div>