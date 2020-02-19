<?php include_once "cek_session.php"; include_once "views/main.php"; ?>
<?php
$idrombelee = $_SESSION['idrombel'];
if(isset($_GET['cari'])){
?>
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Naik Kelas</li>
    </ol>
    <div class="my-3 my-md-5">
      <div class="container">
		<form class="form-horizontal" method="GET" action="">
			<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Pilih Kelas</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>Kelas Sebelumnya</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="kelas_s" id="nomer" class="form-control">
											<option selected value="">-Pilih Kelas-</option>
											<?php
											if ($idrombelee == '0') {
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')");
											} else {
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$idrombelee'");
											}
											$cek1 = mysqli_num_rows($sql1);
											if ($cek1 > 0) {
												while ($data1 = mysqli_fetch_array($sql1)) {
											?>
													<option value="<?php echo $data1['rombel_id'] ?>">
														<?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
											<?php }
											} ?>

										</select>
									</div>
									</div>
									<div class="form-group">
									<label>Naik Ke Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="kelas_l" id="nomer" class="form-control">
											<option selected value="">-Pilih Kelas-</option>
											<?php
											if ($idrombelee == '0') {
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')");
											} else {
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$idrombelee'");
											}
											$cek1 = mysqli_num_rows($sql1);
											if ($cek1 > 0) {
												while ($data1 = mysqli_fetch_array($sql1)) {
											?>
													<option value="<?php echo $data1['rombel_id'] ?>">
														<?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
											<?php }
											} ?>

										</select>
									</div>
								</div>
									<div class="modal-footer">
									<button class="btn btn-success" type="submit" name="proses" value="proses">
										Cari
									</button>
									<button class="btn btn-danger" name="reset" value="Refres">
										  Batal
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
}
if(isset($_GET['proses'])){
?>
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Naik Kelas</li>
    </ol>
    <div class="my-3 my-md-5">
      <div class="container">
		<form class="form-horizontal" method="GET" action="">
			<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Pilih Kelas</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>Kelas Sebelumnya</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="kelas_s" id="nomer" class="form-control">
											<?php
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$_GET[kelas_s]'");
											$data1 = mysqli_fetch_array($sql1);
											?>
													<option value="<?php echo $data1['rombel_id'] ?>">
														<?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
											

										</select>
									</div>
									</div>
									<div class="form-group">
									<label>Naik Ke Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="kelas_l" id="nomer" class="form-control">
											<?php
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$_GET[kelas_l]'");
												$data1 = mysqli_fetch_array($sql1);
											?>
													<option value="<?php echo $data1['rombel_id'] ?>">
														<?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
											
										</select>
									</div>
								</div>
									<div class="modal-footer">
									<button class="btn btn-success" type="submit" name="tampilkan" value="tampilkan">
										Proses
									</button>
									<button class="btn btn-danger" name="reset" value="Refres">
										  Batal
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
   

    <div class="my-12 my-md-12">
      <div class="container">
		<form class="form-horizontal" method="GET" action="">
			<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Kelas Sebelum</h3>
							</div>
							     <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th class="w-2">No.</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
													<th>Kelas</th>
                                                    <th>Tahun Ajaran</th>
													<th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = mysqli_query($connect, "select * from tb_rombel_siswa 
												inner join tb_siswa on tb_rombel_siswa.nis = tb_siswa.nis 
												inner join tb_rombel on tb_rombel_siswa.rombel_id = tb_rombel.rombel_id 
												inner join tb_kelas on tb_rombel.kelas_id = tb_kelas.kelas_id 
												inner join tb_tahunajaran on tb_rombel.ta_id = tb_tahunajaran.ta_id where tb_rombel_siswa.rombel_id = '$_GET[kelas_s]'");
                                                $cek = mysqli_num_rows($sql);
                                                if ($cek > 0) {
                                                    while ($data = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                        <tr>
                                                            <td><span class="text-muted"><?php echo $no; ?></span></td>
                                                            <td align="center"><?php echo $data['nis'] ?></td>
                                                            <td><?php echo $data['nama_siswa'] ?></td>
                                                            <td><?php echo $data['kelas_nama'] ?></td>
															<td><?php echo $data['ta_nama'] ?></td>
															<td>
															<?php
															//cek nilai
															$qnilai	= mysqli_query($connect,"SELECT * from tb_nilai where nis = '$data[nis]' 
															and rombel_id = '$data[rombel_id]' and naik_kelas = 'Tidak Lulus'");
															$nilai 	= mysqli_fetch_array($qnilai);
															//cek nilai
															if (empty($nilai)) {
																echo $keterangan = 'Lulus';
															}else{
																echo $keterangan = 'Tidak Lulus';
															}
															
															
															?>
															</td>
                                                        </tr>
                                                <?php $no++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>

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
            </form>
      </div>
    </div>
<?php 
}
if(isset($_GET['tampilkan'])){
?>
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Naik Kelas</li>
    </ol>
    <div class="my-3 my-md-5">
      <div class="container">
		<form class="form-horizontal" method="GET" action="">
			<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Pilih Kelas</h3>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label>Kelas Sebelumnya</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="kelas_s" id="nomer" class="form-control">
											<?php
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$_GET[kelas_s]'");
												$data1 = mysqli_fetch_array($sql1);
											?>
													<option value="<?php echo $data1['rombel_id'] ?>">
														<?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
											

										</select>
									</div>
									</div>
									<div class="form-group">
									<label>Naik Ke Kelas</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-o"></i>
										</div>
										<select name="kelas_l" id="nomer" class="form-control">
											<?php
												$sql1 = mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='$_GET[kelas_l]'");
												$data1 = mysqli_fetch_array($sql1);
											?>
													<option value="<?php echo $data1['rombel_id'] ?>">
														<?php echo $data1['kelas_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['paket_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['ta_nama'] ?>,&nbsp&nbsp&nbsp&nbsp<?php echo $data1['pamong_nama'] ?></option>
											
										</select>
									</div>
								</div>
									<div class="modal-footer">
								  </div>
								</div>
						  </div>
						</div>
                </div>
            </form>
      </div>
    </div>
   </div>
   

    <div class="my-12 my-md-12">
      <div class="container">
		<form class="form-horizontal" method="GET" action="">
			<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Naik Kelas</h3>
							</div>
							     <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap datatable">
                                            <thead>
                                                <tr>
                                                    <th class="w-2">No.</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
													<th>Kelas</th>
                                                    <th>Tahun Ajaran</th>
													<th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
												//proses insert
												$no = 1;
                                                $q_rombel = mysqli_query($connect, "select * from tb_rombel_siswa 
												where rombel_id = '$_GET[kelas_s]'");
												while ($rombel = mysqli_fetch_array($q_rombel)){
												
													//cek siswa didalam rombel kelas selanjutnya
													$q_cek_rombel_siswa = mysqli_query($connect, "select * from tb_rombel_siswa 
													where rombel_id = '$_GET[kelas_l]' and nis = '$rombel[nis]'");
													$cek_rombel_siswa 	= mysqli_fetch_array($q_cek_rombel_siswa);
													//jika tidak ada, masukan kedalam rombel siswa
													if (empty($cek_rombel_siswa)){
														//cek nilai siswa
														$q_cek_nilai = mysqli_query($connect, "select * from tb_nilai 
														where rombel_id = '$_GET[kelas_s]' and nis = '$rombel[nis]' and naik_kelas = 'Tidak Lulus'");
														$cek_nilai 	= mysqli_fetch_array($q_cek_nilai);
														//jika tidak ada nilai yang tidak lulus, maka naik kelas
														if (empty($cek_nilai)){
															mysqli_query($connect,"INSERT into tb_rombel_siswa(rombel_id,nis)values('$_GET[kelas_l]','$rombel[nis]')");
														}
													}
												}
												
												
												//proses tampilkan
                                                $no = 1;
                                                $sql = mysqli_query($connect, "select * from tb_rombel_siswa 
												inner join tb_siswa on tb_rombel_siswa.nis = tb_siswa.nis 
												inner join tb_rombel on tb_rombel_siswa.rombel_id = tb_rombel.rombel_id 
												inner join tb_kelas on tb_rombel.kelas_id = tb_kelas.kelas_id 
												inner join tb_tahunajaran on tb_rombel.ta_id = tb_tahunajaran.ta_id where tb_rombel_siswa.rombel_id = '$_GET[kelas_l]'");
                                                $cek = mysqli_num_rows($sql);
                                                if ($cek > 0) {
                                                    while ($data = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                        <tr>
                                                            <td><span class="text-muted"><?php echo $no; ?></span></td>
                                                            <td align="center"><?php echo $data['nis'] ?></td>
                                                            <td><?php echo $data['nama_siswa'] ?></td>
                                                            <td><?php echo $data['kelas_nama'] ?></td>
															<td><?php echo $data['ta_nama'] ?></td>
															<td>
															<?php
															//cek nilai
															$qnilai	= mysqli_query($connect,"SELECT * from tb_nilai where nis = '$data[nis]' 
															and rombel_id = '$data[rombel_id]' and naik_kelas = 'Tidak Lulus'");
															$nilai 	= mysqli_fetch_array($qnilai);
															//cek nilai
															if (empty($nilai)) {
																echo $keterangan = 'Lulus';
															}else{
																echo $keterangan = 'Tidak Lulus';
															}
															
															
															?>
															</td>
                                                        </tr>
                                                <?php $no++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>

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
            </form>
      </div>
    </div>
<?php 
}
?>