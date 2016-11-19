<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator GFC</title>
    <?php include("component_css_js.php"); ?>
    <?php include("component_css_sidebar_admin.php"); ?>
  </head>
  <body>
    <div class="col-sm-2">
      <?php include("component_sidebar.php"); ?>
    </div>
    <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1" style="height:80%; overflow-y:scroll; overflow-x:hidden;">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Daftar Member GoodFarmCompany</h3>
              </div>
              <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                      <td>Email</td>
                      <td>Nama Member</td>
                      <td>Aksi</td>
                    </thead>
                    <tbody>
                      <?php if($data!=null){ foreach ($data as $member): ?>
                          <td><?php echo $member->email ;?></td>
                          <td><?php echo $member->nama ;?></td>
                          <td><a href="<?php echo base_url()."index.php/member/lihat_profil/".$member->id_member; ?>"><button type="button" class="btn btn-default">
                            Lihat Profil
                          </button></a></td>
                      <?php endforeach; }?>
                    </tbody>
                </table>
              </div>
              <div class="panel-footer">

              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
