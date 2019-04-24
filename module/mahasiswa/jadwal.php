<?php

include "../config/connection.php";
include "../process/proses_jadwalKuliah.php";

$idUser = $_SESSION['id'];

$queryUser = "SELECT a.*, b.*, c.nama as prodi FROM tabel_user a, tabel_mahasiswa b, tabel_prodi c WHERE a.id_user=$idUser and a.id_user=b.id_user and b.id_prodi = c.id_prodi";
$resultUser = mysqli_query($con, $queryUser);
$rowUser = mysqli_fetch_assoc($resultUser);

$namaUser = $rowUser["nama"];
$nimUser = $rowUser["nim"];
$namaProdiUser = $rowUser["prodi"];
$prodiUser = $rowUser["id_prodi"];
$kelasUser = $rowUser["id_kelas"];

?>

<main role="main" class="container-fluid">
  <div id="jadwal" class="row">
    <div class="col-md-12 p-0">
      <div class="m-2 bg-white shadow-sm rounded">
        <nav class="nav nav-underline">
          <span class="nav-link">JADWAL PERKULIAHAN</span>
        </nav>
      </div>
    </div>
    <div class="col-md-3 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <div class="media text-muted pt-3">
          <div class="media-body pb-3 mb-0 small lh-125">
            <center><img src="../attachment/img/avatar.jpeg" class="gambar-profil img-circle" height="170" width="170">
            </center>
            <br><br>
            <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaUser; ?></h5>
              <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $nimUser; ?></h5>
                <h5 class="border-bottom border-gray pb-2 mb-0" align="center"><?php echo $namaProdiUser; ?></h5>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 p-0">
      <div class="m-2 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-2">Jadwal Kuliah</h6>
        <center>
          <div class="warna-verifikasi col-md-12 mt-3 p-2">
            <p class="card-title">Sudah terverifikasi oleh DPA</p>
          </div>
        </center>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
            <strong class="d-block text-dark">Periode Semester</strong>
          </p>
        </div>
        <select class="semester custom-select" style="width:250px">
          <option selected>-</option>
          <option value="1">Semester 1</option>
          <option value="2">Semester 2</option>
          <option value="3">Semester 3</option>
          <option value="3">Semester 4</option>
          <option value="3">Semester 5</option>
          <option value="3">Semester 6</option>
          <option value="3">Semester 7</option>
          <option value="3">Semester 8</option>
        </select>
        <button type="button" class="tmbl-filter btn btn-success ml-2">Filter</button>
        <button type="button" class="tmbl-ruangan btn btn-info float-right">Ruangan</button>
        <br><br>
        <?php
        $resultJadwalKuliah = jadwalKuliah($con,$prodiUser,$kelasUser);
        if (mysqli_num_rows($resultJadwalKuliah) > 0){
        ?>
        <table class="table table-striped table-bordered">
          <thead class="text-white bg-blue">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Mata Kuliah</th>
              <th scope="col">Dosen</th>
              <th scope="col">Hari</th>
              <th scope="col">SKS/JAM</th>
              <th scope="col">Ruang</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            while($row = mysqli_fetch_assoc($resultJadwalKuliah)){
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $row["nm_matkul"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["hari"]; ?></td>
                <td><?php echo $row["sks"]; ?> SKS / <?php echo $row["jam"]; ?> JAM</td>
                <td><?php echo $row["kode"]; ?> (Lt<?php echo $row["lantai"]; ?>)</td>
            </tr>
            <?php
            $no++;
            }
            ?>
          </tbody>
        </table>

        <center>
          <div class="warna-card col-md-12 border border-danger mt-3">
            <div class="teks card-body" style="position: center">
              <!-- <p class="card-title">| <img src="../img/navigation/icon.svg"></a> Informasi|</p> -->
              <p class="card-title">| <i class="fas fa-info"></i> Informasi |</p>
              <p class="card-text" style="color:#950101">*Tidak dapat menampilkan data*</p>
              <p class="card-text">- Anda belum menempuh semester ini</p>
            </div>
        </center>
      </div>
      <?php } else { ?>
      <div class="col-12 mt-5 text-center">
          <i class="fas fa-search mb-3" style="font-size: 5em;"></i>
          <p>Nama, kelas atau prodi tidak dapat ditemukan</h6>
      </div>
      <?php } ?>
    </div>