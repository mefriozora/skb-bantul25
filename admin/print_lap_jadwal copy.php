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
            <td style="text-align:justify;" width="100px">Paket </td>
            <td style="text-align:justify;" width="120px">: &nbsp; <?php echo $data1['paket_nama'] ?></td>
            <td style="text-align:justify;" width="120px">&nbsp; &nbsp; &nbsp; Tahun Ajaran</td>
            <td style="text-align:justify;" width="120px">: &nbsp; <?php echo $data1['ta_nama'] ?></td>
        </tr>
        <tr>
            <td style="text-align:left;" width="100px">Kelas </td>
            <td style="text-align:left;" width="200px">: &nbsp; <?php echo $data1['kelas_nama'] ?></td>
            <td style="text-align:left;" width="150px">&nbsp; &nbsp; &nbsp; Pamong Belajar </td>
            <td style="text-align:left;" width="300px">: &nbsp; <?php echo $data1['pamong_nama'] ?></td>
        </tr>
    </table>
    <br><br><br>
    <table border="1" cellpadding="4" cellspacing="2" align="center">

    	 <tr>
        	<th  align="center" style="width: 50px;" rowspan="2">No</th>
            <th  align="center" style="width: 230px;" rowspan="2">Mata Pelajaran</th>
            <th  align="center" style="width: 230px;" rowspan="2">Hari</th>
            <th  align="center" style="width: 230px;" colspan="2">Jam Belajar</th>
        </tr>
        <tr>
            <th  align="center" style="width: 230px;">Mulai</th>
            <th  align="center" style="width: 230px;">Selesai</th>
        </tr>

     <?php }} ?>
     <tbody>
             <?php 
                $no=1;
                $sql=mysqli_query($connect, "SELECT a.jadwal_id,b.mapel_nama,a.jadwal_hari,a.jadwal_jammulai,a.jadwal_jamselesai FROM tb_jadwal a JOIN tb_mapel b ON a.mapel_id=b.mapel_id WHERE a.rombel_id='".$_GET['id']."'");
                $cek= mysqli_num_rows($sql);
                    if($cek>0){
                       while ($data= mysqli_fetch_assoc($sql)) {                 
              ?>
                <tr>
                  <td align="center" style="width: 50px;"><span class="text-muted"><?php echo $no;?></span></td>
                  <td align="center" style="width: 230px;"><?php echo $data['mapel_nama'] ?><input type="hidden" name="idjadwal[]" value="<?php echo $data['jadwal_id'] ?>"></td>
                  <td align="center" style="width: 230px;"><?php echo $data['jadwal_hari'] ?></td>
                  <td align="center" style="width: 230px;"><?php echo $data['jadwal_jammulai'] ?></td>
                  <td align="center" style="width: 230px;"><?php echo $data['jadwal_jamselesai'] ?></td>
                </tr>
                 <?php $no++;}} ?>
              </tbody>
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
	$pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15', array(10, 10, 10, 10));
	$pdf->pdf->SetDisplayMode('fullpage');
	$pdf->setDefaultFont('Arial');
	$pdf->WriteHTML($html, false);
	$pdf->Output('Laporan Jadwal Per Mapel.pdf', 'D');
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
