<?php include_once "cek_session.php"; include_once "views/main.php";
//hapuus
?>
 <?php 

  include "../config/connection.php";
if (isset($_GET['tambahkan'])) 
{
    if (@$_GET['tambahkan']='tambah') 
    {
        $sql="SELECT max(SUBSTRING(ta_nama,-4)) as terakhir FROM tb_tahunajaran";
        $hasil= mysqli_query($connect, $sql);
        $data= mysqli_fetch_array($hasil);
        $lastID= $data['terakhir'];
        $lastnourut= (int)substr($lastID,0,4);
        $nextnourut=$lastnourut+1;
        $nextID="$lastID/$nextnourut";

        for ($i=0 ; $i<2; $i++)
        {
          if($i==1)
          {
            mysqli_query($connect, "INSERT INTO tb_tahunajaran(ta_nama,semester_id) VALUES ('$nextID','2')");
          }
          else
          {
            mysqli_query($connect, "INSERT INTO tb_tahunajaran(ta_nama,semester_id) VALUES ('$nextID','1')");
          }
        }
                  
        ?>
        <script>
        alert('Tahun Ajaran Berhasil Ditambahkan')
        window.location.href ='?page=ta&action=lihat';
        </script>;
        <?php       
    }
}

if (isset($_GET['aktifne'])) 
{
    if (@$_GET['aktifne']='aktif') 
    {
        $id=$_GET['idthajaran'];
        $sid =  mysqli_query($connect, "SELECT semester_id from tb_tahunajaran where ta_id='$id'");
        $ssid = mysqli_fetch_array($sid);
        mysqli_query($connect, "UPDATE tb_semester SET semester_status='Tidak Aktif'");
        mysqli_query($connect, "UPDATE tb_semester SET semester_status='Aktif' where semester_id='".$ssid['semester_id']."'");
        mysqli_query($connect, "UPDATE tb_tahunajaran SET ta_status='Tidak Aktif'");
         mysqli_query($connect, "UPDATE tb_tahunajaran set ta_status='Aktif' where ta_id='$id'");
                  
        echo "<script>alert('Tahun Ajaran Berhasil Diaktifkan')</script>";
                  
    }
}

 ?>
 <?php 

  include "../config/connection.php";

if (isset($_GET['aktifkan'])) 
{
    if (@$_GET['aktifkan']='aktif') 
    {
        $id=$_GET['idsem'];
        mysqli_query($connect, "UPDATE tb_semester SET semester_status='Tidak Aktif'");
         mysqli_query($connect, "UPDATE tb_semester set semester_status='Aktif' where semester_id='$id'");
                  
        echo "<script>alert('Semester Berhasil Diaktifkan')</script>";
                  
    }
}

 ?>
 <div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tahun Ajaran</li>
          </ol>
    <div class="page-header">
      <h4 class="">
        Tahun Ajaran
      </h4>
    </div>
      <div class="">
        <div class="card">
          <div class="card-header">
          <a href="?page=ta&action=lihat&tambahkan=tambah"" class="btn btn-primary" role="button">Tambah</a>
          </div>
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Tahun Ajaran</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $no=1;
                $query=mysqli_query($connect, "SELECT a.* , b.semester from tb_tahunajaran as a join tb_semester as b on b.semester_id = a.semester_id");
                $cek= mysqli_num_rows($query);
                if($cek>0){
                  while ($data= mysqli_fetch_array($query)) {                 
              ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $data['ta_nama'];?></td>
                  <td><?php echo $data['semester'];?></td>
                  <td><?php echo $data['ta_status'];?></td>
                  <td class="text-left">
                    <?php 
                      if($data['ta_status']=='Tidak Aktif'){
                    ?>
                    <a href="?page=semester&action=lihat&aktifne=aktif&idthajaran=<?php echo $data['ta_id'] ?>"  onclick="return confirm('Yakin Mengaktifkan Tahun Ajaran ini?')" class="btn btn-info btn-sm"><i class="fe fe-check-circle">Aktifkan</i></a>
                    <?php } ?> 
                  </td>
                </tr>
          <?php $no++;}} ?>
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
