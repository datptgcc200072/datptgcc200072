<?php
error_reporting (E_ALL ^ E_NOTICE);
if(isset($_SESSION['TaiKhoan']))
{
	echo "<script language='javascript'>window.location='index.php';</script>";
}
if(isset($_POST['btnLogin']))
{
	include_once('connect.php');
	$Username =  trim($_POST['txtTenDangNhap']);
	$Password = trim($_POST['txtMatKhau']);
	$loi = "";
	if($Username=="")
	{
		$loi.="<p class='loi'>Vui lòng nhập tên đăng nhập</p>";
	}
	if($Password=="")
	{
		$loi.="<p class='loi'>Vui lòng nhập mật khẩu</p>";
	}
	if($loi!="")
	{
		echo $loi;
	}
	else
	{
		$Username = pg_real_escape_string($Connect, $Username);
		$Password = md5($Password);
		$result = pg_query($Connect,"SELECT * FROM khachhang WHERE KH_User='$Username' AND KH_Password='$Password' AND KH_TrangThai = 1") or die(pg_error($Connect));
		if(pg_num_rows($result)==1)
		{
			echo "<script>setTimeout(function(){showSwalLogin('$Username');},100);</script>";
			$row = pg_fetch_array($result, pg_ASSOC);
			$_SESSION['TaiKhoan'] = $Username;
			$_SESSION['QuanTri'] = $row['KH_QuanTri'];
		}
		else if(pg_num_rows($result)==0)
		{
			echo "<script>setTimeout(function(){showSwalLoginError();},100);</script>";
		}
	}
}
?>
<div class="DangNhap">
	<h1 class="text-center">Đăng nhập</h1>
	<form id="form1" name="form1" method="POST" action="">
		<div class="row">
			<div class="form-group">

				<label for="txtTenDangNhap" class="col-sm-4 control-label text-right tk">Tài khoản(*):  </label>
				<div class="col-sm-8">
					<input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control" placeholder="Tên đăng nhập" value=""/>
				</div>
			</div>  
		</div>
		<div class="row">
			<div class="form-group">
				<label for="txtMatKhau" class="col-sm-4 control-label text-right tk">Mật khẩu(*):  </label>
				<div class="col-sm-8">
					<input type="password" name="txtMatKhau" id="txtMatKhau" class="form-control" placeholder="Mật khẩu" value=""/>
				</div>
			</div> 
		</div>
		<div class="row">
			<div class="col-sm-12 text-center Nut">
				<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Đăng nhập"/>
				<label><input name="chkRemember" type="checkbox" id="chkRemember" value="1" class="checkbox-inline" /> Ghi nhớ đăng nhập</label>
			</div>
		</div>
	</form>
</div>
