<?php ob_start(); 
    include "../config/connection.php";
?>
<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>

            <h1 align="center">
			SANGGAR KEGIATAN BELAJAR (SKB) BANTUL
			<br>
			<small>Jl. Imogiri Barat KM 7, Semail,Bangunharjo,Kec.Sewon,Bantul,Yogyakarta</small>
			<br>
			<small>Kode Pos : 55188, Telepon : (0274) 4396012</small>
			</h1>
			<hr style="color: #000;">
			<br>
			<h4 align="center">
			Laporan Pendaftaran
			</h4>
			<?php
				$no=1;
    			if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
      				$filter = $_GET['filter']; // Ambil data filder yang dipilih user

      			if($filter == '1'){ // Jika filter nya 1 (per tanggal)
          			$tahun = $_GET['tahun'];
          			echo '<b align=center>Laporan Pendaftaran Tahun '.$_GET['tahun'].'</b><br /><br />';        
          			$VarResult = mysqli_query($connect,"SELECT * FROM tb_pendaftar WHERE YEAR(tgl_pendaftaran)='".$_GET['tahun']."' AND status_pendaftar='Diterima'");// Tampilkan data transaksi sesuai th ajaran yang diinput oleh user pada filter
  				}

  				}else{ // Jika user tidak mengklik tombol tampilkan
      				echo '<b align=center>Semua Laporan Pendaftaran</b><br /><br />';
      				$VarResult = mysqli_query($connect,"SELECT * FROM tb_pendaftar  WHERE status_pendaftar='Diterima'"); // Tampilkan semua data
 				 }

            ?>
            <table border="1">					  					  
					<tr>
						  <th align="center" style="width: 50px;">Status Pendaftar</th>
						  <th align="center" style="width: 50px;">No. Pendaftaran</th>
						  <th align="center" style="width: 50px;">Tanggal Pendaftaran</th>
                          <th align="center" style="width: 50px;">Nama</th>
                          <th align="center" style="width: 50px;">Tempat, Tanggal Lahir</th>
                          <th align="center" style="width: 50px;">Agama</th>
                          <th align="center" style="width: 50px;">Jenis Kelamin</th>
                          <th align="center" style="width: 50px;">Alamat Pendaftar</th>
                          <th align="center" style="width: 50px;">Nomor HP</th>
						  <th align="center" style="width: 50px;">Asal Sekolah</th>
						  <th align="center" style="width: 50px;">Paket Kesetaraan</th>
						  <th align="center" style="width: 50px;">Kelas Kesetaraan</th>
						  <th align="center" style="width: 50px;">Putus Sekolah Kelas</th>
						  <th align="center" style="width: 50px;">Putus Sekolah Semester</th>
						  <th align="center" style="width: 50px;">Alamat Sekolah</th>
						  <th align="center" style="width: 50px;">Bertempat Tinggal</th>
						  <th align="center" style="width: 50px;">Nama Ayah</th>
						  <th align="center" style="width: 50px;">Nama Ibu</th>
						  <th align="center" style="width: 50px;">Pekerjaan Ayah</th>
						  <th align="center" style="width: 50px;">Pekerjaan Ibu</th>
						  <th align="center" style="width: 50px;">Alamat Ortu</th>
						  <th align="center" style="width: 50px;">No. HP Ortu/Wali</th>
						  
						  <th></th>
                        </tr>
					<?php
						$cek= mysqli_num_rows($VarResult );
                    if($cek>0){
                       while ($h= mysqli_fetch_assoc($VarResult )) { 
					?>

						<tr>
                          <td align="center" style="width: 70px;"><?php echo $h['status_pendaftar'];?></td>
						  <td align="center" style="width: 100px;"><?php echo $h['no_pendaftar'];?></td>
						  <td align="center" style="width: 100px;"><?php echo date("d F Y", strtotime($h['tgl_pendaftaran'])); ?></td>
						  <td align="center" style="width: 100px;"><?php echo $h['nama'];?></td>
						  <td align="center" style="width: 120px;"><?php echo $h['tempat_lhr'] ?> , <?php echo date("d F Y", strtotime($h['tanggal_lhr'])); ?> </td>
						  <td align="center" style="width: 70px;"><?php echo $h['agama'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['jenkel'];?></td>
						  <td align="center" style="width: 120px;"><?php echo $h['alamat_domisili'];?></td>
						  <td align="center" style="width: 100px;"><?php echo $h['no_hp'];?></td>
						  <td align="center" style="width: 100px;"><?php echo $h['asal_sekolah'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['paket_kesetaraan'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['kelas_kesetaraan'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['putus_sekolah_kelas'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['putus_sekolah_semester'];?></td>
						  <td align="center" style="width: 100px;"><?php echo $h['alamat_sekolah'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['bertempat_tinggal'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['nama_ayah'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['nama_ibu'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['pekerjaan_ayah'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['pekerjaan_ibu'];?></td>
						  <td align="center" style="width: 70px;"><?php echo $h['alamat_ortu'];?></td>
						  <td align="center" style="width: 100px;"><?php echo $h['no_hp_ortuwali'];?></td>
                        </tr>
										  <?php
										}
									}else{ // Jika data tidak ada
										echo "<tr><td colspan='23'>Data tidak ada</td></tr>";
									}			 
				?>
	</table>
<br>&nbsp;
<br>&nbsp;
<?php
$tglcetak = date('Y-m-d');
echo '<p>Yogyakarta,'. tanggal_indo($tglcetak).'</p>';
?>
<p align='left'>Mengetahui, 
<br>Kepala SKB Bantul, 
<br>&nbsp;
<br>&nbsp;
<br>&nbsp;
<br>&nbsp;
<br><ins>Rumini,S.Pd</ins>
<br>(NIP : 195908251982032005)</p>

</body>
</html>

<?php
$html = ob_get_clean();
ob_end_clean();

require_once('../plugin/html2pdf/html2pdf.class.php');
try
{
	$pdf = new HTML2PDF('L','A3','en', false, 'ISO-8859-15', array(10, 10, 10, 10));
	$pdf->pdf->SetDisplayMode('fullpage');
	$pdf->setDefaultFont('Arial');
	$pdf->WriteHTML($html, false);
	$pdf->Output('Laporan Pendaftaran.pdf', 'D');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>
<?php
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


?>
