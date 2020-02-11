<?php include_once "cek_session.php"; include_once "views/main.php";?>

<div class="my-3 my-md-1">
  <div class="container">
  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"> Laporan Nilai</li>
          </ol>
      <div class="">
        <div class="card">
        <div class="card-header">
			<h3 class="card-title">Laporan Nilai</h3>
		</div>
		<div class="card-body">
			<form method="POST">
			<div class="row">
				<div class="col-lg-3">
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
				<div class="col-lg-3">
					<div class="form-group" >
						<label>Pilih Semester</label>
						  <div class="input-group">
							<div class="input-group-addon">
							  <i class="fa fa-user-o"></i>
							</div>
							<select class="form-control" name="semester" id="filter">
								<option value="">-Pilih Semester-</option>
							 <?php
							 $semester = mysqli_query($connect, "SELECT * FROM tb_semester ORDER BY semester_id ASC");
							 while($data_semester=mysqli_fetch_array($semester)){
							 ?>
							  <option value="<?php echo $data_semester['semester_id']; ?>"><?php echo $data_semester['semester']; ?></option>
							 <?php } ?>
							</select>
						  </div>
					  </div>
					 </div>
					 <div class="col-lg-3">
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
					 <div class="col-lg-3">
						<div class="form-group" >
							<label>Pilih Mapel</label>
							  <div class="input-group">
								<div class="input-group-addon">
								  <i class="fa fa-user-o"></i>
								</div>
								<select class="form-control" name="mapel" id="filter">
									<option value="">-Pilih Mapel-</option>
								 <?php
								 $mapel = mysqli_query($connect, "SELECT * FROM tb_mapel ORDER BY mapel_id ASC");
								 while($data_mapel=mysqli_fetch_array($mapel)){
								 ?>
								  <option value="<?php echo $data_mapel['mapel_id']; ?>"><?php echo $data_mapel['mapel_nama']; ?></option>
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
                    <h3 class="card-title">Nilai Per Mata Pelajaran</h3>
          </div>
          <div class="table-responsive">
            <a class="btn btn-primary" href="cetak_lap_nilai.php?kelas=<?php echo $_POST['kelas']; ?>&ta=<?php echo $_POST['ta']; ?>&semester=<?php echo $_POST['semester']; ?>&mapel=<?php echo $_POST['mapel']; ?>" style="margin-left: 20px; margin-top:10px;">Cetak</a>
			<table border="0px" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>KKM</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai PTS</th>
                    <?php if ($_POST['semester']=="1") {?>
                    <th>Nilai PAS</th>
                    <?php } else {?>
                      <th>Nilai PAT</th>
                    <?php }?>
                    <th>Nilai Akhir</th>
                 </tr>

              </thead>
              <tbody>
             <?php 
                $no=1;
                $kelas = @$_POST['kelas'];
                $semester = @$_POST['semester'];
			$ta = @$_POST['ta'];
			$mapel = @$_POST['mapel'];
			$nilai = mysqli_query($connect, "SELECT n.*, s.nama_siswa, m.mapel_nama, m.mapel_kkm FROM tb_nilai n JOIN tb_siswa s ON n.nis=s.nis JOIN tb_mapel m ON n.mapel_id=m.mapel_id WHERE n.kelas_id='$kelas' AND n.ta_id='$ta' AND n.semester_id='$semester' AND n.mapel_id='$mapel' ");
			while($data_nilai = mysqli_fetch_array($nilai)){
              ?>
                <tr>
		    <td><?php echo $no; ?></td>
		    <td><?php echo $data_nilai['nis']; ?></td>
		    <td><?php echo $data_nilai['nama_siswa']; ?></td>
		    <td><?php echo $data_nilai['mapel_kkm']; ?></td>
		    <td><input disabled type="number" min="0" name="tugas[]" style="width: 50px;" value="<?= $data_nilai['nilai_tugas']?>"  onkeyPress=""></td>
		    <td><input disabled type="number" min="0" name="pts[]"  style="width: 50px;" value="<?= $data_nilai['nilai_pts']?>" onKeyPress=""></td>
		    <td><input disabled type="number" min="0" name="pas[]"  style="width: 50px;" value="<?= $data_nilai['nilai_pas_pat']?>" onKeyPress=""></td>
			<td><?php echo number_format(($data_nilai['nilai_tugas'] + $data_nilai['nilai_pts'] + $data_nilai['nilai_pas_pat'] )/3, 2); ?></td>
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