s<?php ob_start(); 
    include "../config/connection.php";
?>
<html>
<head>
  <title>Laporan Nilai Hasil Belajar Mengajar </title>
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
                $kelas    = $_GET['kelas'];
                $semester = $_GET['semester'];
                $ta       = $_GET['ta'];
                $mapel    = $_GET['mapel'];
              echo '<h4 style="text-align:center;">LAPORAN HASIL BELAJAR</h4>';
              echo '<h4 style="text-align:center;">Daftar Nilai '.$_GET['kelas'].'<br> Semester '.$_GET['semester'].' Tahun Ajaran '.$_GET['ta'].'</h4>';
              echo '<h5 style="text-align:left;">Mata Pelajaran : '.$_GET['mapel'].'<br><br> KKM : 70 </h5>';
          $nilai = mysqli_query($connect, "SELECT tb_nilai.nilai_id, tb_nilai.nis, tb_siswa.nama_siswa, tb_nilai.kelas_id, tb_kelas.kelas_nama, tb_nilai.ta_id, tb_tahunajaran.ta_nama, tb_nilai.semester_id, tb_semester.semester, tb_nilai.mapel_id, tb_mapel.mapel_nama, tb_mapel.mapel_kkm, tb_nilai.nilai_tugas, tb_nilai.nilai_pts, tb_nilai.nilai_pas_pat, tb_nilai.status FROM tb_nilai JOIN tb_siswa ON tb_siswa.nis=tb_nilai.nis JOIN tb_kelas ON tb_kelas.kelas_id=tb_nilai.kelas_id JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_nilai.ta_id JOIN tb_semester ON tb_semester.semester_id=tb_nilai.semester_id JOIN tb_mapel ON tb_mapel.mapel_id=tb_nilai.mapel_id WHERE tb_kelas.kelas_nama='$kelas' AND tb_tahunajaran.ta_nama='$ta' AND tb_semester.semester='$semester' AND tb_mapel.mapel_nama='$mapel'");
        
          }else{
            echo '<h4 style="text-align:center;">LAPORAN HASIL BELAJAR</h4>';
            echo '<h4 style="text-align:center;">Semua Daftar Nilai </h4>';
            
          $nilai = mysqli_query($connect, "SELECT tb_nilai.nilai_id, tb_nilai.nis, tb_siswa.nama_siswa, tb_nilai.kelas_id, tb_kelas.kelas_nama, tb_nilai.ta_id, tb_tahunajaran.ta_nama, tb_nilai.semester_id, tb_semester.semester, tb_nilai.mapel_id, tb_mapel.mapel_nama, tb_mapel.mapel_kkm, tb_nilai.nilai_tugas, tb_nilai.nilai_pts, tb_nilai.nilai_pas_pat, tb_nilai.status FROM tb_nilai JOIN tb_siswa ON tb_siswa.nis=tb_nilai.nis JOIN tb_kelas ON tb_kelas.kelas_id=tb_nilai.kelas_id JOIN tb_tahunajaran ON tb_tahunajaran.ta_id=tb_nilai.ta_id JOIN tb_semester ON tb_semester.semester_id=tb_nilai.semester_id JOIN tb_mapel ON tb_mapel.mapel_id=tb_nilai.mapel_id");
         }

              ?>
            <table border="1">                        
            <tr>
                    <td style="width: 50px;" align="center">No</td>
                    <td style="width: 150px;" align="center">NIS</td>
                    <td style="width: 225px;" align="center">Nama Siswa</td>
                    <td style="width: 150px;" align="center">Matapelajaran</td>
                    <td style="width: 80px;" align="center">KKM</td>
                    <td style="width: 80px;" align="center">Nilai Tugas</td>
                    <td style="width: 80px;" align="center">Nilai PTS</td>
                    <?php if ($_GET['semester']=="Ganjil") {?>
                    <td style="width: 80px;" align="center">Nilai PAS</td>
                    <?php } else {?>
                      <td style="width: 80px;" align="center">Nilai PAT</td>
                    <?php }?>
                    <td style="width: 80px;" align="center">Nilai Akhir</td>
          </tr>
          <?php
            $varTotal = mysqli_num_rows($nilai);
                  // jika data kurang dari 1
                if ($varTotal>0) { 
                while($data_nilai = mysqli_fetch_array($nilai)){
          ?>

            <tr>
              <td  style="width: 50px;" align="center"><?php echo $no++; ?></td>
              <td  style="width: 150px;" align="center"><?php echo $data_nilai['nis']; ?></td>
              <td  style="width: 225px;" align="center"><?php echo $data_nilai['nama_siswa']; ?></td>
              <td  style="width: 150px;" align="center"><?php echo $data_nilai['mapel_nama']; ?></td>
              <td  style="width: 80px;" align="center"><?php echo $data_nilai['mapel_kkm']; ?></td>
              <td  style="width: 80px;" align="center"><?php echo $data_nilai['nilai_tugas']?></td>
              <td  style="width: 80px;" align="center"><?php echo $data_nilai['nilai_pts']?></td>
              <td  style="width: 80px;" align="center"><?php echo $data_nilai['nilai_pas_pat']?></td>
              <td  style="width: 80px;" align="center"><?php echo number_format(($data_nilai['nilai_tugas'] + $data_nilai['nilai_pts'] + $data_nilai['nilai_pas_pat'] )/3, 2); ?></td>
            </tr>
            <?php
              }
              }else{ // Jika data tidak ada
              echo "<tr><td colspan='9'>Data tidak ditemukan</td></tr>";
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
  $pdf->Output('Laporan Nilai Siswa.pdf', 'D');
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
