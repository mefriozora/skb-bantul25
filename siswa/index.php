<?php
	include_once "cek_session.php"; include_once "views/main.php";
?>
<div class="my-3 my-md-3">
    <div class="row-deck">
        <div class="col-12">
            <div class="card">
              <div class="box">
                <div class="box-header">
                <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div>
			<?php
			$nis_siswa = $_SESSION['username'];
			$get_pengguna = mysqli_query($connect, "SELECT s.*, rs.rombel_id, r.*, pb.pamong_nama, k.kelas_nama, p.paket_nama FROM tb_siswa s JOIN tb_rombel_siswa rs ON s.nis=rs.nis JOIN tb_rombel r ON rs.rombel_id=r.rombel_id JOIN tb_pamong_belajar pb ON r.nik=pb.nik JOIN tb_kelas k ON r.kelas_id=k.kelas_id JOIN tb_paket p ON k.paket_id=p.paket_id WHERE s.nis='$nis_siswa'");
			$data_pengguna = mysqli_fetch_array($get_pengguna);
			?>
            <table class="table card-table table-vcenter text-nowrap">
              <tbody>
                <tr>
                  <td width="18%"><div class="h5">NIS</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['nis']; ?></div></td>
                </tr>
                <tr>
                  <td width="18%"><div class="h5">Nomor Pendaftar</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['no_pendaftar']; ?></div></td>
                </tr>
                <tr>
                  <td width="18%"><div class="h5">Nama</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['nama_siswa']; ?></div></td>
                </tr>
                <tr>
                  <td width="18%"><div class="h5">Paket</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['paket_nama']; ?></div></td>
                </tr>
                <tr>
                  <td width="18%"><div class="h5">Kelas</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['kelas_nama']; ?></div></td>
                </tr>
                <tr>
                  <td width="18%"><div class="h5">Nama Pamong</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['pamong_nama']; ?></div></td>
                </tr>
                <tr>
                  <td width="18%"><div class="h5">Status</div></td>
                  <td width="2%"><div class="h5 text-muted">:</div></td>
                  <td width="80%"><div class="h5 text-muted"><?php echo $data_pengguna['siswa_status']; ?></div></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>