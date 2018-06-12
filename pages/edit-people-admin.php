<?php
session_start();
ob_start();
include('autoload.php');
include('mysql_connect.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<?php 
	include('template_1.php'); 
?>
<meta charset="utf-8" />
<title>แก้ไขข้อมูล - บุคคลากร</title>

<!-- SCRIPT TOP -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL STYLES -->
<link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="../assets/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->
<link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/layouts/layout4/css/themes/default-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="../assets/layouts/layout4/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->

<link rel="shortcut icon" href="favicon.ico" />
<!-- END SCRIPT TOP -->

<!-- ตรวจสอบแป้นพิมพ์ให้พิมพ์ได้เฉพาะตัวเลขเท่านั้น -->
<script src="jquery.min.js"></script>
<script>
$(function(){
	$(document).ready(function(){
		if($('#position').val() != "อื่นๆ"){
			$('#o').hide();
		} else {
			$('#o').show();
		}
		
		if($('#position').val() == "หัวหน้า"){
			$('#class').show();
			$('#room').hide();
		} else if($('#position').val() == "ครู"){
			$('#class, #room').show();
		} else {
			$('#class, #room').hide();
		}
		
		if($('#hidden').val() == "administration"){
			$('#tam').show();
		} else {
			$('#tam').hide();
		}
	});
	
	$('#position').change(function(){
		if($('#position').val() == "อื่นๆ"){
			$('#o').show();
		} else {
			$('#o').hide();
			
			if($('#position').val() == "หัวหน้า"){
				$('#class').show();
				$('#room').hide();
			} else if($('#position').val() == "ครู"){
				$('#class, #room').show();
			} else {
				$('#class, #room').hide();
			}
		}
	});
});
</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<!-- END -->

<!-- BEGIN STYLE -->
<style>
.raya {
	margin-left: 0%;
}
.font-size-color {
	color: red;
}
</style>
<!-- END STYLE -->
<?php include('template_2.php'); ?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<div class="page-content">
<div class="page-head">
<div class="page-title">
	<h1>แก้ไขข้อมูล - บุคคลากร
		<?php
			$sql = "SELECT school_name_th FROM school WHERE school_id = '$_SESSION[school_id]'";
			$result = mysqli_query($link, $sql);
			$school = mysqli_fetch_assoc($result);
		?>
		<small><?php echo $school['school_name_th']; ?></small>
	</h1>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="profile-sidebar">
<div class="portlet light profile-sidebar-portlet bordered">
	<!-- BEGIN FORM-->
	<form method="post" name="form1" enctype="multipart/form-data"><!--  class="form-horizontal" id="form_sample_1" -->
	<div class="form-group" style="margin: -20px 10px 10px 10px">
	<div class="fileinput fileinput-new" data-provides="fileinput">
	<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
		<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
	</div>
	<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
	<div>
		<span class="btn default btn-file">
		<span class="fileinput-new"> Select image </span>
		<span class="fileinput-exists"> Change </span>
			<input type="file" name="photo">
		</span>
		<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
	</div>
	</div>
	<div class="clearfix margin-top-10">
		<span class="label label-danger">NOTE! </span>
		<span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
	</div>
	</div>
</div>
</div>
<div class="profile-content">
<div class="row">
<div class="col-md-12">
<div class="portlet light bordered">
<!-- BEGIN TAB MENU -->
<div class="portlet-title tabbable-line">
<div class="caption caption-md">
	<i class="icon-globe theme-font hide"></i>
	<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
</div>
<ul class="nav nav-tabs">
	<li class="active">
		<a href="#tab_1_1" data-toggle="tab">ข้อมูลทั่วไป</a>
	</li>
	<li>
		<a href="#tab_1_2" data-toggle="tab">ข้อมูลของบุคลากร</a>
	</li>
    <?php
	if($_SESSION['role'] == "administration"){
		echo "
			<li>
				<a href='#tab_1_3' data-toggle='tab'>Change Password</a>
			</li>";
	}
	?>
    <li>
		<button type="submit" name="general" class="btn btn-sm blue">ปรับปรุงข้อมูล</button>
	</li>
</ul>
</div>
<!-- END TAB MENU -->
<div class="portlet-body">
<div class="tab-content">
<!-- BEGIN TAB 1 -->
<div class="tab-pane active" id="tab_1_1">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลทั่วไป - บุคลากร</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		$id = $_GET['id'];
		$value = "SELECT * FROM personnel WHERE id_card = '$id'";
		$value_result = mysqli_query($link, $value);
		$value_data = mysqli_fetch_assoc($value_result);
		
		$login = "SELECT password FROM login WHERE id_card = '$id'";
		$login_result = mysqli_query($link, $login);
		$login_data = mysqli_fetch_assoc($login_result);
	
	
		//สร้างตัวแปร
		$general = $_POST['general'];
		$_COOKIE['sub_name'] = $_POST['sub_name'];
		$_COOKIE['graduated_major'] = $_POST['graduated_major'];
		$_COOKIE['extra_work'] = $_POST['extra_work'];
		$_COOKIE['special_expertise'] = $_POST['special_expertise'];
		$_COOKIE['class'] = $_POST['class'];
		$_COOKIE['position_at'] = $_POST['position_at'];
		$_COOKIE['position_o'] = $_POST['position_o'];
		
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			//ตรวจสอบคำนำหน้า
			if($_COOKIE['sub_name'] == "เลือก"){
				$validation = "<li>" . "กรุณาเลือกคำนำหน้า" . "</li>";
				$prefix_validation = "กรุณาเลือกคำนำหน้า";
				$validation_prefix = FALSE;
			} else {
				$validation_prefix = TRUE;
			}
			
			//ตรวจสอบภาษาไทย
			$thai_pattern = "/^[a-zA-Z0-9]+$/i";
			//ตรวจสอบชื่อ(ให้กรอกเป็นภาษาไทย)
			$_COOKIE['first_name_th'] = $_POST['first_name_th'];
			if (!$_COOKIE['first_name_th'] == "") {
				if (preg_match($thai_pattern, $_COOKIE['first_name_th'])) {
					$validation .= "<li>" . "กรุณากรอกชื่อเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร" . "</li>";
					$first_name_th_validation = "กรุณากรอกชื่อเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร";
					$validation_first_name_th = FALSE;
				} else {
					$validation_first_name_th = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกชื่อ(ภาษาไทย)" . "</li>";
				$first_name_th_validation = "กรุณากรอกชื่อ(ภาษาไทย)";
				$validation_first_name_th = FALSE;
			}
			
			//ตรวจสอบนามสกุล(ให้กรอกเป็นภาษไทย)
			$_COOKIE['last_name_th'] = $_POST['last_name_th'];
			if (!$_COOKIE['last_name_th'] == "") {
				if (preg_match($thai_pattern, $_COOKIE['last_name_th'])) {
					$validation .= "<li>" . "กรุณากรอกนามสกุลเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร" . "</li>";
					$last_name_th_validation = "กรุณากรอกนามสกุลเป็นภาษาไทย ก-ฮ ไม่เกิน 100 ตัวอักษร";
					$validation_last_name_th = FALSE;
				} else {
					$validation_last_name_th = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกนามสกุล(ภาษาไทย)" . "</li>";
				$last_name_th_validation = "กรุณากรอกนามสกุล(ภาษาไทย)";
				$validation_last_name_th = FALSE;
			}
			
			//ตรวจสอบชื่อ(ให้กรอกเป็นภาษาอังกฤษ)
			$_COOKIE['first_name_en'] = $_POST['first_name_en'];
			if (!$_COOKIE['first_name_en'] == "") {
				if (!preg_match($thai_pattern, $_COOKIE['first_name_en'])) {
					$validation .= "<li>" . "กรุณากรอกชื่อเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร" . "</li>";
					$first_name_en_validation = "กรุณากรอกชื่อเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร";
					$validation_first_name_en = FALSE;
				} else {
					$validation_first_name_en = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกชื่อ(ภาษาอังกฤษ)" . "</li>";
				$first_name_en_validation = "กรุณากรอกชื่อ(ภาษาอังกฤษ)";
				$validation_first_name_en = FALSE;
			}
			
			//ตรวจสอบนามสกุล(ให้กรอกเป็นภาษอังกฤษ)
			$_COOKIE['last_name_en'] = $_POST['last_name_en'];
			if (!$_COOKIE['last_name_en'] == "") {
				if (!preg_match($thai_pattern, $_COOKIE['last_name_en'])) {
					$validation .= "<li>" . "กรุณากรอกนามสกุลเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร" . "</li>";
					$last_name_en_validation = "กรุณากรอกนามสกุลเป็นภาษาอังกฤษ A-Z ไม่เกิน 100 ตัวอักษร";
					$validation_last_name_en = FALSE;
				} else {
					$validation_last_name_en = TRUE;
				}
			} else {
				$validation .= "<li>" . "กรุณากรอกนามสกุล(ภาษาอังกฤษ)" . "</li>";
				$last_name_en_validation = "กรุณากรอกนามสกุล(ภาษาอังกฤษ)";
				$validation_last_name_en = FALSE;
			}
			
			//ตรวจสอบเพศ
			$_COOKIE['gender'] = $_POST['gender'];
			if ($_COOKIE['gender'] == "เลือก") {
				$validation .= "<li>" . "กรุณาเลือกเพศ" . "</li>";
				$gender_validation = "กรุณาเลือกเพศ";
				$validation_gender = FALSE;
			} else {
				$validation_gender = TRUE;
			}
			
			//ตรวจสอบวัน/เดือน/ปี(เกิด)
			$_COOKIE['birthday_at'] = $_POST['birthday_at'];
			if ($_COOKIE['birthday_at'] == "") {
				$validation .= "<li>" . "กรุณาเลือก วัน/เดือน/ปี(เกิด)" . "</li>";
				$birthday_validation = "กรุณาเลือก วัน/เดือน/ปี(เกิด)";
				$validation_birthday = FALSE;
			} else {
				$validation_birthday = TRUE;
			}
			
			//ตรวจสอบเลขบัตรประชาชนหรือตัวเลขต่างๆ ที่มีจำนวน 13 หลัก
			$numberic_pattern = "/^[0-9]{13}$/";
			
			//ตรวจสอบเบอร์โทรศัพท์หรือตัวเลขต่างๆ ที่มีจำนวนตัวอักษรตั้งแต่ 9 - 10 หลัก
			$tel_pattern = "/^0[2689]{1}[0-9]{8,9}/";
			//ตรวจสอบเบอร์โทรศัพท์
			$_COOKIE['tel'] = $_POST['tel'];
			if ($_COOKIE['tel'] == "") {
				$validation .= "<li>" . "กรุณากรอกหมายเลขโทรศัพท์" . "</li>";
				$tel_validation = "กรุณากรอกหมายเลขโทรศัพท์";
				$validation_tel = FALSE;
			} else {
				if (!preg_match($tel_pattern, $_COOKIE['tel'])) {
					$validation .= "<li>" . "กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง" . "</li>";
					$tel_validation = "กรุณากรอกหมายเลขโทรศัพท์ให้ถูกต้อง" . "</li>";
					$validation_tel = FALSE;
				} else {
					$validation_tel = TRUE;
				}
			}
			
			//ตรวจสอบวุฒิการศึกษาสูงสุด
			$_COOKIE['graduated'] = $_POST['graduated'];
			if ($_COOKIE['graduated'] == "เลือก") {
				$validation .= "<li>" . "กรุณาเลือกวุฒิการศึกษาสูงสุด" . "</li>";
				$graduated_validation = "กรุณาเลือกวุฒิการศึกษาสูงสุด";
				$validation_graduated = FALSE;
			} else {
				$validation_graduated = TRUE;
			}
			
			$user_pattern = "/^[a-zA-Z0-9]{8,20}$/i";
			
			//ตรวจสอบ Current Password
			$_COOKIE['current_password'] = $_POST['current_password'];
			if(!$_COOKIE['current_password'] == ""){
				if(!preg_match($user_pattern, $_COOKIE['current_password'])){
					$form3 = "<li>" . "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
					$current_password_validation = "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข";
					$validation_current_password = FALSE;
				} else {
					if($_COOKIE['current_password'] != $login_data['password']){
						$form3 .= "<li>" . "รหัสผ่านของท่านไม่ถูกต้อง" . "</li>";
						$current_password_validation = "รหัสผ่านของท่านไม่ถูกต้อง";
						$validation_current_password = FALSE;
					} else {
						$validation_current_password = TRUE;
					}
				}
			} else {
				$validation_current_password = TRUE;
			}
			
			//ตรวจสอบ New Password
			$_COOKIE['password'] = $_POST['password'];
			if($_COOKIE['current_password'] == ""){
				if($_COOKIE['password'] != ""){
					$form3 .= "<li>" . "กรุณากรอก Current Password ก่อน" . "</li>";
					$password_validation = "กรุณากรอก Current Password ก่อน";
					$validation_password = FALSE;
				} else {
					$validation_password = TRUE;
					$_COOKIE['password'] = $login_data['password'];
				}
			} else {
				if($_COOKIE['password'] != ""){
					if(!preg_match($user_pattern, $_COOKIE['password'])){
						$form3 .= "<li>" . "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
						$password_validation = "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข";
						$validation_password = FALSE;
					} 	else {
						$validation_password = TRUE;
					}
				} else {
					$validation_password = TRUE;
					$_COOKIE['password'] = $login_data['password'];
				}
			}
			
			//ตรวจสอบ Re-Type New Password
			$_COOKIE['retype_password'] = $_POST['retype_password'];
			if(!$_COOKIE['retype_password'] == ""){
				if($_COOKIE['current_password'] == ""){
					$form3 .= "<li>" . "กรุณากรอก Current Password ก่อน" . "</li>";
					$retype_password_validation = "กรุณากรอก Current Password ก่อน";
					$validation_retype_password = FALSE;
				} else if($_COOKIE['password'] == "") {
					$form3 .= "<li>" . "กรุณากรอก New Password ก่อน" . "</li>";
					$retype_password_validation = "กรุณากรอก New Password ก่อน";
					$validation_retype_password = FALSE;
				} else {
					if($_COOKIE['retype_password'] !=  $_COOKIE['password']){
						$form3 .= "<li>" . "รหัสผ่านของท่านไม่ถูกต้อง" . "</li>";
						$retype_password_validation = "รหัสผ่านของท่านไม่ถูกต้อง";
						$validation_retype_password = FALSE;
					} else {
						if(!preg_match($user_pattern, $_COOKIE['retype_password'])){
							$form3 .= "<li>" . "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข" . "</li>";
							$retype_password_validation = "กรุณากรอก Password 8 - 20 ตัวอักษร เป็นภาษาอังกฤษหรือตัวเลข";
							$validation_retype_password = FALSE;
						} else {
							$validation_retype_password = TRUE;
						}
					}
				}
			} else {
				$validation_retype_password = TRUE;
			}
			
			
			//ตรวจสอบประเภทบุคลากร
			$_COOKIE['type_personnel'] = $_POST['type_personnel'];
			if($_COOKIE['type_personnel'] == "เลือก"){
				$form2 .= "<li>" . "กรุณาเลือกประเภทบุคลากร" . "</li>";
				$type_personnel_validation = "กรุณาเลือกประเภทบุคลากร";
				$validation_type_personnel = FALSE;
			} else {
				$validation_type_personnel = TRUE;
			}
			
			//ตรวจสอบตำแหน่ง
			$_COOKIE['position'] = $_POST['position'];
			if($_COOKIE['position'] == "เลือก"){
				$form2 .= "<li>" . "กรุณาเลือกตำแหน่งงาน" . "</li>";
				$position_validation = "กรุณาเลือกตำแหน่งงาน";
				$validation_position = FALSE;
			} else {
				$validation_position = TRUE;
			}
			
			//ตรวจสอบวิทยฐานะ
			$_COOKIE['academic_standing'] = $_POST['academic_standing'];
			
			//ตรวจสอบเงินเดือน
			$_COOKIE['salary'] = $_POST['salary'];
			if($_COOKIE['salary'] == ""){
				$form2 .= "<li>" . "กรุณาระบุเงินเดือน" . "</li>";
				$salary_validation = "กรุณาระบุเงินเดือน";
				$validation_salary = FALSE;
			} else {
				$validation_salary = TRUE;
			}
			
			//ตรวจสอบจำนวนห้อง
			$sql = "SELECT room FROM room WHERE school_id = '$_SESSION[school_id]'";
			$result = mysqli_query($link, $sql);
			$data = mysqli_fetch_assoc($result);
			$_COOKIE['room'] = $_POST['room'];
			if(!$_POST['room'] == ""){
				if($_COOKIE['class'] == "-- เลือก --"){
					$form2 .= "<li>" . "กรุณาเลือกชั้นเรียนก่อน" . "</li>";
					$room_validation = "กรุณาเลือกชั้นเรียนก่อน";
					$validation_salary = FALSE;
				} else {
					if($_COOKIE['room'] <= $data['room']){
						$validation_room = TRUE;
					} else {
						$form2 .= "<li>" . "จำนวนห้องเรียนของชั้น " . $_COOKIE['class'] . " มีแค่ " . $data['room'] . " ห้อง" . "</li>";
						$room_validation = "จำนวนห้องเรียนของชั้น " . $_COOKIE['class'] . " มีแค่ " . $data['room'] . " ห้อง";
						$validation_room = FALSE;
					}
				}
			}
			
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_prefix == FALSE || $validation_first_name_th == FALSE || $validation_last_name_th == FALSE || $validation_first_name_en == FALSE || $validation_last_name_en == FALSE || $validation_gender == FALSE || $validation_birthday == FALSE || $validation_tel == FALSE || $validation_graduated == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $validation;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_prefix == TRUE && $validation_first_name_th == TRUE && $validation_last_name_th == TRUE && $validation_first_name_en == TRUE && $validation_last_name_en == TRUE && $validation_gender == TRUE && $validation_birthday == TRUE && $validation_tel == TRUE && $validation_graduated == TRUE && $validation_type_personnel == TRUE && $validation_position == TRUE && $validation_salary == TRUE) {
				
				//เพิ่มข้อมูลเข้าฐานข้อมูล
				if(is_uploaded_file($_FILES['photo']['tmp_name'])){
					$ext = pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION);
					$filename = "photo/" . $_POST['id_card'] . "." . $ext;
				} else {
					$filename = $value_data['photo'];
				}
				
				//ตัวแปรค่า VALUE บุคลากร
				
				//เช็ค สิทธิ์
				if($_COOKIE['position'] == "ผู้อำนวยการ" || $_COOKIE['position'] == "รองผู้อำนวยการ"){
					$position = "director";
				} else if($_COOKIE['position'] == "ธุรการ"){
					$position = "administration";
				} else if($_COOKIE['position'] == "หัวหน้า"){
					$position = "chief";
				} else if($_COOKIE['position'] == "ครู"){
					$position = "teacher";
				}
				
				if($_COOKIE['position'] == "อื่นๆ"){
					$pos = $_COOKIE['position_o'];
				} else {
					$pos = $_COOKIE['position'];
				}
				
				//ปรับปรุงบุคลากร
				$sql = "UPDATE personnel SET sub_name = '$_COOKIE[sub_name]', first_name_th = '$_COOKIE[first_name_th]', last_name_th = '$_COOKIE[last_name_th]', first_name_en = '$_COOKIE[first_name_en]', last_name_en = '$_COOKIE[last_name_en]', gender = '$_COOKIE[gender]', birthday_at = '$_COOKIE[birthday_at]', tel = '$_COOKIE[tel]', graduated = '$_COOKIE[graduated]', graduated_major = '$_COOKIE[graduated_major]', extra_work = '$_COOKIE[extra_work]', special_expertise = '$_COOKIE[special_expertise]', type_personnel = '$_COOKIE[type_personnel]', position = '$pos', academic_standing = '$_COOKIE[academic_standing]', class = '$_COOKIE[class]', room = '$_COOKIE[room]', salary = '$_COOKIE[salary]', position_at = '$_COOKIE[position_at]', photo = '$filename' WHERE id_card = '$id'";
				$result = mysqli_query($link, $sql);
				
				//ปรับปรุง Username
				if($validation_current_password == TRUE && $validation_password == TRUE && $validation_retype_password == TRUE){
					$sql = "UPDATE login SET password = '$_COOKIE[password]' WHERE id_card = '$id'";
					$result = mysqli_query($link, $sql);
				}
				
				
				move_uploaded_file($_FILES['photo']['tmp_name'],$filename);
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
				
			} else {
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลครบถ้วน";
				echo "</div>";
			}
		}
	?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">คำนำหน้า
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="sub_name">
			<option value="เลือก">-- เลือก --</option>
			<option value="นาย" <?php if($_COOKIE['sub_name'] == "นาย" || $value_data['sub_name'] == "นาย"){ echo "selected"; } ?>>นาย</option>
			<option value="นาง" <?php if($value_data['sub_name'] == "นาง" || $_COOKIE['sub_name'] == "นาง"){ echo "selected"; } ?>>นาง</option>
			<option value="นางสาว" <?php if($value_data['sub_name'] == "นางสาว" || $_COOKIE['sub_name'] == "นางสาว"){ echo "selected"; } ?>>นางสาว</option>
            <option value="ศาสตราจารย์" <?php if($value_data['sub_name'] == "ศาสตราจารย์" || $_COOKIE['sub_name'] == "ศาสตราจารย์"){ echo "selected"; } ?>>ศาสตราจารย์</option>
            <option value="ผู้ช่วยศาสตราจารย์" <?php if($value_data['sub_name'] == "ผู้ช่วยศาสตราจารย์" || $_COOKIE['sub_name'] == "ผู้ช่วยศาสตราจารย์"){ echo "selected"; } ?>>ผู้ช่วยศาสตราจารย์</option>
            <option value="รองศาสตราจารย์" <?php if($value_data['sub_name'] == "รองศาสตราจารย์" || $_COOKIE['sub_name'] == "รองศาสตราจารย์"){ echo "selected"; } ?>>รองศาสตราจารย์</option>
            <option value="หม่อมหลวง" <?php if($value_data['sub_name'] == "หม่อมหลวง" || $_COOKIE['sub_name'] == "หม่อมหลวง"){ echo "selected"; } ?>>หม่อมหลวง</option>
            <option value="หม่อมราชวงค์" <?php if($value_data['sub_name'] == "หม่อมราชวงค์" || $_COOKIE['sub_name'] == "หม่อมราชวงค์"){ echo "selected"; } ?>>หม่อมราชวงค์</option>
            <option value="หม่อมเจ้า" <?php if($value_data['sub_name'] == "หม่อมเจ้า" || $_COOKIE['sub_name'] == "หม่อมเจ้า"){ echo "selected"; } ?>>หม่อมเจ้า</option>
		</select>
	<div class="form-control-focus"> </div>
	<input type="hidden" id="hidden" value="<?php echo $_SESSION['role']; ?>">
    <?php echo "<span class=font-size-color>" . $prefix_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="first_name_th" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['first_name_th']; } else { echo $value_data['first_name_th']; } ?>" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $first_name_th_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาไทย)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="last_name_th" maxlength="100" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['last_name_th']; } else { echo $value_data['last_name_th']; } ?>">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $last_name_th_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อ<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['first_name_en']; } else { echo $value_data['first_name_en']; } ?>" placeholder="" name="first_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $first_name_en_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">นามสกุล<small>(ภาษาอังกฤษ)</small>
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['last_name_en']; } else { echo $value_data['last_name_en']; } ?>" placeholder="" name="last_name_en" maxlength="100">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $last_name_en_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เพศ
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="gender">
			<option value="เลือก">-- เลือก --</option>
			<option value="ชาย" <?php if($value_data['gender'] == "ชาย" || $_COOKIE['gender'] == "ชาย"){ echo "selected"; } ?>>ชาย</option>
            <option value="หญิง" <?php if($value_data['gender'] == "หญิง" || $_COOKIE['gender'] == "หญิง"){ echo "selected"; } ?>>หญิง</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $gender_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
    	<label class="col-md-3 control-label">วัน/เดือน/ปี
        	<small>(เกิด)</small>
            <span class="required">*</span>
        </label>
    <div class="col-md-9">
    <div class="input-group date date-picker" data-date="<?php if(isset($_POST['general'])){ echo $_COOKIE['birthday_at']; } else { echo $value_data['birthday_at']; } ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    	<span class="input-group-btn">
    		<button class="btn default" type="button">
    			<i class="fa fa-calendar"></i>
    		</button>
    	</span>
    	<input name="birthday_at" type="text" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['birthday_at']; } else { echo $value_data['birthday_at']; } ?>" class="form-control" readonly>
    </div>
    	<span class="help-block"> เลือกวัน/เดือน/ปี </span>
        <?php echo "<span class=font-size-color>" . $birthday_validation . "</span>"; ?>
    </div>
    </div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เลขบัตรประชาชน 
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $value_data['id_card']; ?>" placeholder="" name="id_card" maxlength="13" OnKeyPress="return chkNumber(this)" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เบอร์โทรศัพท์ 
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['tel']; } else { echo $value_data['tel']; } ?>" placeholder="" name="tel" maxlength="10" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $tel_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">วุฒิการศึกษาสูงสุด
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="graduated">
			<option value="เลือก">-- เลือก --</option>
			<option value="มัธยมศึกษาตอนปลาย" <?php if($value_data['graduated'] == "มัธยมศึกษาตอนปลาย"){ echo "selected"; } ?>>มัธยมศึกษาตอนปลาย</option>
			<option value="ประกาศนียบัตรวิชาชีพ" <?php if($value_data['graduated'] == "ประกาศนียบัตรวิชาชีพ"){ echo "selected"; } ?>>ประกาศนียบัตรวิชาชีพ</option>
			<option value="ประกาศนียบัตรวิชาชีพชั้นสูง" <?php if($value_data['graduated'] == "ประกาศนียบัตรวิชาชีพชั้นสูง"){ echo "selected"; } ?>>ประกาศนียบัตรวิชาชีพชั้นสูง</option>
            <option value="ปริญญาตรี" <?php if($value_data['graduated'] == "ปริญญาตรี" || $_COOKIE['graduated'] == "ปริญญาตรี"){ echo "selected"; } ?>>ปริญญาตรี</option>
            <option value="ปริญญาโท" <?php if($value_data['graduated'] == "ปริญญาโท" || $_COOKIE['graduated'] == "ปริญญาโท"){ echo "selected"; } ?>>ปริญญาโท</option>
            <option value="ปริญญาเอก" <?php if($value_data['graduated'] == "ปริญญาเอก" || $_COOKIE['graduated'] == "ปริญญาเอก"){ echo "selected"; } ?>>ปริญญาเอก</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $graduated_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">วิชาเอก</label>
	<div class="col-md-9">
		<textarea class="form-control maxlength_defaultconfig" name="graduated_major" rows="3" maxlength="255"><?php if(isset($_POST['general'])){ echo $_COOKIE['graduated_major']; } else { echo $value_data['graduated_major']; } ?></textarea>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">งานพิเศษอื่นๆ</label>
	<div class="col-md-9">
		<textarea class="form-control maxlength_defaultconfig" name="extra_work" rows="3" maxlength="255"><?php if(isset($_POST['general'])){ echo $_COOKIE['extra_work']; } else { echo $value_data['extra_work']; } ?></textarea>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ความชำนาญพิเศษ</label>
	<div class="col-md-9">
		<textarea class="form-control maxlength_defaultconfig" name="special_expertise" rows="3" maxlength="255"><?php if(isset($_POST['general'])){ echo $_COOKIE['special_expertise']; } else { echo $value_data['special_expertise']; } ?></textarea>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	</div>
	<div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
	</div>
	</div>
	</div>
</div>
</div>
<!-- END TAB 1 -->

<!-- TAB 2 -->
<div class="tab-pane" id="tab_1_2">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">ข้อมูลทั่วไป - บุคลากร</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_type_personnel == FALSE || $validation_position == FALSE || $validation_salary == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $form2;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_prefix == TRUE && $validation_first_name_th == TRUE && $validation_last_name_th == TRUE && $validation_first_name_en == TRUE && $validation_last_name_en == TRUE && $validation_gender == TRUE && $validation_birthday == TRUE && $validation_tel == TRUE && $validation_graduated == TRUE && $validation_type_personnel == TRUE && $validation_position == TRUE && $validation_salary == TRUE) {
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
			} else {
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลครบถ้วน";
				echo "</div>";
			}
		}
	?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชื่อโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_name_th" value="<?php echo $school['school_name_th']; ?>" maxlength="100" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสโรงเรียน
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" placeholder="" name="school_id" maxlength="100" value="<?php echo $value_data['school_id']; ?>" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสบุคลากร
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $value_data['personnel_id']; ?>" placeholder="" name="personnel_id" maxlength="20" OnKeyPress="return chkNumber(this)" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ประเภทบุคลากร
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="type_personnel">
			<option value="เลือก">-- เลือก --</option>
			<option value="ผู้บริหาร" <?php if($value_data['type_personnel'] == "ผู้บริหาร" || $_COOKIE['type_personnel'] == "ผู้บริหาร"){ echo "selected"; } ?>>ผู้บริหาร</option>
			<option value="ครู" <?php if($value_data['type_personnel'] == "ครู" || $_COOKIE['type_personnel'] == "ครู"){ echo "selected"; } ?>>ครูอัตราจ้าง</option>
			<option value="บุคคลภายนอกที่ไม่ใช่ครู" <?php if($value_data['type_personnel'] == "บุคคลภายนอกที่ไม่ใช่ครู" || $_COOKIE['type_personnel'] == "บุคคลภายนอกที่ไม่ใช่ครู"){ echo "selected"; } ?>>บุคคลภายนอกที่ไม่ใช่ครู</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $type_personnel_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">รหัสตำแหน่ง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $value_data['position_id']; ?>" placeholder="" name="position_id" maxlength="20" OnKeyPress="return chkNumber(this)" readonly>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input" id="tam">
		<label class="col-md-3 control-label raya" for="form_control_1">ตำแหน่ง
        	<span class="required">*</span>
        </label>
	<div class="col-md-9">
		<select class="form-control" name="position" id="position">
			<option value="เลือก">-- เลือก --</option>
			<option value="ผู้อำนวยการ" <?php if($value_data['position'] == "ผู้อำนวยการ" || $_COOKIE['position'] == "ผู้อำนวยการ"){ echo "selected"; } ?>>ผู้อำนวยการ</option>
			<option value="รองผู้อำนวยการ" <?php if($value_data['position'] == "รองผู้อำนวยการ" || $_COOKIE['position'] == "รองผู้อำนวยการ"){ echo "selected"; } ?>>รองผู้อำนวยการ</option>
            <option value="ธุรการ" <?php if($value_data['position'] == "ธุรการ" || $_COOKIE['position'] == "ธุรการ"){ echo "selected"; } ?>>ธุรการ</option>
			<option value="หัวหน้า" <?php if($value_data['position'] == "หัวหน้า" || $_COOKIE['position'] == "หัวหน้า"){ echo "selected"; } ?>>หัวหน้า</option>
            <option value="ครู" <?php if($value_data['position'] == "ครู" || $_COOKIE['position'] == "ครู"){ echo "selected"; } ?>>ครู</option>
			<option value="อื่นๆ" <?php if($value_data['position'] == "อื่นๆ" || $_COOKIE['position'] == "อื่นๆ"){ echo "selected"; } ?>>อื่นๆ</option>
		</select>
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $position_validation . "</span>"; ?>
	</div>
	</div>
	<div class="form-group form-md-line-input" id="o">
			<label class="col-md-3 control-label raya" for="form_control_1">อื่นๆ
				<span class="required">*</span>
			</label>
			<div class="col-md-9">
				<input type="text" class="form-control maxlength_defaultconfig" value="<?php echo $_COOKIE['position_o']; ?>" placeholder="ระบุตำแหน่งอื่นๆ" name="position_o" maxlength="20">
				<div class="form-control-focus"> </div>
			</div>
		</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">วิทยฐานะ
        </label>
	<div class="col-md-9">
		<select class="form-control" name="academic_standing">
			<option value="">-- เลือก --</option>
			<option value="ผู้ช่วย" <?php if($value_data['academic_standing'] == "ผู้ช่วย" || $_COOKIE['academic_standing'] == "ผู้ช่วย"){ echo "selected"; } ?>>ผู้ช่วย</option>
			<option value="ผู้ชำนาญ" <?php if($value_data['academic_standing'] == "ผู้ชำนาญ" || $_COOKIE['academic_standing'] == "ผู้ชำนาญ"){ echo "selected"; } ?>>ผู้ชำนาญ</option>
			<option value="ผู้ชำนาญพิเศษ" <?php if($value_data['academic_standing'] == "ผู้ชำนาญพิเศษ" || $_COOKIE['academic_standing'] == "ผู้ชำนาญพิเศษ"){ echo "selected"; } ?>>ผู้ชำนาญพิเศษ</option>
            <option value="ผู้เชี่ยวชาญพิเศษ" <?php if($value_data['academic_standing'] == "ผู้เชี่ยวชาญพิเศษ" || $_COOKIE['academic_standing'] == "ผู้เชี่ยวชาญพิเศษ"){ echo "selected"; } ?>>ผู้เชี่ยวชาญพิเศษ</option>
		</select>
	<div class="form-control-focus"> </div>
	</div>
	</div>
	<div id="class">
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">ชั้น
        </label>
	<div class="col-md-9">
		<select class="form-control" name="class">
        	<option value="">-- เลือก --</option>
        <?php
			$sql = "SELECT DISTINCT(class) FROM room WHERE school_id = '$_SESSION[school_id]'";
			$result = mysqli_query($link, $sql);
			while($data = mysqli_fetch_array($result)){
				echo "<option value='$data[class]' ";
				if($value_data['class'] == $data['class']){
					echo "selected";
				}
				echo ">$data[class]</option>";
			}
        ?>
		</select>
	<div class="form-control-focus"> </div>
	</div>
	</div>
    <div class="form-group form-md-line-input" id="room">
		<label class="col-md-3 control-label raya" for="form_control_1">ห้อง
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['room']; } else { echo $value_data['room']; } ?>" placeholder="" name="room" maxlength="3" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $room_validation . "</span>"; ?>
	</div>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">เงินเดือน
			<span class="required">*</span>
		</label>
	<div class="col-md-9">
		<input type="text" class="form-control maxlength_defaultconfig" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['salary']; } else { echo $value_data['salary']; } ?>" placeholder="" name="salary" maxlength="20" OnKeyPress="return chkNumber(this)">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $salary_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
    	<label class="col-md-3 control-label">วัน/เดือน/ปี
        	<small>(ที่บรรจุ)</small>
        </label>
    <div class="col-md-9">
    <div class="input-group date date-picker" data-date="<?php if(isset($_POST['general'])){ echo $_COOKIE['position_at']; } else { echo $value_data['position_at']; } ?>" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    	<span class="input-group-btn">
    		<button class="btn default" type="button">
    			<i class="fa fa-calendar"></i>
    		</button>
    	</span>
    	<input name="position_at" type="text" value="<?php if(isset($_POST['general'])){ echo $_COOKIE['position_at']; } else { echo $value_data['position_at']; } ?>" class="form-control" readonly>
    </div>
    	<span class="help-block"> เลือกวัน/เดือน/ปี </span>
    </div>
    </div>
	</div>
</div>
</div>
<!-- END TAB 2 -->
<!-- BEGIN TAB 3 -->
<div class="tab-pane" id="tab_1_3">
<div class="portlet-title">
<div class="caption">
	<i class=" icon-layers font-green"></i>
	<span class="caption-subject font-green sbold uppercase">กำหนด Username - บุคลากร</span>
</div>
</div>
<div class="portlet-body">
	<div class="form-body">
    <?php
		//เช็คเงื่อนไขเมื่อค่าตัวแปรนี้มีอยู่จริง
		if (isset($general)) {
			//ตรวจสอบความถูกต้องทั้งหมด
			if ($validation_password == FALSE || $validation_current_password == FALSE || $validation_retype_password == FALSE) {
				echo "<div class='alert alert-danger'>";
				echo "<button class='close' data-close='alert'></button>";
				echo "<ul>เกิดข้อผิดผลาด";
				echo $form3;
				echo "</ul>";
				echo "</div>";
			} else if ($validation_password == TRUE && $validation_current_password == TRUE && $validation_retype_password == TRUE) {
				
				//แสดงข้อความเมื่อถูกบันทึก
				echo "<div class='alert alert-success'>";
				echo "<button class='close' data-close='alert'></button> ";
				echo "ข้อมูลถูกบันทึกแล้ว";
				echo "</div>";
			} else {
				if(!$_COOKIE['password'] == "" && !$_COOKIE['retype_password'] == "" && !$_COOKIE['current_password'] == ""){
					//แสดงข้อความเมื่อถูกบันทึก
					echo "<div class='alert alert-success'>";
					echo "<button class='close' data-close='alert'></button> ";
					echo "ข้อมูลครบถ้วน";
					echo "</div>";
				}
			}
		}
	?> 
	<div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">Current Password
		</label>
	<div class="col-md-9">
		<input type="password" class="form-control maxlength_defaultconfig" placeholder="" name="current_password" value="<?php echo $_COOKIE['current_password']; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $current_password_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">Password New
		</label>
	<div class="col-md-9">
		<input type="password" class="form-control maxlength_defaultconfig" placeholder="" name="password" value="<?php if($_COOKIE['password'] == $login_data['password']){ echo ""; } else { echo $_COOKIE['password']; } ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $password_validation . "</span>"; ?>
	</div>
	</div>
    <div class="form-group form-md-line-input">
		<label class="col-md-3 control-label raya" for="form_control_1">Re-Type New Password
		</label>
	<div class="col-md-9">
		<input type="password" class="form-control maxlength_defaultconfig" placeholder="" name="retype_password" value="<?php echo $_COOKIE['retype_password']; ?>" maxlength="50">
	<div class="form-control-focus"> </div>
    <?php echo "<span class=font-size-color>" . $retype_password_validation . "</span>"; ?>
	</div>
	</div>
	</div>   
    <div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
	</div>
	</div>
	</div>                                          
</div>
</div>
<!-- END TAB 3 -->

<!-- BEGIN TAB 4 -->
<div class="tab-pane" id="tab_1_4">
<div class="portlet-body">   
    <div class="form-actions">
	<div class="row">
	<div class="col-md-offset-3 col-md-9">
    	<button type="submit" name="general" class="btn btn-lg blue">ปรับปรุงข้อมูล</button>
		<button type="reset" class="btn btn-lg red">ยกเลิก</button>
	</div>
	</div>
	</div>
    </form>
<!-- END FORM-->                                             
</div>
</div>
<!-- END TAB 4 -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
	mysqli_close($link);
?>
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner"> 2016 &copy; Metronic Theme By
		<a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
		<a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END BEGIN FOOTER -->
<!-- END CONTENT -->
<!-- SCRIPT FOOTER -->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script>
var ComponentsBootstrapMaxlength=function(){var a=function(){$(".maxlength_defaultconfig").maxlength({limitReachedClass:"label label-danger"}),$("#maxlength_thresholdconfig").maxlength({limitReachedClass:"label label-danger",threshold:20}),$("#maxlength_alloptions").maxlength({alwaysShow:!0,warningClass:"label label-success",limitReachedClass:"label label-danger",separator:" out of ",preText:"You typed ",postText:" chars available.",validate:!0}),$("#maxlength_textarea").maxlength({limitReachedClass:"label label-danger",alwaysShow:!0}),$(".maxlength_placement").maxlength({limitReachedClass:"label label-danger",alwaysShow:!0,placement:App.isRTL()?"top-right":"top-left"})};return{init:function(){a()}}}();jQuery(document).ready(function(){ComponentsBootstrapMaxlength.init()});
</script>
<!-- <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script> -->
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- SCRIPT FOOTER -->
<?php include('template_3.php'); ?>