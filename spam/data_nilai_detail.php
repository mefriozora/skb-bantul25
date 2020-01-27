<?php include_once "views/main.php";?>
<?php include_once "views/status.php";?>
<?php 
$main_view= "<script>window.location.href='pem_kelas.php';</script>";
switch ($_GET["act"]){
default:

$semester=$_GET['s'];
$tahun_ajaran=$_GET['t'];
$kelas=$_GET['k'];
$mapel=$_GET['m'];
//ambil kelas
$sql_kelas=mysql_query("select * from kelas where id_kelas='$kelas'");
$kl=mysql_fetch_array($sql_kelas);

$sql_ta=mysql_query("select * from tahun_ajaran where id_ta='$tahun_ajaran'");
$ta=mysql_fetch_array($sql_ta);

//INDEX======================================================================================================
?>
<style type="text/css">
#hid{
  border: 0px;color:grey;
}
</style>
<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">

          <div class="modal-header">
            <h4 class="modal-title">Nilai Siswa</h4>            
          </div>
    </div>
        <div class="card">
          <div class="table-responsive">
      <div class="">
            <table class="table card-table table-vcenter text-nowrap" style="width:500px;">
              <thead>
                <tr>
                  <th valign="top" class="w-5"><b>TAHUN AJARAN</b></th><th class="w-1">:</th>
                  <th>                    
                    <?php echo $ta['ta'];?>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>SEMESTER</b></th><th class="w-1">:</th>
                  <th>                                        
                    <?php echo $semester;?>
                  </th>
                  <th class=""></th>
                </tr>
                <tr>
                  <th valign="top" class="w-5"><b>KELAS</b></th><th class="w-1">:</th>
                  <th>                       
                    <?php echo $kl['kelas'];?>
                  </th>
                  <th class=""></th>
                </tr>
              </thead>
            </table>
          </div>
          </div>
        </div>
    </div>
  </div>

<div class="my-3 my-md-5">
  <div class="container">
      <div class="">
        <div class="card">
          <div class="table-responsive">  
          <form action="?&act=save" enctype="multipart/form-data" method="post">       
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th class="w-2">No Pendaftaran</th>
                  <th class="w-2">No Induk</th>
                  <th>Nama</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php

              $sql=mysql_query("select * from siswa a left join pendaftar b on (a.no_pendaftar=b.no_pendaftar and a.no_induk=b.no_induk) left join kelas c on (a.id_kelas=c.id_kelas) where a.id_kelas='$kelas' order by a.no_pendaftar");

              $no=1;
              while($h=mysql_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><input type="text" name="np[]" value="<?php echo $h['no_pendaftar'];?>" id="hid" readonly></td>
                  <td><input type="text" name="ni[]" value="<?php echo $h['no_induk'];?>" id="hid" readonly></td>
                  <td><?php echo $h['nama'];?></td>
                  <td class="text-center">
                    <a href="data_nilai_detail_siswa.php?&s=<?php echo $semester;?>&t=<?php echo $tahun_ajaran;?>&k=<?php echo $kelas;?>&np=<?php echo $h['no_pendaftar'];?>&ni=<?php echo $h['no_induk'];?>" target="_blank" class="btn btn-secondary btn-sm"><i class="fe fe-search"></i></i></a>
                  </td>
                </tr>
              <?php $no++; } ?>
              </tbody>
            </table>
            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>

    </form>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php 
break;

}
?>

