<?php 

//Create Reports Views for Site Delegates


function CreateDBVeiwsDelegateRpt($CurrYear) {
	
include '../Includes.php';	
	
	$getSiteInfoDelegate=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

   for ($i = 1; $i <= mysqli_num_rows($getSiteInfoDelegate); $i++) {
  		
  $rowSiteNamesDelegate=mysqli_fetch_array($getSiteInfoDelegate);	
   
	   
$viewnameDelegate='vw_delegate_'.$CurrYear.'_'.$rowSiteNamesDelegate['sitename'];
	   
	   

$sqlDelegate="CREATE OR REPLACE
  
    VIEW ".DB_DATABASE.".".$viewnameDelegate." 
    AS
(SELECT * FROM `delegate` WHERE `glsyear`='".$CurrYear."' AND `glssite`='".$rowSiteNamesDelegate['sitename']."');";
	   
	 

$createViewsDelagate=mysqli_query($conn,$sqlDelegate);
	   
	   
              
   } 

	
}

function CreateDBVeiwsCollectionRpt($CurrYear) {
	
include '../Includes.php';	
	
	$getSiteInfoCollection=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

   for ($i = 1; $i <= mysqli_num_rows($getSiteInfoCollection); $i++) {
  		
  $rowSiteNamesCollection=mysqli_fetch_array($getSiteInfoCollection);	
   
	   
$viewnameCollection='vw_collection_'.$CurrYear.'_'.$rowSiteNamesCollection['sitename'];
	   
	   

$sqlCollection="CREATE OR REPLACE
  
    VIEW ".DB_DATABASE.".".$viewnameCollection." 
    AS
(SELECT * FROM `delegate` WHERE `glsyear`='".$CurrYear."' AND `glssite`='".$rowSiteNamesCollection['sitename']."' AND `ticket_paid`='YES' );";
	   
  

$createViewsCollection=mysqli_query($conn,$sqlCollection);
	   
	   
              
   } 

	
}


//Create Reports Views for Site Car Parking


function CreateDBVeiwsCarRpt($CurrYear) {
	
include '../Includes.php';	
	
	$getSiteInfoCarParking=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

   for ($i = 1; $i <= mysqli_num_rows($getSiteInfoCarParking); $i++) {
  		
  $rowSiteNamesCarParking=mysqli_fetch_array($getSiteInfoCarParking);	
   
	   
$viewnameCarParking='vw_delegate_'.$CurrYear.'_'.$rowSiteNamesCarParking['sitename']."_CarParking";
	   
	   

$sqlCarParking="CREATE OR REPLACE
  
    VIEW ".DB_DATABASE.".".$viewnameCarParking." 
    AS
(SELECT * FROM `delegate` WHERE `glsyear`='".$CurrYear."' AND `glssite`='".$rowSiteNamesCarParking['sitename']."' AND `gatepass`='YES');";
	   
	 

$createViewsCarParking=mysqli_query($conn,$sqlCarParking);
	   
	   
              
   } 

	
}



function CreateDBVeiwsActualRevenue($CurrYear) {

    include '../Includes.php';

    $getSiteInfoActualRevenue = mysqli_query($conn, "SELECT `sitename` FROM `glssiteinfo`");

    for ($i = 1; $i <= mysqli_num_rows($getSiteInfoActualRevenue); $i++) {

        $rowSiteActualRevenue = mysqli_fetch_array($getSiteInfoActualRevenue);
     $viewnameActualRevenue = 'vw_actualrevenue_' . $CurrYear . '_' . $rowSiteActualRevenue['sitename'];
        $sqlActualRevenue = "CREATE OR REPLACE
  
    VIEW " . DB_DATABASE . "." . $viewnameActualRevenue . " 
    AS
(SELECT * FROM `actual_revenue` WHERE `glsyear`='" . $CurrYear . "' AND `Site`='" . $rowSiteActualRevenue['sitename'] . "')";
        $createViewsActualRevenue = mysqli_query($conn, $sqlActualRevenue);
    }
}

function CreateDBVeiwsBudgetRevenue($CurrYear) {

    include '../Includes.php';

    $getSiteInfoBudgetRevenue = mysqli_query($conn, "SELECT `sitename` FROM `glssiteinfo`");

    for ($i = 1; $i <= mysqli_num_rows($getSiteInfoBudgetRevenue); $i++) {

        $rowSiteBudgetRevenue = mysqli_fetch_array($getSiteInfoBudgetRevenue);
     $viewnameBudgetRevenue = 'vw_budgetrevenue_' . $CurrYear . '_' . $rowSiteBudgetRevenue['sitename'];
        $sqlActualRevenue = "CREATE OR REPLACE
  
    VIEW " . DB_DATABASE . "." . $viewnameBudgetRevenue . " 
    AS
(SELECT * FROM `budget_revenue` WHERE `glsyear`='" . $CurrYear . "' AND `Site`='" . $rowSiteBudgetRevenue['sitename'] . "')";
        $createViewsBudgetRevenue = mysqli_query($conn, $sqlActualRevenue);
    }
}


function CreateDBVeiwsBudgetExpense($CurrYear) {

    include '../Includes.php';

    $getSiteInfoBudgetExpense = mysqli_query($conn, "SELECT `sitename` FROM `glssiteinfo`");

    for ($i = 1; $i <= mysqli_num_rows($getSiteInfoBudgetExpense); $i++) {

        $rowSiteBudgetExpense = mysqli_fetch_array($getSiteInfoBudgetExpense);
     $viewnameBudgetExpense = 'vw_budgetexpenses_' . $CurrYear . '_' . $rowSiteBudgetExpense['sitename'];
        $sqlBudgetExpense = "CREATE OR REPLACE
  
    VIEW " . DB_DATABASE . "." . $viewnameBudgetExpense . " 
    AS
(SELECT * FROM `budget_expenses` WHERE `glsyear`='" . $CurrYear . "' AND `Site`='" . $rowSiteBudgetExpense['sitename'] . "')";
        $createViewsBudgetRevenue = mysqli_query($conn, $sqlBudgetExpense);
    }
}

function CreateDBVeiwsActualExpense($CurrYear) {

    include '../Includes.php';

    $getSiteInfoActualExpense = mysqli_query($conn, "SELECT `sitename` FROM `glssiteinfo`");

    for ($i = 1; $i <= mysqli_num_rows($getSiteInfoActualExpense); $i++) {

        $rowSiteActualExpense = mysqli_fetch_array($getSiteInfoActualExpense);
     $viewnameActualExpense = 'vw_actualexpenses_' . $CurrYear . '_' . $rowSiteActualExpense['sitename'];
        $sqlActualExpense = "CREATE OR REPLACE
  
    VIEW " . DB_DATABASE . "." . $viewnameActualExpense . " 
    AS
(SELECT * FROM `actual_expenses` WHERE `glsyear`='" . $CurrYear . "' AND `Site`='" . $rowSiteActualExpense['sitename'] . "')";
        $createViewsActualRevenue = mysqli_query($conn, $sqlActualExpense);
    }
}



//Get sites names list for graphs (seperated by commas eg. 'site1','site2','site3','site4','siten')
function GraphSitenNames() { 
	
include '../Includes.php';	
	
	$getSiteInfo=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

   for ($i = 1; $i <= mysqli_num_rows($getSiteInfo); $i++) {
  		
  $rowSiteNames=mysqli_fetch_array($getSiteInfo);	
   
	   $Sites.="'".$rowSiteNames['sitename']."',";
              
   } 
   
$Sites=rtrim($Sites,',');
echo $Sites;
							
 }

//Get sites registered delegates list for graphs (seperated by commas eg. '203','367','780','352','nnn')

function GraphSiteDelegatesCount($CurrYear) {
	
include '../Includes.php';
	
	  $getSiteInfo2=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

   for ($j = 1; $j <= mysqli_num_rows($getSiteInfo2); $j++) {
  		
  $rowSiteNames2=mysqli_fetch_array($getSiteInfo2);	
   
	  
	   
	   $getAttendants=mysqli_query($conn,"SELECT * FROM `delegate` WHERE `glsyear`='".$CurrYear."' AND `glssite`='".$rowSiteNames2['sitename']."' AND `ticket_paid`='YES'"); $countSite=mysqli_num_rows($getAttendants); 
	   
	   $CountSite.=$countSite.",";
	   
              
   } 
   
$CountSite=rtrim($CountSite,',');
echo $CountSite;
		  

	
}


function PieChartGraphSitePerformance($CurrYear) {
	
	include '../Includes.php';
	
	//Fetch Sites List
	
	$getSiteInfo=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

   for ($i = 1; $i <= mysqli_num_rows($getSiteInfo); $i++) {
  		
   $rowSiteNames=mysqli_fetch_array($getSiteInfo);	
   
	   $Sites.="'".$rowSiteNames['sitename']."',";
              
       } 
   
       $SitesList=rtrim($Sites,',');
	

	
	//Get Total Revenue for all sites
	$getTotalRevenue=mysqli_query($conn,"SELECT SUM(amount) s FROM `delegate` WHERE `glsyear`='".$CurrYear."' AND `glssite` IN (".$SitesList.") AND `ticket_paid`='YES'");
	$rowTotalRevenue=mysqli_fetch_array($getTotalRevenue);
	$TotalCollection=$rowTotalRevenue['s'];
	

	  $getSiteInfo3=mysqli_query($conn,"SELECT `sitename` FROM `glssiteinfo`");	

      for ($k = 1; $k <= mysqli_num_rows($getSiteInfo3); $k++) {
  		
      $rowSiteNames3=mysqli_fetch_array($getSiteInfo3);	
   
 
	   $getTxn=mysqli_query($conn,"SELECT SUM(amount) s FROM `delegate` WHERE `glsyear`='".$CurrYear."' AND `glssite`='".$rowSiteNames3['sitename']."' AND `ticket_paid`='YES'"); 
	   $rowTxn=mysqli_fetch_array($getTxn);
	   

	   $Txn=($rowTxn['s']/$TotalCollection)*100;
	   
	   $list.= '['."'".$rowSiteNames3['sitename']."',".number_format($Txn,2)."],";
	   
   
              
   } 
	
   
$list=rtrim($list,',');
echo $list;
	  

	
}


//Send SMS



 require_once('SendSMS.php');

?>