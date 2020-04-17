<?php include_once "cek_session.php"; include_once "views/main.php";?>
<?php 
$main_view= "<script>window.location.href='kelas.php';</script>";
switch ($_GET["act"]){
default:
//INDEX======================================================================================================
?>
<style type="text/css">
  input:invalid {
    border-color: red;
}
input,
input:valid {
    border-color: #ccc;
}
</style>
<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Kelas</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Kelas</h3>
                  </div>
                  <div class="card-body">
                  <form action="?&act=save" id="formtambahkelas" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Kelas</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="kelas" id="kelas" type="text" class="form-control" onclick="validasi('kelas','Kelas')" required placeholder="Kelas"/>
                  </div>
              </div>
              
              <div class="form-group">
                <label>Paket Kesetaraan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="paket_kesetaraan" id="paket_kesetaraan" class="form-control">
                      <option selected value="">-Pilih Paket Kesetaraan-</option>
                        <?php
                        //include "../config/connection.php"; 
                            $querypaket = mysqli_query($connect,"SELECT * FROM tb_paket");
                            while ($datapaket = mysqli_fetch_array($querypaket)){
                        ?>
                      <option value="<?php echo $datapaket['paket_id'] ?>"><?php echo $datapaket['paket_nama'] ?>
                            <?php } ?>
                      </option>
                      
                    </select>
                  </div>
              </div>
              
              <div class="modal-footer">
                <button onclick="javascript:validate();" class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='kelas.php';">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        function validate(){
        if (document.getElementById("paket_kesetaraan").selectedIndex == ""){
          alert("Pilih Paket Kesetaraan dahulu");
        }
        else {
          alert(document.getElementById("paket_kesetaraan").options[document.getElementById("paket_kesetaraan").selectedIndex].value);
        }
      }
      </script>
      <div class="col-lg-8">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Kelas</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kelas</th>
                  <th>Paket Kesetaraan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql=mysqli_query($connect,"SELECT tb_kelas.kelas_id, tb_kelas.kelas_nama, tb_kelas.paket_id, tb_paket.paket_nama FROM tb_kelas LEFT JOIN tb_paket ON tb_paket.paket_id=tb_kelas.paket_id");
              $no=1;
              while($h=mysqli_fetch_array($sql)){ ?>
                <tr>
                  <td><span class="text-muted"><?php echo $no;?></span></td>
                  <td><?php echo $h['kelas_nama'];?></td>
                  <td><?php echo $h['paket_nama'];?></td>
                  <td class="text-left">
                    <a href="kelas_edit.php?id=<?php echo $h['kelas_id'];?>" class="btn btn-info btn-sm"><i class="fe fe-edit"></i>Edit</a>
                    <a href='?&act=delete&id=<?php echo $h['kelas_id'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-danger btn-sm"><i class="fe fe-trash"></i>Hapus</a>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    var form = document.querySelector("#formtambahkelas");
    function validasi(textbox, text) {
        var input = document.getElementById(textbox);

        var cek = form.checkValidity()
        if (cek == false) {
            input.oninvalid = function(e) {
                if (e.target.validity.valueMissing) {
                    e.target.setCustomValidity(text + " Wajib Diisi");
                    return;
                }
            }
            input.oninput = function(e) {
                e.target.setCustomValidity("")
            }
            form.reportValidity();
            console.log(cek);
        }

    }
  </script>
<?php
break;

case "save";
$kelas=$_POST['kelas'];
//var_dump($kodemapel);

$paket_kesetaraan =$_POST['paket_kesetaraan'];

//validasi 1
//if (empty($kodemapel)){ 
  //echo"<script>alert('Masukkan kode mapel');history.back(-1);</script>";  
//}elseif (empty($mapel)) {
  //echo"<script>alert('Masukkan nama mapel');history.back(-1);</script>";  
//}elseif (empty($kelas)) {
  //echo"<script>alert('Pilih Kelas');history.back(-1);</script>";  
 
//}else{  
  // validasi 2
  $cek_dulu=mysqli_query($connect,"SELECT * from tb_kelas where kelas_nama='$kelas'");
  $cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"INSERT INTO `tb_kelas`(`kelas_id`, `kelas_nama`, `paket_id`) VALUES ('','$kelas','$paket_kesetaraan')");
   //var_dump($input); exit();
      if ($input){
        //$_SESSION[status]    = "sukses";
        //echo "masuk";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  //}
//}

break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM tb_kelas WHERE kelas_id='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>

