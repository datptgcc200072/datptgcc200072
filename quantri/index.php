<?php 
session_start();
if(!isset($_SESSION['QuanTri']) or $_SESSION['QuanTri'] != 1)
{
	echo "<script language='javascript'>window.location='../index.php';</script>";
}
//ob_start();
include_once('../connect.php');

?>
<!doctype html>
<html lang="en">
<head>
	<title>Database</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<link rel='stylesheet' href='../sweetalert-master/sweet-alert.css'>
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styletoan.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<script src="../js/jquery.min.js"></script>
	<script src='../sweetalert-master/sweet-alert.min.js'></script>
	<script src='../js/thongbao.js'></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand logo">
				<a href="../index.php" class="Title">
					<img src="../img/logo.png">
				</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<!-- <form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form> -->
				<div class="navbar-btn navbar-btn-right">
					<!-- <a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a> -->
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li> -->
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li> -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/admin.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['TaiKhoan']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="?ID=profile&ma=<?php echo $_SESSION['TaiKhoan'] ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="?ID=dangxuat"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li class="Menu"><a href="?ID=sanpham" class="Menu"><i class="lnr lnr-home"></i> <span>Sản Phẩm</span></a></li>
						<li><a href="?ID=loaisanpham" class="Menu"><i class="lnr lnr-code"></i> <span>Loại Sản Phẩm</span></a></li>
						<li><a href="?ID=nhasanxuat" class="Menu"><i class="lnr lnr-chart-bars"></i> <span>Nhà Sản Xuất</span></a></li>
						<li><a href="?ID=khachhang" class="Menu"><i class="lnr lnr-cog"></i> <span>Khách Hàng</span></a></li>
						<li><a href="?ID=donhang" class="Menu"><i class="lnr lnr-alarm"></i> <span>Đơn Đặt Hàng</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<?php 
					if(isset($_GET['ID']))
					{
						$ID = $_GET['ID'];
						if($ID == 'loaisanpham' )
						{
							include_once('quanly_loaisanpham.php');
						}
						else if($ID == 'loaisanphamthemmoi')
						{
							include_once('quanly_loaisanpham_themmoi.php');
						}
						else if($ID == 'loaisanphamcapnhat')
						{
							include_once('quanly_loaisanpham_capnhat.php');
						}
						else if($ID == 'sanphamcapnhat')
						{
							include_once('quanly_sanpham_capnhat.php');
						} 
						else if($ID == 'sanpham')
						{
							include_once('quanly_sanpham.php');
						}
						else if($ID == 'sanphamthemmoi')
						{
							include_once('quanly_sanpham_themmoi.php');
						}
						else if($ID == 'nhasanxuat')
						{
							include_once('quanly_nhasanxuat.php');
						}
						else if($ID == 'nhasanxuatthemmoi')
						{
							include_once('quanly_nhasanxuat_themmoi.php');
						}
						else if($ID == 'nhasanxuatcapnhat')
						{
							include_once('quanly_nhasanxuat_capnhat.php');
						}
						else if($ID == 'khachhang')
						{
							include_once('quanly_khachhang.php');
						}
						else if($ID == 'khachhangcapnhat')
						{
							include_once('quanly_khachhang_capnhat.php');
						}
						else if($ID == 'profile')
						{
							include_once('myprofile.php');
						}
						else if($ID == 'donhang')
						{
							include_once('donhang.php');
						}
						else if($ID == 'sanphamnhap')
						{
							include_once('quanly_sanpham_nhap.php');
						}
						else if($ID == 'capnhatkhachhang')
						{
							include_once('../capnhatkhachhang.php');
						}
						else if($ID == 'doimatkhau')
						{
							include_once('../doimatkhau.php');
						}
						else if($ID == 'quanly_xoanhieu_SP')
						{
							include_once('quanly_xoanhieu_SP.php');
						}
						else if($ID == 'quanly_xoanhieu_LSP')
						{
							include_once('quanly_xoanhieu_LSP.php');
						}
						else if($ID == 'quanly_xoanhieu_NSX')
						{
							include_once('quanly_xoanhieu_NSX.php');
						}
						else if($ID == 'sp_dondathang')
						{
							include_once('sp_dondathang.php');
						}
						else if($ID == 'dangxuat')
						{
							session_destroy();
							echo "<script>window.location='../index.php';</script>";
						}
					}
					else
					{
						include_once('quanly_sanpham.php');
					}
					//ob_end_flush();
					?>
				</div>
			</div>
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script type="text/javascript" src="../js/indexjs.js"></script>
</body>

</html>
