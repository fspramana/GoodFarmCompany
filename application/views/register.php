<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include("component_css_js.php"); ?>
  </head>
  <body>
    <div class="row">
      <?php include("component_navbar.php"); ?>
    </div>
    <div class="row" style="margin-top:80px;">
    <div class="row">
      <div class="container">
      <form class="form-horizontal" method="post" action="<?php echo base_url()."index.php/akun/buat_akun"; ?>">
    <fieldset>

    <legend>Bergabung dengan GoodFarmCompany</legend>
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Email</label>
      <div class="col-md-4">
      <input name="email" class="form-control input-md" id="textinput" type="email" placeholder="" required>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Password</label>
      <div class="col-md-4">
      <input name="password" class="form-control input-md" id="textinput" type="password" placeholder="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nama Lengkap</label>
      <div class="col-md-4">
      <input name="nama" class="form-control input-md" id="textinput" type="text" placeholder="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Nomor Telepon</label>
      <div class="col-md-4">
      <input name="no_telp" class="form-control input-md" id="textinput" type="text" placeholder="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textinput">Alamat</label>
      <div class="col-md-4">
      <textarea class="form-control input-md" rows="3" id="textinput" name="alamat"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4 col-md-offset-8">
        <button class="btn btn-success" id="button1id" type="submit">Daftar</button>
      </div>
    </div>

    </fieldset>
    </form>

    </div>
    </div>

    </div>
  </body>
</html>
