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
            <li class="breadcrumb-item active">Laporan Data Pendaftar</li>
          </ol>
            <div class="page-header">
            	<form action="" method="GET">
            	<div class="form-group" >
                <label>Filter Berdasarkan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select class="form-control" name="filter" id="filter">
                        <option value="">-Pilih Berdasarkan-</option>
                     <?php if ($_GET['filter'] == 1) {
                      ?>
                      <option value="1" selected="true">Per Tahun</option>
                      <?php
                      } else {?>
                      <option value="1">Per Tahun</option>
                      <?php }?>
                    </select>
                  </div>
              </div>
              
              <label>Tahun</label>
              <select class="form-control" name="tahun" id="form-tahun">
                        <option value="">-Pilih Tahun-</option>
                      <?php
                          $now=date('Y');
                            for ($a=$now;$a>=2015;$a--) { 
                        ?>
                        <?php if (empty($_GET['tahun'])) {
                        ?>
                        <option value="<?php echo $a ?>"><?php echo $a ?> 
                        <?php
                          } else {
                          $thn = $_GET['tahun'];
                            if ($thn == $a) {
                              $selected = 'selected';
                            } else {
                              $selected = '';
                            }
                          ?>          
                          <option value="<?php echo $a?>"<?php echo $selected?>><?php echo $a ?>
                          <?php }?>
                        <?php  } ?>
                     </option>
            </select>
           
            </div>

            <div class="form-group row text-left">
                  <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                     <button class="btn btn-xs btn-primary" name="cari"/><i class="fa fa-search"></i> Tampilkan </button>
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_pendaftar.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
                  </div>
            </div>
        </form>
            
              <br>
              
              <div class="">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
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
						  <th>Alamat Sekolah</th>
						  <th>Bertempat Tinggal</th>
						  <th>Nama Ayah</th>
						  <th>Nama Ibu</th>
						  <th>Pekerjaan Ayah</th>
						  <th>Pekerjaan Ibu</th>
						  <th>Alamat Ortu</th>
						  <th>No. HP Ortu/Wali</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php
	$no=1;
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
      $filter = $_GET['filter']; // Ambil data filder yang dipilih user

      if($filter == '1'){ // Jika filter nya 1 (per tanggal)
          $tahun = $_GET['tahun'];
          echo '<b>Laporan Pendaftaran Tahun '.$_GET['tahun'].'</b><br /><br />';
          echo '<a target="_blank" href="print_pendaftaran.php?filter=1&tahun='.$_GET['tahun'].'"">Cetak PDF</a><br /><br />';          

          $VarResult = mysqli_query($connect,"SELECT * FROM tb_pendaftar WHERE YEAR(tgl_pendaftaran)='".$_GET['tahun']."' AND status_pendaftar='Diterima'");// Tampilkan data transaksi sesuai th ajaran yang diinput oleh user pada filter
  }

  }else{ // Jika user tidak mengklik tombol tampilkan
      echo '<b>Semua Laporan Pendaftaran</b><br /><br />';
      echo '<a target="_blank" href="print_pendaftaran.php">Cetak PDF</a><br /><br />';

      $VarResult = mysqli_query($connect,"SELECT * FROM tb_pendaftar WHERE status_pendaftar='Diterima'"); // Tampilkan semua data
  }

                       //cek data
                             $varTotal = mysqli_num_rows($VarResult);
                          // jika data kurang dari 1
                          if ($varTotal>0) { 
                      while($h = mysqli_fetch_array($VarResult)){

                    ?>
                        <tr>
						  <td><?php echo $no;?></td>
                          <td><?php echo $h['status_pendaftar'];?></td>
						  <td><?php echo $h['no_pendaftar'];?></td>
						  <td><?php echo date("d F Y", strtotime($h['tgl_pendaftaran'])); ?></td>
						  <td><?php echo $h['nama'];?></td>
						  <td><?php echo $h['tempat_lhr'] ?> , <?php echo date("d F Y", strtotime($h['tanggal_lhr'])); ?> </td>
						  <td><?php echo $h['agama'];?></td>
						  <td><?php echo $h['jenkel'];?></td>
						  <td><?php echo $h['alamat_domisili'];?></td>
						  <td><?php echo $h['no_hp'];?></td>
						  <td><?php echo $h['asal_sekolah'];?></td>
						  <td><?php echo $h['paket_kesetaraan'];?></td>
						  <td><?php echo $h['kelas_kesetaraan'];?></td>
						  <td><?php echo $h['putus_sekolah_kelas'];?></td>
						  <td><?php echo $h['putus_sekolah_semester'];?></td>
						  <td><?php echo $h['alamat_sekolah'];?></td>
						  <td><?php echo $h['bertempat_tinggal'];?></td>
						  <td><?php echo $h['nama_ayah'];?></td>
						  <td><?php echo $h['nama_ibu'];?></td>
						  <td><?php echo $h['pekerjaan_ayah'];?></td>
						  <td><?php echo $h['pekerjaan_ibu'];?></td>
						  <td><?php echo $h['alamat_ortu'];?></td>
						  <td><?php echo $h['no_hp_ortuwali'];?></td>
			
                        </tr>
                      	<?php
                      $no++; }  
                    }else{
                     ?> 
                     <tr> <!--muncul peringatan bahwa data tidak di temukan-->
                            <td colspan="9" align="center" style="padding:10px;"> Data Pendaftaran Tidak Ditemukan</td>
                      </tr>
                      <?php
                    } 
                      ?>
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
          <!-- Modal Popup Dosen -->
		
  </body>
</html>