<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC - Paket </title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-8 col-sm-offset-1" style="margin-top:50px;">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Tambah Paket Baru</h3>
        </div>
        <div class="panel-body">
          <form class="" action="<?php echo base_url()."index.php/paket/tambah_paket" ?>" method="post">
            <table class="table table-bordered">
              <tr>
                <td>Nama Paket</td>
                <td><input type="text" name="nama" value="" class="form-control"></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="" class="form-control"></td>
              </tr>
            </table>
            <input type="submit" name="submit" value="Tambah" class="btn btn-success" style="margin-left:80%;">
          </form>
        </div>
        <div class="panel-footer">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Paket Penjualan GFC</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
              <thead>
                <td>Nama Paket</td>
                <td>Harga</td>
                <td>Keterangan</td>
                <td>Stok</td>
                <td>Aksi</td>
              </thead>
              <?php
                if($data!=null){
                  foreach ($data as $paket) {
                    echo "<tr>";
                    echo "<td>$paket->nama</td>";
                    echo "<td>$paket->harga</td>";
                    echo "<td>$paket->keterangan</td>";
                    echo "<td>$paket->stok</td>";
                    echo "<td>
                    <a href=\"";
                    echo base_url()."index.php/paket/edit_paket/".$paket->id_paket;
                    echo "\">
                    <button type=\"button\" class=\"btn btn-default\">Edit</button></a>
                  </td>";
                    echo "</tr>";
                  }
                }else{
                  echo "Belum ada paket";
                }
              ?>
            </table>
        </div>
        <div class="panel-footer">

        </div>
      </div>
    </div>

    </div>
  </body>
</html>
