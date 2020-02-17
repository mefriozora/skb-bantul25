<?php include_once "cek_session.php"; include_once "views/main.php";?>
<?php 
	include '../config/connection.php';
?>
<div class="my-md-1">
          <div class="container">
		  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Laporan Pendaftaran</li>
          </ol>
          <div class="">
        <div class="card">
        <div class="card-header">
			<h3 class="card-title">Filter Laporan Pendaftaran</h3>
		</div>
		<div class="card-body">
			<form method="POST">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group" >
						<label>Tahun</label>
						  <div class="input-group">
							<div class="input-group-addon">
							  <i class="fa fa-user-o"></i>
							</div>
							<select class="form-control" name="ta" id="filter">
								<option>--Pilih Tahun--</option>
                       <?php
                          $now=date('Y');
                          	for ($a=$now;$a>=2016;$a--) { 
                        ?>
                        <?php if (empty($_GET['ta'])) {
                        ?>
                        <option value="<?php echo $a?>"><?php echo $a?> 
                        <?php
                          } else {
                          $thn = $_GET['ta'];
                            if ($thn == $a) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>          
                          <option value="<?php echo $a?>"<?php echo $selected?>><?php echo $a?>
                          <?php }?>
                        <?php }  ?>
							</select>
						  </div>
					  </div>
					 </div>
           <div class="col-lg-4">
					<div class="form-group" >
						<label>Paket</label>
						  <div class="input-group">
							<div class="input-group-addon">
							  <i class="fa fa-user-o"></i>
							</div>
							<select class="form-control" name="paket" id="filter">
								<option value="">-Pilih Paket-</option>
							 <?php
							 $paket = mysqli_query($connect, "SELECT * FROM tb_paket ORDER BY paket_id ASC");
							 while($data_paket=mysqli_fetch_array($paket)){
							 ?>
							  <option value="<?php echo $data_paket['paket_id']; ?>"><?php echo $data_paket['paket_nama']; ?></option>
							 <?php } ?>
							</select>
						  </div>
					  </div>
					 </div>
					 <div class="col-lg-4">
						<div class="form-group" >
							<label>Kelas</label>
							  <div class="input-group">
								<div class="input-group-addon">
								  <i class="fa fa-user-o"></i>
								</div>
								<select class="form-control" name="kelas" id="filter">
									<option value="">-Pilih Kelas-</option>
								 <?php
								 $kelas = mysqli_query($connect, "SELECT * FROM tb_kelas ORDER BY kelas_id ASC");
								 while($data_kelas=mysqli_fetch_array($kelas)){
								 ?>
								  <option value="<?php echo $data_kelas['kelas_id']; ?>"><?php echo $data_kelas['kelas_nama']; ?></option>
								 <?php } ?>
								</select>
							  </div>
						  </div>
						 </div>
						</div>
						<div class="form-group row text-left">
                  <div class="col-lg-12">
                     <button class="btn btn-xs btn-primary" name="cari"/><i class="fa fa-search"></i> Tampilkan </button>
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_pendaftar.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
                  </div>
            </div>
			</form>
		</div>
  </div>
  	<?php
	    if(isset($_REQUEST['cari'])){
	?>
	<div class="card">
        <div class="card-header">
            <h3 class="card-title">Laporan Pendaftaran</h3>
        </div>
     	<div class="table-responsive">
			<a class="btn btn-primary" href="cetak_lap_pendaftaran.php?ta=<?php echo $_POST['ta']; ?>&paket=<?php echo $_POST['paket']; ?>&kelas=<?php echo $_POST['kelas'];?>" style="margin-left: 20px; margin-top:10px;">Cetak</a>
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
              	<tr>
              		<th class="w-1">No.</th>
					<th>Status Pendaftar</th>
					<th>No. Pendaftaran</th>
					<th>Tanggal Pendaftaran</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat Pendaftar</th>
                    <th>Nomor HP</th>
					<th>Asal Sekolah</th>
					<th>Paket Kesetaraan</th>
					<th>Kelas Kesetaraan</th>
					<th>Putus Sekolah Kelas</th>
					<th>Putus Sekolah Semester</th>
					<th>Nama Ayah</th>
					<th>Nama Ibu</th>
					<th>Pekerjaan Ayah</th>
					<th>Pekerjaan Ibu</th>
					<th>Alamat Ortu</th>
					<th>No. HP Ortu/Wali</th>
              	</tr>
              </thead>
               <tbody>
             <?php 
                $no=1;
                $kelas = @$_POST['kelas'];
				$ta = @$_POST['ta'];
				$paket = @$_POST['paket'];
			$pendaftar = mysqli_query($connect, "SELECT * FROM tb_pendaftar WHERE status_pendaftar='Diterima'");
			while($data_pendaftar = mysqli_fetch_array($pendaftar)){
              ?>
                <tr>
                  <td align="center"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center"><?php echo $data_pendaftar['status_pendaftar'] ?></td>
                  <td align="center"><?php echo $data_pendaftar['no_pendaftar'] ?></td>
                  <td align="center"><?php echo $data_pendaftar['tgl_pendaftaran'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['nama'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['tempat_lhr']?> , <?php echo date("d F Y", strtotime($data_pendaftar['tanggal_lhr'])); ?></td>
                  <td align="justify"><?php echo $data_pendaftar['agama'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['jenkel'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['alamat_domisili'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['no_hp'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['asal_sekolah'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['paket_kesetaraan'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['kelas_kesetaraan'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['putus_sekolah_kelas'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['putus_sekolah_semester'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['nama_ayah'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['nama_ibu'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['pekerjaan_ayah'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['pekerjaan_ibu'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['alamat_ortu'] ?></td>
                  <td align="justify"><?php echo $data_pendaftar['no_hp_ortuwali'] ?></td>
                  
                  
                </tr>
          <?php $no++;}} ?>
              </tbody>
        <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>
           
          </div>
        </div>
		
      </div>
    </div>
  </div>
  </body>
</html>