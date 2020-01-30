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
			Laporan Jadwal Per Matapelajaran
			</h4>
			 <?php 
	  $no=1;
	  $sql1=mysqli_query($connect, "SELECT a.rombel_id,c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f on c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif') AND a.rombel_id='".$_GET['id']."'");
	  $cek1= mysqli_num_rows($sql1);
	  if($cek1>0){
	  while ($data1= mysqli_fetch_array($sql1)) {                 
	?>
	<table>
        <tr>
            <th style="text-align:left;" width="100px">Paket </th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['paket_nama'] ?></th>
            <th style="text-align:left;" width="120px">Tahun Ajaran</th>
            <th style="text-align:left;" width="120px">: &nbsp&nbsp<?php echo $data1['ta_nama'] ?></th>
        </tr>
        <tr>
            <th style="text-align:left;" width="100px">Kelas </th>
            <th style="text-align:left;" width="200px">: &nbsp&nbsp<?php echo $data1['kelas_nama'] ?></th>
            <th style="text-align:left;" width="150px"> Pamong Belajar </th>
            <th style="text-align:left;" width="300px">: &nbsp&nbsp<?php echo $data1['pamong_nama'] ?></th>
        </tr>
    </table>
    <?php }} ?>

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
<br><ins>Mefri Anriyanto</ins>
<br>(NIK : 316111096)&nbsp;&nbsp;&nbsp;</p>

</body>
</html>

<?php
$html = ob_get_clean();
ob_end_clean();

require_once('../plugin/html2pdf/html2pdf.class.php');
try
{
	$pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15', array(10, 10, 10, 10));
	$pdf->pdf->SetDisplayMode('fullpage');
	$pdf->setDefaultFont('Arial');
	$pdf->WriteHTML($html, false);
	$pdf->Output('Laporan Data Siswa.pdf', 'D');
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
