<div class="right_col" role="main">
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-12">
                    <h3 align="center"> <?php echo PROJECT_NAME; ?> (<?php echo COUNTRY;?>) DASHBOARD</h3>
                  </div>
					
                 

              <div class="col-sm-9 col-xs-12 col-md-12">
                
                <div id="chart_div" class="chart2"></div>

              </div>
            </div>

          </div>
          <br />

          <div class="row">

          </div>


          <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> <?php echo PREMIER_SITE;?> Statistics  for <?php echo $CurrYear;?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title"><a><?php $getAllDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND `ticket_paid`='YES'"); $alldelegate=mysqli_num_rows($getAllDelegate); echo $alldelegate;?></a> </h2>
                            <p class="excerpt">Total delegates
                            </p>
                          </div>
                        </div>
                      </li>
                        <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getCheckedInDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND `checkedin`='YES' AND `ticket_paid`='YES'"); $checkedindelegate=mysqli_num_rows($getCheckedInDelegate); echo $checkedindelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Checked-in delegates
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getNORMALDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='NORMAL' AND `ticket_paid`='YES'"); $NORMALdelegate=mysqli_num_rows($getNORMALDelegate); echo $NORMALdelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Normal 
                            </p>
                          </div>
                        </div>
                      </li>
                     
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getVIPDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='VIP' AND `ticket_paid`='YES'"); $VIPdelegate=mysqli_num_rows($getVIPDelegate); echo $VIPdelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">VIP's 
                            </p>
                          </div>
                        </div>
                      </li>
                  
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getSponsoredDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='SPONSORED' AND `ticket_paid`='YES'"); $sponsoreddelegate=mysqli_num_rows($getSponsoredDelegate); echo $sponsoreddelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Sponsored 
                            </p>
                          </div>
                        </div>
                      </li>
                      
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getStudentsDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='OFFICIAL' AND `ticket_paid`='YES'"); $studentsdelegate=mysqli_num_rows($getStudentsDelegate); echo $studentsdelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Officials 
                            </p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getComplimentaryDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='COMPLIMENTARY' AND `ticket_paid`='YES'"); $complimentarydelegate=mysqli_num_rows($getComplimentaryDelegate); echo $complimentarydelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Complimentaries 
                            </p>
                          </div>
                        </div>
                      </li>
                      
                       <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getVolunteerDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='VOLUNTEER' AND `ticket_paid`='YES'"); $volunteerdelegate=mysqli_num_rows($getVolunteerDelegate); echo $volunteerdelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Volunteers 
                            </p>
                          </div>
                        </div>
                        </li>
                          
                              <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getVolunteerDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='DELEGATE' AND `ticket_paid`='YES'"); $volunteerdelegate=mysqli_num_rows($getVolunteerDelegate); echo $volunteerdelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Delegates 
                            </p>
                          </div>
                        </div>
                        </li>
                          
                          
                              <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getVolunteerDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND package='EXHIBITOR' AND `ticket_paid`='YES'"); $volunteerdelegate=mysqli_num_rows($getVolunteerDelegate); echo $volunteerdelegate;?></a>
                            </h2>
                            
                            <p class="excerpt">Exhibitors 
                            </p>
                          </div>
                        </div>
                        </li>
                          
                           <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getMpungaDarNORMAL=mysqli_query($conn,"SELECT SUM(`amount`) mpunga FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND `amount`<>1 AND `ticket_paid`='YES' AND package='NORMAL'"); $rowMpungaDarNORMAL=mysqli_fetch_array($getMpungaDarNORMAL); 
											echo CURRENCY.number_format($rowMpungaDarNORMAL['mpunga'],2);?></a>
                            </h2>
                            
                            <p class="excerpt">Normal Collections
                            </p>
                          </div>
                        </div>
                      </li>
                        
                        <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getMpungaDarVIP=mysqli_query($conn,"SELECT SUM(`amount`) mpunga FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND `amount`<>1 AND `ticket_paid`='YES' AND package='VIP'"); $rowMpungaDarVIP=mysqli_fetch_array($getMpungaDarVIP); 
											echo CURRENCY.number_format($rowMpungaDarVIP['mpunga'],2);?></a>
                            </h2>
                            
                            <p class="excerpt">VIP Collections
                            </p>
                          </div>
                        </div>
                      </li>
                        
                        <li>
                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
                                              <a><?php $getMpungaDar=mysqli_query($conn,"SELECT SUM(`amount`) mpunga FROM `delegate` WHERE `glssite` = '".PREMIER_SITE."' AND `glsyear`='".$CurrYear."' AND `amount`<>1 AND `ticket_paid`='YES'"); $rowMpungaDar=mysqli_fetch_array($getMpungaDar); 
											echo CURRENCY.number_format($rowMpungaDar['mpunga'],2);?></a>
                            </h2>
                            
                            <p class="excerpt">Total Collections
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                  <div id="donutchart" style="width: 400px; height: 250px;"></div>
                   
                  <div id="chart_div_bar"></div>
                </div>
              </div>
            </div>
            

            <div class="col-md-8 col-sm-8 col-xs-12">

<div class="dashboard_graph">

                <div class="row x_title">
                 
					
                 

              <div class="col-sm-8 col-xs-8 col-md-12">
                <div id="piechart_3d" style="width: 750px; height: 550px;"></div> 

               <!--put map here-->    
     
             <div id="geochart-colors" style="width: '100%'; height: '100%';"></div>  

              </div>
            <div class="col-sm-8 col-xs-8 col-md-12">
                     <h2>General Statistics for <?php echo $CurrYear;?> Sites</h2>
  
                     <table class="table table-hover">
    <thead>
      <tr>
      <th>Site</th>
        <th title="Registered">Reg</th>
        <th title="Checked-In" bgcolor=#053CC4><font color="#F6F6F6">In</font></th>
        <th title="Platinum or VIP">VIP</th>
        <th title="Normal">Nor</th>
        <th title="Delegate">Del</th>
        <th title="Sponsored delegates">Spon</th>
        <th title="Officials">Off</th>
        <th title="Students">Stu</th>
        <th title="Exhibitor">Exh</th>
        <th title="Volunteers">Vol</th>
        <th title="Complimentary Tickets">Comp</th>
        <th title="Money Collected">Amount (<?php echo CURRENCY;?>)</th>
      </tr>
    </thead>
    <tbody>
     
      
         <?php   //Get GLS Site Names		
		
  $getSiteStats=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	
		
  while ( $rowSiteStats=mysqli_fetch_array($getSiteStats)) {
	  
                    
                   ?> 
       <tr>
      <td><?php echo $rowSiteStats['sitename'];?></td>
        <td><?php $getReg=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `ticket_paid`='YES'"); $countReg=mysqli_num_rows($getReg); echo $countReg; $totalReg=$totalReg+$countReg; ?></td>
        <td  bgcolor="#053CC4"><font color="#F6F6F6"><?php $getCheckin=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `checkedin`='YES'  AND `ticket_paid`='YES'"); $countCheckin=mysqli_num_rows($getCheckin); echo $countCheckin; $totalCheckin=$totalCheckin+$countCheckin; ?></font></td>
        <td><?php $getPlatinum=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='VIP'  AND `ticket_paid`='YES'"); $countPlatinum=mysqli_num_rows($getPlatinum); echo $countPlatinum; $totalPlatinum=$totalPlatinum+$countPlatinum; ?></td>
        <td><?php $getNormal=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='NORMAL'  AND `ticket_paid`='YES'"); $countNormal=mysqli_num_rows($getNormal); echo $countNormal; $totalNormal=$totalNormal+$countNormal; ?></td>
        <td><?php $getDelegate=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='DELEGATE'  AND `ticket_paid`='YES'"); $countDelegate=mysqli_num_rows($getDelegate); echo $countDelegate; $totalDelegate=$totalDelegate+$countDelegate; ?></td>
        <td><?php $getSponsored=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='SPONSORED'  AND `ticket_paid`='YES'"); $countSponsored=mysqli_num_rows($getSponsored); echo $countSponsored; $totalSponsored=$totalSponsored+$countSponsored; ?></td>
        <td><?php $getOfficial=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='OFFICIAL'  AND `ticket_paid`='YES'"); $countOfficial=mysqli_num_rows($getOfficial); echo $countOfficial; $totalOfficial=$totalOfficial+$countOfficial; ?></td>
         <td><?php $getStudent=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='STUDENT'  AND `ticket_paid`='YES'"); $countStudent=mysqli_num_rows($getStudent); echo $countStudent; $totalStudent=$totalStudent+$countStudent; ?></td>
          <td><?php $getExhibitor=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='EXHIBITOR'  AND `ticket_paid`='YES'"); $countExhibitor=mysqli_num_rows($getExhibitor); echo $countExhibitor; $totalExhibitor=$totalExhibitor+$countExhibitor; ?></td>
        <td><?php $getVolunteer=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='VOLUNTEER'  AND `ticket_paid`='YES'"); $countVolunteer=mysqli_num_rows($getVolunteer); echo $countVolunteer; $totalVolunteer=$totalVolunteer+$countVolunteer; ?></td>
        <td><?php $getComp=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `package`='COMPLIMENTARY'  AND `ticket_paid`='YES'"); $countComp=mysqli_num_rows($getComp); echo $countComp; $totalComp=$totalComp+$countComp; ?></td>
        <td title="This SUM does not include Complimentary,Volunteers,Sponsored,Officials and Delegates"><?php $getMpunga=mysqli_query($conn,"SELECT SUM(`amount`) mpunga FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `amount`<>1  AND `ticket_paid`='YES'"); $rowMpunga=mysqli_fetch_array($getMpunga); $TotalMpunga=$TotalMpunga+$rowMpunga['mpunga']; echo number_format($rowMpunga['mpunga'],2);?></td>
      </tr>
      
      
      <?php } ?>
      
     
    </tbody>
    <tfoot>
    <tr>
      <td>Total</td>
       <td><?php echo $totalReg;?></td>
        <td  bgcolor="#053CC4"><font color="#F6F6F6"><?php echo $totalCheckin; ?></font></td>
        <td><?php echo $totalPlatinum; ?></td>
        <td><?php echo $totalNormal;?></td>
        <td><?php echo $totalDelegate;?></td>
        <td><?php echo $totalSponsored; ?></td>
        <td><?php echo $totalOfficial; ?></td>
        <td><?php echo $totalStudent; ?></td>
        <td><?php echo $totalExhibitor; ?></td>
        <td><?php echo $totalVolunteer; ?></td>
        <td><?php echo $totalComp; ?></td>
        <td title="This SUM does not include Complimentary,Volunteers,Sponsored,Officials and Delegates"><?php echo number_format($TotalMpunga,2);?></td>
      </tr>
    </tr>
  </tfoot>
  </table>
 <div> 
 
   <h2>General Performance <?php echo $CurrYear;?> Per GLS Sites</h2>
  
                     <table class="table table-hover">
    <thead>
      <tr>
      <th>Site</th>
        <th title="Target">Target</th>
        <th title="Registered">Registered</font></th>
        <th title="% Registered"  bgcolor="#ED0E12"><font color="#F6F6F6">% Registered</th>
        <th title="Checked-In">Checked-In</th>
        <th title="% Checked-In"  bgcolor="#ED0E12"><font color="#F6F6F6">% Checked-in</th>
      
        <th title="Money Collected" bgcolor="#4DD30E"><font color="#F6F6F6">Amount (<?php echo CURRENCY;?>)</font></th>
      </tr>
    </thead>
    <tbody>
     
      
         <?php   //Get GLS Site Names		
		
  $getSiteStats=mysqli_query($conn,"SELECT * FROM `glssiteinfo`");	
		
  while ( $rowSiteStats=mysqli_fetch_array($getSiteStats)) {
	  
                    
                   ?> 
       <tr>
      <td><?php echo $rowSiteStats['sitename'];?></td>
        <td><?php echo $rowSiteStats['sitetarget']; $totalTarg=$totalTarg+$rowSiteStats['sitetarget']; ?></td>
        <td><?php $getRegPerformance=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `ticket_paid`='YES'"); $countRegPerformance=mysqli_num_rows($getRegPerformance); echo $countRegPerformance; $totalRegPerformance=$totalRegPerformance+$countRegPerformance; ?></td>
        <td  bgcolor="#ED0E12"><font color="#F6F6F6"><?php $PercentageReg= ($countRegPerformance/$rowSiteStats['sitetarget'])*100; echo number_format($PercentageReg,2)."%"; ?></font></td>
        
        <td  ><?php $getCheckinPerformance=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `checkedin`='YES'  AND `ticket_paid`='YES'"); $countCheckinPerformance=mysqli_num_rows($getCheckinPerformance); echo $countCheckinPerformance; $totalCheckinPerformance=$totalCheckinPerformance+$countCheckinPerformance; ?></td>
        <td  bgcolor="#ED0E12"><font color="#F6F6F6"><?php $PercentageCheckedin=($countCheckinPerformance/$countRegPerformance)*100; echo number_format($PercentageCheckedin,2)."%"; ?></font></td>
        <td title="This SUM does not include Complimentary,Volunteers,Sponsored,Officials and Delegates" bgcolor="#4DD30E"><font color="#F6F6F6"><?php $getMpungaPerformance=mysqli_query($conn,"SELECT SUM(`amount`) mpunga FROM `delegate` WHERE `glssite` = '".$rowSiteStats['sitename']."' AND `glsyear`='".$CurrYear."' AND `amount`<>1  AND `ticket_paid`='YES'"); $rowMpungaPerformance=mysqli_fetch_array($getMpungaPerformance); $TotalMpungaPerformance=$TotalMpungaPerformance+$rowMpungaPerformance['mpunga']; echo number_format($rowMpungaPerformance['mpunga'],2);?></font></td>
      </tr>
      
      
      <?php } ?>
      
     
    </tbody>
  <tfoot>
    <tr>
      <td>Total</td>
       <td><?php echo $totalTarg;?></td>
        <td ><?php echo $totalRegPerformance; ?></td>
        <td bgcolor="#ED0E12"><font color="#F6F6F6"><?php $PercentageTotalTarget=($totalRegPerformance/$totalTarg)*100; echo number_format($PercentageTotalTarget,2)."%"; ?></font></td>
        <td><?php echo $totalCheckinPerformance;?></td>
        
        <td bgcolor="#ED0E12"><font color="#F6F6F6"><?php $PercentageTotalCheckedIn= ($totalCheckinPerformance/$totalRegPerformance)*100; echo number_format($PercentageTotalCheckedIn,2)."%";?></font></td>
        <td title="This SUM does not include Complimentary,Volunteers,Sponsored,Officials and Delegates"  bgcolor="#4DD30E"><font color="#F6F6F6"><?php echo number_format($TotalMpungaPerformance,2);?></font></td>
      </tr>
    </tr>
  </tfoot>
  </table>
 
 </div>
</div>
  
     <div>          
   <h2>Summary Statistics for <?php echo $CurrYear;?> <?php echo PROJECT_NAME;?> Sites</h2>
    <table class="table table-hover">
    <thead>
      <tr>
      <th bgcolor="#C68B26"><font color="#F6F6F6">Total summit registration</font></th>
       <th bgcolor="#6E6E07"><font color="#F6F6F6">Website registration</font></th>
        <th bgcolor="#0F6F60"><font color="#F6F6F6">Dashboard registration</font></th>
       <th bgcolor="#44REUE"><font color="#F6F6F6">Bulk registration</font></th>
        <th bgcolor="#4EEE3E"><font color="#F6F6F6">Cashless registration</font></th>
        <th bgcolor="#053CC4"><font color="#F6F6F6">checked-in</font></th>
        <th bgcolor="#9E1A1C"><font color="#F6F6F6">Not checked-in</font></th>
        
        
      </tr>
    </thead>
   <tbody>
   	   <tr>
      <th bgcolor="#C68B26" title="All registrants who have ticketed issued"><font color="#F6F6F6"> <?php $getTotalSummitReg=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `ticketNo` IS NOT NULL AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."'"); echo mysqli_num_rows($getTotalSummitReg);?></font></th>
      <th bgcolor="#6E6E07" title="Registrants who registered and paid through PWA website"><font color="#F6F6F6"><?php $getPaidWebsite=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `ticketNo` IS NOT NULL AND `payment_mode`='PESAPAL' AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."'"); echo mysqli_num_rows($getPaidWebsite); ?></font></th> 
       <th bgcolor="#0F6F60" title="Registrants who were registered through dashboard and paid for their tickets"><font color="#F6F6F6"><?php $getPaidManually=mysqli_query($conn,"SELECT * FROM `delegate` WHERE  `ticketNo` IS NOT NULL AND `payment_mode` <> 'PESAPAL' AND `payment_mode` IS NOT NULL AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."' AND `email` <> 'NO EMAIL' AND `organization`<>'NO ORGANIZATION'"); echo mysqli_num_rows($getPaidManually); ?></font></th> 
      <th bgcolor="#44REUE" title="Registrants who were registered in bulk"><font color="#F6F6F6"><?php $getPaidManually=mysqli_query($conn,"SELECT * FROM `delegate` WHERE  `ticketNo` IS NOT NULL AND `payment_mode` <> 'PESAPAL' AND `payment_mode` IS NOT NULL AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."'  AND `email` = 'NO EMAIL'"); echo mysqli_num_rows($getPaidManually); ?></font></th>
        <th bgcolor="#4EEE3E" title="Registrants who were registered but paid no cash"><font color="#F6F6F6"><?php $getPaidCashless=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `ticketNo` IS NOT NULL AND `amount`='0' AND `package` NOT IN ('Normal','NORMAL','VIP','STUDENT')  AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."'"); echo mysqli_num_rows($getPaidCashless); ?></font></th>
      <th bgcolor="#053CC4" title="Already checked-in registrants"><font color="#F6F6F6"><?php $getTotalCheckedin=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `checkedin`='YES'  AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."'");echo mysqli_num_rows($getTotalCheckedin); ?></font></th>
      <th bgcolor="#9E1A1C" title="Delegates not yet checked in"><font color="#F6F6F6"><?php $getTotalNotCheckedin=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `checkedin`='NO'  AND `ticket_paid`='YES'  AND `glsyear`='".$CurrYear."'"); echo mysqli_num_rows($getTotalNotCheckedin); ?></font></th>
      
        
      </tr>
   	
   </tbody>
  </table></div>      
     
         
     <div>          
   <h2>Nisajili Plus Billing  <?php echo $CurrYear;?> for <?php echo CLIENT;?></h2>
    <table class="table table-hover">
    <thead>
      <tr>
      <th bgcolor="#9F1A1C"><font color="#F6F6F6">Bulk SMS Sent</font></th>
       <th bgcolor="#6E2E37"><font color="#F6F6F6">Price Per SMS</font></th>
        <th bgcolor="#BEBEC7"><font color="#F6F6F6">SMS Billed Amount</font></th>
       <th bgcolor="#053CC4"><font color="#F6F6F6">Amount Collected</font></th>
        <th bgcolor="#0F6F60"><font color="#F6F6F6">Billing Rate</font></th>
        <th bgcolor="#BEBEC7"><font color="#F6F6F6">Amount Billed</font></th>
        <th bgcolor="#C68B26"><font color="#F6F6F6">Total Registrants</font></th>
        
        
      </tr>
    </thead>
   <tbody>
   	   <tr>
      <th bgcolor="#9F1A1C" title="....."><font color="#F6F6F6"> <?php $getTotalSMSSent=mysqli_query($conn,"SELECT * FROM `billingsummary`"); 
		  $rowTotalSMSSent=mysqli_fetch_array($getTotalSMSSent); echo number_format($rowTotalSMSSent['totalsmssent']);?></font></th>
      <th bgcolor="#6E2E37" title="Price Per 160 Characters SMS"><font color="#F6F6F6"><?php echo $rowTotalSMSSent['smsprice']; ?></font></th> 
       <th bgcolor="#BEBEC7" title="Payable to DigitalBrain"><font color="#F6F6F6"><?php echo number_format($rowTotalSMSSent['smsbilledamount'],2); ?></font></th> 
      <th bgcolor="#053CC4" title="....."><font color="#F6F6F6"><?php echo number_format($TotalMpungaPerformance,2); ?></font></th>
        <th bgcolor="#0F6F60" title="Billing rate per transaction"><font color="#F6F6F6"><?php $billingrate=$rowTotalSMSSent['billingrate']*100; echo $billingrate.'%'; ?></font></th>
      <th bgcolor="#BEBEC7" title="Payable to DigitalBrain"><font color="#F6F6F6"><?php $TotalAmountBilled=$TotalMpungaPerformance*$rowTotalSMSSent['billingrate']; echo number_format($TotalAmountBilled,2); ?></font></th>
      <th bgcolor="#C68B26" title="...."><font color="#F6F6F6"><?php echo mysqli_num_rows($getTotalSummitReg); ?></font></th>
      
        
      </tr>
     
   </tbody>
   
  </table></div>     
             
             
             
             
              </div>
            </div>
            
          </div>
        </div>