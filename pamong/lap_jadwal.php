<?php include_once "cek_session.php"; include_once "views/main.php";?>

<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> Laporan Jadwal</li>
          </ol>
      <div class="">
        <div class="card">
        <div class="card-header">
			<h3 class="card-title">Laporan Jadwal</h3>
		</div>
		<div class="card-body">
			<form method="POST">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group" >
						<label>Pilih Tahun Ajaran</label>
						  <div class="input-group">
							<div class="input-group-addon">
							  <i class="fa fa-user-o"></i>
							</div>
							<select class="form-control" name="ta" id="filter">
								<option value="">-Pilih Tahun Ajaran-</option>
							 <?php
							 $ta = mysqli_query($connect, "SELECT * FROM tb_tahunajaran ORDER BY ta_id ASC");
							 while($data_ta=mysqli_fetch_array($ta)){
							 ?>
							  <option value="<?php echo $data_ta['ta_id']; ?>"><?php echo $data_ta['ta_nama']; ?></option>
							 <?php } ?>
							</select>
						  </div>
					  </div>
					 </div>
					 <div class="col-lg-6">
						<div class="form-group" >
							<label>Pilih Kelas</label>
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
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_jadwal.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
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
                    <h3 class="card-title">Jadwal Per Mata Pelajaran</h3>
          </div>
          <div class="table-responsive">
			<a class="btn btn-primary" href="cetak_lap_jadwal.php?kelas=<?php echo $_POST['kelas']; ?>&ta=<?php echo $_POST['ta']; ?>" style="margin-left: 20px; margin-top:10px;">Cetak</a>
            <table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th rowspan="2"><center>No</center></th>
                    <th rowspan="2"><center>Mata Pelajaran</center></th>
                    <th rowspan="2"><center>Hari</center></th>
                    <th colspan="2"><center>Jam Belajar</center></th>
                 </tr>
                 <tr>
                    <th><center>Mulai</center></th>
                    <th><center>Selesai</center></th>
                  </tr>

              </thead>
              <tbody>
             <?php 
                $no=1;
                $kelas = @$_POST['kelas'];
			$ta = @$_POST['ta'];
			$jadwal = mysqli_query($connect, "SELECT m.mapel_nama, j.* FROM tb_jadwal j JOIN tb_rombel r ON j.rombel_id=r.rombel_id JOIN tb_mapel m ON j.mapel_id=m.mapel_id WHERE r.kelas_id='$kelas' AND r.ta_id='$ta' ");
			while($data_jadwal = mysqli_fetch_array($jadwal)){
              ?>
                <tr>
                  <td align="center"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center"><?php echo $data_jadwal['mapel_nama'] ?></td>
                  <td align="center">
                  	<select name="hari[]" disabled>
                            <option value="<?php echo $data_jadwal['jadwal_hari'] ?>"><?php if(empty($data_jadwal['jadwal_hari'])){ echo "-"; }else{ echo $data_jadwal['jadwal_hari']; } ?></option>
                          </select>
                  </td>
                  <td align="center">
                    <select name="jamm[]" disabled>
                            <option value="<?php echo $data_jadwal['jadwal_jammulai'] ?>"><?php if(empty($data_jadwal['jadwal_jammulai'])){ echo "-"; }else{ echo $data_jadwal['jadwal_jammulai']; } ?></option>
                          </select>
                  </td>
                  <td align="center">
                  	<select name="jams[]" disabled>
                            <option value="<?php echo $data_jadwal['jadwal_jamselesai'] ?>"><?php if(empty($data_jadwal['jadwal_jamselesai'])){ echo "-"; }else{ echo $data_jadwal['jadwal_jamselesai']; } ?></option>
                          </select>
                  </td>
                </tr>
          <?php $no++;} ?>
              </tbody>
            </table>

            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>
          </div>
        </div>		
		<?php
		}
		?>
      </div>
    </div>
  </div>