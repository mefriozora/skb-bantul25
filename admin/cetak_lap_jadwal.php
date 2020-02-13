<?php include "../config/connection.php"; ?>
		<div class="card">
        <div class="card-header">
                    <h3 class="card-title"><center>Jadwal Per Mata Pelajaran</center></h3>
          </div>
          <div class="table-responsive">
			<table border="1px" width="100%" style="border-collapse: collapse;" class="table card-table table-vcenter text-nowrap datatable" >
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
                $kelas = @$_GET['kelas'];
			$ta = @$_GET['ta'];
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
          </div>
        </div>

<script>
	window.print();
</script>