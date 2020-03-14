<?php ob_start(); 
    include "../config/connection.php";
?>
<html>
<head>
	<title>Laporan Pendaftaran </title>
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
            <h2 align="center">
            SANGGAR KEGIATAN BELAJAR (SKB) BANTUL
          	<br>
          		<small>Jl. Imogiri Barat KM 7, Semail,Bangunharjo,Kec.Sewon,Bantul,Yogyakarta</small>
          	<br>
          		<small>Kode Pos : 55188, Telepon : (0274) 4396012</small>
          	</h2>
          	<hr style="color: #000;">
          <br>
			<?php
				$no=1;
                if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                  $filter = $_GET['filter']; // Ambil data filder yang dipilih user

                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                  $thn = $_GET['tahun'];
                    echo '<h2 style="text-align:center;">LAPORAN PENDAFTARAN '.$_GET['tahun'].'</h2> <br /><br />';

                  $pendaftaran = mysqli_query($connect, "SELECT * FROM tb_pendaftar WHERE YEAR(tgl_pendaftaran)='".$_GET['tahun']."' AND status_pendaftar='Diterima'");
                }else if($filter == '2'){
                  $paket = $_GET['paket'];
                  $kelas = $_GET['kelas'];
                   echo '<h2 style="text-align:center;"> LAPORAN PENDAFTARAN PAKET '.$_GET['paket'].' '.$_GET['kelas'].'</h2>';
                   $pendaftaran = mysqli_query($connect,"SELECT * FROM tb_pendaftar WHERE status_pendaftar='Diterima' AND paket_kesetaraan='$paket' AND kelas_kesetaraan='$kelas'");
                }
                }else{ // Jika user tidak mengklik tombol tampilkan
                  echo '<h2 style="text-align:center;">LAPORAN PENDAFTARAN</h2>';
                  $pendaftaran = mysqli_query($connect, "SELECT * FROM tb_pendaftar WHERE status_pendaftar='Diterima'");
                }

            ?>
            <table border="1">					  					  
					<tr>
						<td style="width: 50px;" align="center">Status Pendaftar</td>
					    <td style="width: 50px;" align="center">No. Pendaftaran</td>
					    <td align="center">Tanggal Pendaftaran</td>
                  		<td align="center">Nama</td>
                  		<td align="center">Tempat, Tanggal Lahir</td>
                  		<td style="width: 70px;" align="center">Agama</td>
                  		<td style="width: 70px;" align="center">Jenis Kelamin</td>
                  		<td align="center">Alamat Pendaftar</td>
                  		<td style="width: 50px;" align="center">Nomor HP</td>
					    <td align="center">Asal Sekolah</td>
					    <td style="width: 50px;" align="center">Paket</td>
					    <td style="width: 50px;" align="center">Kelas</td>
					    <td style="width: 50px;" align="center">Nama Ortu</td>
					  	<td style="width: 70px;" align="center">Pekerjaan Ortu</td>
					    <td align="center">Alamat Ortu</td>
					    <td style="width: 50px;" align="center">No. HP Ortu/Wali</td>

                        </tr>
					<?php
						$cek= mysqli_num_rows($pendaftaran);
                    if($cek>0){
                       while ($data_pendaftar= mysqli_fetch_array($pendaftaran)) { 
					?>

						<tr>
                        
                  			<td style="width: 70px;" align="center"><?php echo $data_pendaftar['status_pendaftar'] ?></td>
                  			<td style="width: 100px;" align="center"><?php echo $data_pendaftar['no_pendaftar'] ?></td>
                  			<td align="center"><?php echo date("d F Y", strtotime($data_pendaftar['tgl_pendaftaran'])); ?></td>
                  			<td align="justify"><?php echo $data_pendaftar['nama'] ?></td>
                  			<td align="justify"><?php echo $data_pendaftar['tempat_lhr']?>,<?php echo date("d F Y", strtotime($data_pendaftar['tanggal_lhr'])); ?></td>
                  			<td style="width: 70px;" align="center"><?php echo $data_pendaftar['agama'] ?></td>
                  			<td style="width: 70px;" align="justify"><?php echo $data_pendaftar['jenkel'] ?></td>
                  			<td align="justify"><?php echo $data_pendaftar['alamat_domisili'] ?></td>
                  			<td style="width: 95px;" align="justify"><?php echo $data_pendaftar['no_hp'] ?></td>
                  			<td align="justify"><?php echo $data_pendaftar['asal_sekolah'] ?></td>
                  			<td style="width: 30px;" align="center"><?php echo $data_pendaftar['paket_kesetaraan'] ?></td>
                  			<td style="width: 30px;" align="center"><?php echo $data_pendaftar['kelas_kesetaraan'] ?></td>
                  			<td style="width: 50px;" align="justify"><?php echo $data_pendaftar['nama_ayah'] ?></td>
                  			<td style="width: 50px;" align="justify"><?php echo $data_pendaftar['pekerjaan_ayah'] ?></td>
                  			<td align="justify"><?php echo $data_pendaftar['alamat_ortu'] ?></td>
                  			<td style="width: 95px;" align="justify"><?php echo $data_pendaftar['no_hp_ortuwali'] ?></td>
                  
                        </tr>
						<?php
							}
							}else{ // Jika data tidak ada
							echo "<tr><td colspan='20'>Data tidak ada</td></tr>";
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
