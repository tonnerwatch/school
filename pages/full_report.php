<?php
session_start();
ob_start();
include('autoload.php');
?>
<?php include('template_1.php'); ?>
<meta charset="utf-8">
<title>รายงาน</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />
<?php include('template_2.php'); ?>
  <!-- BODY -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="row">
        <div class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-dark"> <i class="icon-settings font-dark"></i> <span class="caption-subject bold uppercase"> รายงาน</span> </div>
            <div class="actions">
              <div class="btn-group btn-group-devided" data-toggle="buttons">
              </div>
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-6">
                  <div class="btn-group">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="btn-group pull-right">
                  </div>
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
              <thead>
                <tr>
                  <th width="300"> โรงเรียน </th>
                  <th width="300"> จังหวัด </th>
                  <th width="50"> รายงาน </th>
                </tr>
              </thead>
              <tbody>
              <?php
			  include('mysql_connect.php');
			  
			  if($_SESSION['role'] == "director"){
			  $sql = "SELECT * FROM school WHERE school_id = '$_SESSION[school_id]'";
			  } else if($_SESSION['role'] == "province"){
				  $sql = "SELECT * FROM school WHERE province = '$_SESSION[province]'";
			  } else if($_SESSION['role'] == "country"){
				  $sql = "SELECT * FROM school";
			  }
			  $result = mysqli_query($link, $sql);
			  while($data = mysqli_fetch_array($result)){
			  ?>
                <tr class="odd gradeX">
                  <td> <?php echo $data['school_name_th']; ?> </td>
                  <td> <?php echo $data['province']; ?> </td>
                  <td> <a href="manage-report.php?id=<?php echo $data['school_id']; ?>"><button id="sample_editable_1_new" class="btn sbold green"> รายงาน </button></a> </td>
                </tr>  
                <?php
			  }
				?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- BODY --> 

<!-- JAVA --> 
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script> 
<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script> 
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<?php include('template_3.php'); ?>