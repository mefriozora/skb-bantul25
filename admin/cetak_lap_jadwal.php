s<?php ob_start(); 
    include "../config/connection.php";
?>
<html>
<head>
  <title>Laporan Jadwal Pelajaran </title>
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
                if (isset($_GET['cari'])) {

                $kelas        = $_GET['kelas'];
                $tahun        = $_GET['ta'];
              echo '<h4 style="text-align:center;">Laporan Jadwal Pelajaran <br> ' .$_GET['kelas'].' Tahun Ajaran '.$_GET['ta'].'</h4>';      
          $jadwal = mysqli_query($connect, "SELECT tb_jadwal.jadwal_id, tb_jadwal.jadwal_hari, tb_jadwal.jadwal_jammulai, tb_jadwal.jadwal_jamselesai, tb_mapel.mapel_nama, tb_pamong_belajar.pamong_nama, tb_rombel.kelas_id, tb_kelas.kelas_nama, tb_rombel.ta_id, tb_tahunajaran.ta_nama FROM tb_jadwal JOIN tb_mapel ON tb_mapel.mapel_id=tb_jadwal.mapel_id JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_jadwal.nik JOIN tb_rombel ON tb_rombel.rombel_id=tb_jadwal.rombel_id JOIN tb_kelas ON tb_kelas.kelas_id=tb_rombel.kelas_id  JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_rombel.ta_id WHERE tb_kelas.kelas_nama='$kelas' AND tb_tahunajaran.ta_nama='$tahun' ");
        
          }else{
          
           $jadwal = mysqli_query($connect, "SELECT tb_jadwal.jadwal_id, tb_jadwal.jadwal_hari, tb_jadwal.jadwal_jammulai, tb_jadwal.jadwal_jamselesai, tb_mapel.mapel_nama, tb_pamong_belajar.pamong_nama, tb_rombel.kelas_id, tb_kelas.kelas_nama, tb_rombel.ta_id, tb_tahunajaran.ta_nama FROM tb_jadwal JOIN tb_mapel ON tb_mapel.mapel_id=tb_jadwal.mapel_id JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_jadwal.nik JOIN tb_rombel ON tb_rombel.rombel_id=tb_jadwal.rombel_id JOIN tb_kelas ON tb_kelas.kelas_id=tb_rombel.kelas_id  JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_rombel.ta_id");
         }

      ?>
            <table border="1">                        
             <tr>
                    <td align="center" style="width: 50px;" rowspan="2">No</td>
                    <td align="center" style="width: 150px;" rowspan="2">Hari</td>
                    <td align="center" style="width: 250px;" rowspan="2">Matapelajaran</td>
                    <td align="center" style="width: 150px;" colspan="2">Jam Belajar</td>
                    <td align="center" style="width: 250px;" colspan="2">Pengampu</td>
                 </tr>
                 <tr>
                    <td align="center">Mulai</td>
                    <td align="center">Selesai</td>
                  </tr>
      <?php
            $varTotal = mysqli_num_rows($jadwal);
                  // jika data kurang dari 1
                if ($varTotal>0) { 
                while($data_jadwal = mysqli_fetch_array($jadwal)){
          ?>

            <tr>
              <td  style="width: 50px;" align="center"><?php echo $no++; ?></td>
              <td  style="width: 150px;" align="center"><?php echo $data_jadwal['jadwal_hari'] ?></td>
              <td  style="width: 250px;" align="center"><?php echo $data_jadwal['mapel_nama'] ?></td>
              <td  style="width: 150px;" align="center"><?php echo $data_jadwal['jadwal_jammulai'] ?></td>
              <td  style="width: 150px;" align="center"><?php echo $data_jadwal['jadwal_jamselesai'] ?></td>
              <td  style="width: 250px;" align="center"><?php echo $data_jadwal['pamong_nama'] ?></td>
            </tr>
            <?php
              
              }
              }else{ // Jika data tidak ada
              echo "<tr><td colspan='6'>Data tidak ditemukan</td></tr>";
              }      
            ?>
          </table>
<br>&nbsp;
<br>&nbsp;
<?php
$tglcetak = date('Y-m-d');
echo '<p>Bantul,'. tanggal_indo($tglcetak).'</p>';
?>
<p align='left'>Mengetahui, 
<br>Kepala SKB Bantul, 
<br>&nbsp;
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
  $pdf->Output('Laporan Jadwal Pelajaran.pdf', 'D');
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