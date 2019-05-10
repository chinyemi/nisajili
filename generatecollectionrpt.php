<?php 

require_once('header.php');

?>
<!DOCTYPE html>
<html lang="en">
  
  <?php include('htmlheader.php');?>

  <body class="nav-md">
    
    <!--menu top logo div-->
     <?php include('menutoplogodiv.php'); ?>
            
     <!-- /menu top logo div-->

            <!-- menu profile quick info -->
           <?php include('quickprofileinfodiv.php'); ?>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
           <?php include('menu.php'); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php include('menufooterbuttondiv.php'); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
      <?php include('topnavigationdetailsdiv.php'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              
                 
        <!-- /page content -->
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="<?php echo $iFrameLink;?>?Id=<?php echo $Id;?>&Year=<?php echo $CurrYear;?>"></iframe>
</div>
        <!-- footer content -->
       <?php include('htmlfooter.php'); ?>
        <!-- /footer content -->
      </div>
    </div>

   <?php include('libraries.php'); ?>
	
  </body>
</html>

