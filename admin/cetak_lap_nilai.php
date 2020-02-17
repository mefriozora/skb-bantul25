<?php include "../config/connection.php"; ?>
<div class="card">
        <div class="card-header">
          <h2 align="center">
      SANGGAR KEGIATAN BELAJAR (SKB) BANTUL
      <br>
      <small>Jl. Imogiri Barat KM 7, Semail,Bangunharjo,Kec.Sewon,Bantul,Yogyakarta</small>
      <br>
      <small>Kode Pos : 55188, Telepon : (0274) 4396012</small>
      </h2>
      <hr style="color: #000;">
      <br>
            <h3 class="card-title"><center>Nilai Per Mata Pelajaran</center></h3>
          </div>
          <div class="table-responsive">
            <table border="1px" width="100%" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
              <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>KKM</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai PTS</th>
                    <?php if ($_GET['semester']=="1") {?>
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
                $kelas = @$_GET['kelas'];
                $semester = @$_GET['semester'];
			$ta = @$_GET['ta'];
			$mapel = @$_GET['mapel'];
			$nilai = mysqli_query($connect, "SELECT n.*, s.nama_siswa, m.mapel_nama, m.mapel_kkm FROM tb_nilai n JOIN tb_siswa s ON n.nis=s.nis JOIN tb_mapel m ON n.mapel_id=m.mapel_id WHERE n.kelas_id='$kelas' AND n.ta_id='$ta' AND n.semester_id='$semester' AND n.mapel_id='$mapel' ");
			while($data_nilai = mysqli_fetch_array($nilai)){
				if(empty($data_nilai['nilai_tugas'])){ $n_tugas = 0; }else{ $n_tugas = $data_nilai['nilai_tugas']; }
				if(empty($data_nilai['nilai_pts'])){ $n_pts = 0; }else{ $n_pts = $data_nilai['nilai_pts']; }
				if(empty($data_nilai['nilai_pas_pat'])){ $n_pas = 0; }else{ $n_pas = $data_nilai['nilai_pas_pat']; }
              ?>
                <tr>
		    <td><?php echo $no; ?></td>
		    <td><?php echo $data_nilai['nis']; ?></td>
		    <td><?php echo $data_nilai['nama_siswa']; ?></td>
		    <td><?php echo $data_nilai['mapel_kkm']; ?></td>
		    <td><input disabled type="number" min="0" name="tugas[]" style="width: 50px;" value="<?= $data_nilai['nilai_tugas']?>"  onkeyPress=""></td>
		    <td><input disabled type="number" min="0" name="pts[]"  style="width: 50px;" value="<?= $data_nilai['nilai_pts']?>" onKeyPress=""></td>
		    <td><input disabled type="number" min="0" name="pas[]"  style="width: 50px;" value="<?= $data_nilai['nilai_pas_pat']?>" onKeyPress=""></td>
			<td><?php echo number_format(($n_tugas + $n_pts + $n_pas )/3, 2); ?></td>
          <?php $no++;} ?>
              </tbody>
            </table>           
          </div>
        </div>


<script>
	window.print();
</script>