<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!-- Load Component CSS & JS, for edit those configuration in component_js_css.php -->
    <?php include("component_css_js.php"); ?>
    <!-- Other style and script written below -->
    <style>
    .logo {
        font-size: 200px;
    }
    @media screen and (max-width: 768px) {
        .col-sm-4 {
            text-align: center;
            margin: 25px 0;
        }
    }
    .jumbotron {
        background-color: #33d653;
        color: #fff;
        padding: 220px 0px;
    }

    .container-fluid {
        padding: 0px 100px;
    }
    .panel {
      border: 1px solid #33d653;
      border-radius:0;
      transition: box-shadow 0.5s;
    }

    .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
    }

    .panel-footer .btn:hover {
      border: 1px solid #33d653;
      background-color: #fff !important;
      color: #f4511e;
    }

    .panel-heading {
      color: #fff !important;
      background-color: #33d653 !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }

    .panel-footer {
      background-color: #fff !important;
    }

    .panel-footer h3 {
      font-size: 32px;
    }

    .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
    }

    .panel-footer .btn {
      margin: 15px 0;
      background-color: #33d653;
      color: #fff;
    }
    </style>
  </head>

  <body>
    <!-- Navbar Section - Load Navbar Component -->
    <div class="row">
    <?php include("component_navbar.php"); ?>
    </div>

    <!-- Jumbotron Section - Logo GoodFarmCompany and Banner  -->
    <div class="row">
      <div class="col-sm-12">
        <div class="jumbotron text-center">
          <h1>GoodFarmCompany</h1>
          <br>
          <p>Memajukan Pertanian Indonesia Melalui Standarisasi Alat dan Bahan serta Infrastruktur Pertanian Indonesia</p>
          <br><br><br>
        </div>
      </div>
    </div>

    <!-- Tentang Section -->
    <div class="row" style="margin-top:130px;">
      <div class="container-fluid">
          <div class="col-sm-8">
            <h2>Tentang Kami</h2>
            <h4>GoodFarmCompany adalah Startup penyedia jasa peningkatan kualitas hasil pangan melalui jasa standarisasi alat pertanian (sewa)
            penggunaaan pupuk organik, serta penggunaan insektisida yang aman bagi manusia maupun kualitas tanaman. Sehingga diharapkan
            memperoleh hasil yang optimal dengan infrastruktur lahan yang ada di Indonesia dan nantinya dapat bersaing dengan produk Import dan
            dalam jangka panjang dapat dilakukan ekspor ke negara lingkup Asia Tenggara.</h4>
          </div>
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-signal logo"></span>
          </div>
      </div>
    </div>

    <!-- Tujuan Section -->
    <div class="row" style="margin-top:150px;">
      <div class="container-fluid bg-grey">
        <div class="row">
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-globe logo"></span>
          </div>
          <div class="col-sm-8">
            <h2>Tujuan Kami</h2>
            <h4>Kami didirikan untuk memaksimalkan potensi lahan Indonesia yang memiliki slogan <strong>Gemah Ripah Loh Jinawi</strong><br>
            Yang saat ini belum optimal kualitas hasil lahan pertanian dan perkebunannya. Sehingga masyarakat Indonesia dapat lebih menghasilkan
            produk yang lebih unggul dalam kuantitas maupun kualitas dan dapat bersaing di kancah Internasional.</h4>
          </div>
        </div>
        <br><br><br>
      </div>
    </div>
    <!-- Paket Section-->
    <div class="row">
      <div class="container-fluid">
        <div class="text-center">
          <h2>Paket Hemat</h2>
          <h4>Ada beberapa yang kami tawarkan dengan harga paket</h4>
        </div>
        <div class="row">
          <?php
          if($paket!=null){
            foreach($paket as $data){
              echo"
              <div class=\"col-sm-4\">
                <div class=\"panel panel-default text-center\">
                  <div class=\"panel-heading\">
                    <h1>$data->nama</h1>
                  </div>
                  <div class=\"panel-body\">";
                if($barang!=null){
                  foreach($barang as $value){
                    if($data->id_paket == $value->id_paket){
                      echo "<p><strong>$value->jumlah</strong>$value->nama_barang</p>";
                    }
                  }
                }
                echo "
                  </div>
                  <div class=\"panel-footer\">
                    <h3>$data->harga</h3>
                    <h4>Pertahun</h4>
                    <button class=\"btn btn-lg\">Pilih</button>
                  </div>
                </div>
              </div>
              ";
            }
            }else{
                echo "Belum ada paket dijual";
            }
          ?>
        </div>
      </div>
    </div>


  </body>
</html>
