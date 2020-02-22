<?php include_once "../pendaftaran/views/main.php";?>
<style type="text/css">
  input:invalid {
    border-color: red;
}
input,
input:valid {
    border-color: #ccc;
}
</style>
    <div>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Login</h4>        
          </div>
          <div class="alert alert-info">
          <label for="" align="center">Silahkan Login dengan menggunakan Username dan Password Anda !</label>
          </div>
          <div class="modal-body">
            <form action="cek_login.php" id="formlogin" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="username" id="username" onclick='validasi("username","Username")' required type="text" class="form-control" placeholder="Username"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="password" id="sandi" type="password" class="form-control"  onclick="validasi('sandi','Password')" required minlength="5" title="Password minimal 5 karakter" placeholder="Password"/>
                  </div>
              </div> 
              <div class="modal-footer">
                <button class="btn btn-success" type="submit" name="login" value="login">
                  Masuk
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='../index.php';">
                Kembali
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>  
  <script src="assets/js/vendors/main.js"></script>

<script>
    var form = document.querySelector("#formlogin");
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