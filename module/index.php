<?php
    $level="dosen";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>JTI Website</title>

  <?php
      include "../config/styles.php";
    ?>
</head>

<body>
  <!-- navigation -->
  <div id="navigation" class="container-fluid h-100">
    <div class="row h-100">
      <div class="col-md-12 my-auto">
        <div class="row text-center text-white font-weight-bold">
          <div class="col-md-0 col-lg"></div>
          <div onclick="location.href='index.php?module=home';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/home.svg">
            <p class="mt-3">HOME</p>
          </div>
          <div onclick="location.href='index.php?module=jadwal';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/jadwalKuliah.svg">
            <p class="mt-3">JADWAL KULIAH</p>
          </div>
          <div onclick="location.href='index.php?module=nilai';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/nilaiMahasiswa.svg">
            <p class="mt-3">NILAI MAHASISWA</p>
          </div>
          <div onclick="location.href='index.php?module=kompenAbsen';" class="navigation-menu col-md-3 col-lg-2 my-1">
            <img src="../img/navigation/absensi.svg">
            <p class="mt-3">ABSENSI & KOMPEN</p>
          </div>
          <div class="col-md-0 col-lg"></div>
        </div>
      </div>
    </div>
  </div>


  <!-- navbar -->
  <nav class="app-navbar navbar navbar-expand-md navbar-dark bg-blue shadow-sm sticky-top mb-2">
    <a class="ml-5 mr-5" id="navigation-btn"> <i class="fas fa-bars text-white burger-icon"></i></a>
    <a class="navbar-brand " href="index.php?module=home"><b>JTI Website</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <!-- memberi space ditengah navbar -->
      <div class="mx-auto"></div>
      <i class="notification-icon text-white far fa-bell">

        <!-- bagian notification bubble -->
        <span class="fas fa-circle notification-bubble"></span>
        <span class="notification-bubble-num">10</span>
      </i>

      <div class="nav-button-group dropdown mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="nav-profile-photo ml-4 " src="../attachment/img/avatar.jpeg">
        <a href="#" class="dropdown-toggle ml-2 profile-link" id="dropdownMenuButton" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Avatar <b class="caret"></b></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
          <b class="caret d-none d-lg-block d-xl-block"></b>
          <a class="dropdown-item" href="#" data-target="#largeShoes" data-toggle="modal">Pengaturan</a>
          <hr class="hr-light m-0">
          <a class="dropdown-item" href="#">Log Out</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- The modal pengaturan -->
  <div class="modal fade" id="largeShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title">Pengaturan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pb-0">
          <div class="row">
            <div class="col-md-12">
              <center><img src="../attachment/img/avatar.jpeg" id="fotoPrev" height="150px" width="150px"
                  class="rounded-circle" /></center>
              <br>
              <center>AVATAR</center>
              <br>
              <form class="px-3">
                <div class="form-group row">
                  <label class="col-md-3" for="foto">Ganti Foto</label>
                  <div class="custom-file col-md-9">
                    <input type="file" class="custom-file-input form-control" id="foto" name="foto"
                      onblur="reset_Blank(); reset_Size(); reset_Check();" onchange="preview_image(event);"
                      accept="image/*">
                    <label class="custom-file-label" for="foto">Pilih File</label>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-md-3" for="passwordLama">Password Lama</label>
                  <input type="password" id="passwordLama" placeholder="Password Lama" name="passwordLama"
                    onblur="reset_Blank();" class="form-control col-md-9">
                </div>
                <div class="form-group row">
                  <label class="col-md-3" for="passwordBaru">Password Baru</label>
                  <input type="password" class="form-control col-md-9" id="passwordBaru" placeholder="Password Baru"
                    name="passwordBaru" onblur="reset_Blank();">
                </div>
                <div class="form-group row">
                  <label class="col-md-3" for="konfirmasiPassword">Konfirmasi Password</label>
                  <input type="password" class="form-control col-md-9" id="konfirmasiPassword"
                    placeholder="Konfirmasi Password" name="konfirmasiPassword" onblur="reset_Blank();">
                </div>
                <div>
                  <div id="Blank" class="text-danger"></div>
                  <div id="fotoSize" class="text-danger"></div>
                  <div id="fotoType" class="text-danger"></div>
                  <div id="konfirmasipasswordSalah" class="text-danger"></div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="align-self-end p-3">
          <button type="button" name="kirim" class="btn btn-success"
            onclick="Coba(); showFilesSize(); checkFoto();">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- script modal pengaturan -->
  <script type='text/javascript'>
  // Initialize tooltip component
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  // Initialize popover component
  $(function() {
    $('[data-toggle="popover"]').popover()
  })

  function Coba() {
    var foto = document.getElementById("foto").value;
    var passwordLama = document.getElementById("passwordLama").value;
    var passwordBaru = document.getElementById("passwordBaru").value;
    var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;

    if (foto == "" || passwordLama == "" || passwordBaru == "" || konfirmasiPassword == "") {
      document.getElementById("Blank").innerHTML = "* Terdapat kolom yang belum diisi";
    } else if (foto != "" || passwordLama != "" || passwordBaru != "" || konfirmasiPassword != "") {
      document.getElementById("Blank").innerHTML = "";

      if (konfirmasiPassword != passwordBaru) {
        document.getElementById("konfirmasipasswordSalah").innerHTML = "* Konfirmasi password tidak sesuai";
      } else if (konfirmasiPassword == passwordBaru) {
        document.getElementById("konfirmasipasswordSalah").innerHTML = "";
      }
    }


  }


  function reset_Blank() {

    var foto = document.getElementById("foto").value;
    var passwordLama = document.getElementById("passwordLama").value;
    var passwordBaru = document.getElementById("passwordBaru").value;
    var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;

    if (foto != "" && passwordLama != "" && passwordBaru != "" && konfirmasiPassword != "") {
      document.getElementById("Blank").innerHTML = "";
    }

  }

  function showFilesSize() {

    var input, file

    input = document.getElementById("foto");

    file = input.files[0];

    if (file.size > 1000000) {
      document.getElementById("fotoSize").innerHTML = "* Ukuran melebihi 1 MB";
    } else if (file.size < 1000000) {
      document.getElementById("fotoSize").innerHTML = "";
    }

  }

  function reset_Size() {

    var input, file

    input = document.getElementById("foto");

    file = input.files[0];

    if (file.size < 8000000) {
      document.getElementById("fotoSize").innerHTML = "";
    }
  }

  function reset_Check() {
    var input = document.getElementById("foto");

    var filePath = input.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (allowedExtensions.exec(filePath)) {
      document.getElementById("fotoType").innerHTML = "";
      fileInput.value = '';
      return true;
    }
  }

  function checkFoto() {
    var input = document.getElementById("foto");

    var filePath = input.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (!allowedExtensions.exec(filePath)) {
      document.getElementById("fotoType").innerHTML = "* Ekstensi file tidak sesuai";
      fileInput.value = '';
      return false;
    } else {
      document.getElementById("fotoType").innerHTML = "";
    }

  }

  function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('fotoPrev');
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
  </script>


  <!-- konten -->
  <div class="container-fluid px-5">
    <?php
      $module=$_GET["module"];
      if($level=="mahasiswa"){
          switch($module){
              case "home":
                  include "mahasiswa/home.php";
              break;
              case "kompenAbsen":
                  include "mahasiswa/kompenAbsen.php";
              break;
              case "coba":
                  include "mahasiswa/coba.php";
              break;
              case "jadwal":
                  include "mahasiswa/jadwal.php";
              break;
              case "nilai":
                  include "mahasiswa/nilai.php";
              break;
              case "kelasKosong":
                  include "mahasiswa/kelasKosong.php";
              break;
              default:
                include "404.php";
          }
      }
      else if ($level=="dosen") {
          switch($module){
              case "home":
                  include "dosen/home.php";
              break;
              default:
              include "dosen/home.php";
          }
      }
            
      if($level=="mahasiswa" || $level=="admin" || $level=="dosen"){
      ?>
    <img src="../img/Chat.svg" alt="chat" class="chat-bubble">
    <?php
      }
      ?>
  </div>

  <?php
      include "../config/scripts.php";
    ?>

</body>

</html>