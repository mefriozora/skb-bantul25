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

$np=$_GET['np'];
$ni=$_GET['ni'];
//ambil kelas
$sql_kelas=mysql_query("select * from kelas where id_kelas='$kelas'");
$kl=mysql_fetch_array($sql_kelas);

$sql_ta=mysql_query("select * from tahun_ajaran where id_ta='$tahun_ajaran'");
$ta=mysql_fetch_array($sql_ta);

$sql_pen=mysql_query("select * from pendaftar where no_pendaftar='$np' AND no_induk='$ni'");
$p=mysql_fetch_array($sql_pen);

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
                <tr>
                  <th valign="top" class="w-5"><b>NAMA SISWA</b></th><th class="w-1">:</th>
                  <th>                       
                    <?php echo $p['nama'];?>
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
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Mata Pelajaran</th>
                  <th class="w-2">Ulangan Harian</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th class="w-2">AKSI</th>
                </tr>
              </thead>
              <tbody>
              <?php

              $sql=mysql_query("select * from nilai a left join mapel b on a.id_mapel=b.id_mapel where a.no_induk='$ni' AND a.no_pendaftar='$np' AND id_ta='$tahun_ajaran' AND semester='$semester'");

              $no=1;
              while($h=mysql_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['mapel'];?></td>
                  <td><?php echo $h['nilai_ulhar'];?></td>
                  <td><?php echo $h['nilai_uts'];?></td>
                  <td><?php echo $h['nilai_uas'];?></td>
                  <td class="text-right" class="w-2">
                    <a href="?&act=form_update&id=<?php echo $h['id_nilai'];?>" class="btn btn-secondary btn-sm"><i class="fe fe-edit"></i>
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

              <div class="modal-footer">
                <a href="javascript:window.open('','_self').close();">
                <button class="btn btn-blue" type="button">
                  Tutup
                </button>
              </a>
              </div>

          </div>
        </div>
      </div>

    </div>
  </div>
<?php 
break;

case "form_update";
$id = $_GET['id'] ?: '0';
$sql=mysql_query("select * from nilai a left join mapel b on a.id_mapel=b.id_mapel where a.id_nilai='$id'");
$h=mysql_fetch_array($sql);
?>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>            
          </div>
          <div class="modal-body">

            <form action="?&act=update" enctype="" method="POST">
              <div class="form-group">
                <label>Ulangan Harian</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input name="uh" type="text" class="form-control" onkeypress="return isNumberKey(this,event)" value="<?php echo $h['nilai_ulhar'];?>"/>                    
                  </div>
              </div>
              <div class="form-group">
                <label>UTS</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="ut" type="text" class="form-control" onkeypress="return isNumberKey(this,event)" value="<?php echo $h['nilai_uts'];?>"/>                 
                  </div>
              </div>
              <div class="form-group">
                <label>UTS</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="ua" type="text" class="form-control" onkeypress="return isNumberKey(this,event)" value="<?php echo $h['nilai_uas'];?>"/>                
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Update
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  
<?php
break;

case "update";
$uh=$_POST['uh'];
$ut=$_POST['ut'];
$ua=$_POST['ua'];
$id=$_POST['id'];
//validasi 1
if (empty($id)){ 
  echo"<script>alert('Proses gagal');history.back(-1);</script>";  
}else{
   $input2=mysql_query("UPDATE nilai set nilai_ulhar ='$uh', nilai_uts ='$ut', nilai_uas ='$ua' where id_nilai='$id'"); 
      if ($input2){    
      echo"<script>alert('Nilai sukses di Update');history.go(-2);</script>";
      }
      else {
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
}
break;

}
?>