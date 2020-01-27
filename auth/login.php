<?php include_once "../pendaftar/views/main.php";?>


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
            <form action="cek_login.php" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="username" type="text" class="form-control" onkeypress="" placeholder="Username"/>
                  </div>
              </div>
              <div class="form-group">
                <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input name="password" type="password" class="form-control" onkeypress="" placeholder="Password"/>
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
  