<?php include_once "cek_session.php"; include_once "views/main.php"; ?>
<?php
$idrombelee = $_SESSION['idrombel'];
?>
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Ganti Password
    </ol>
    <div class="my-3 my-md-5">
      <div class="container">
		<form class="form-horizontal" method="POST" action="">
			<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Ganti Password</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>Username</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input name="username" type="text" class="form-control" value="<?php echo $_SESSION['username'] ?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<input name="password" type="text" class="form-control" onkeypress=""/>
									</div>
								</div>
									<div class="modal-footer">
									<button class="btn btn-success" type="submit" name="simpan" value="simpan">
										Simpan
									</button>
								  </div>
								</div>
						  </div>
						</div>
                </div>
            </form>
      </div>
    </div>
   </div>
  
 <?php
if(isset($_POST['simpan'])){
	echo $user       = $_POST['username'];
	echo $psd        = md5($_POST['password']);
	
	$input=mysqli_query($connect,"UPDATE tb_pengguna SET 
    pengguna_password = '$psd'
    WHERE pengguna_username ='$user'"); 
	
	 echo "<script>alert('Password Berhasil Dirubah') </script>";
	echo "<script>window.location='ubah_password.php';</script>";
}
?>