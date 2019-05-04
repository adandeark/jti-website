<?php
include "../config/connection.php";
include "../process/proses_adminRuangan.php";

?>

<div class="col-md-6 p-0">
  <div class="m-2 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Pemesanan Ruang</h6>
    <div class="pt-3">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-md-12">
            <div class="form-inline">
              <img src="../img/search.svg" alt="" id="icon-search">
              <input type="search" class="form-control" id="txtCariPemesanan" placeholder="Pencarian">
            </div>
          </div>
        </div>

        <div class="row pt-0 pl-3 pr-3 mr-0 mt-3 scrollbar scrollbar-x" id="pemesanan-ruang">
          
          <?php
          $resultPeminjam=peminjam($con);

          if (mysqli_num_rows($resultPeminjam) > 0){
            $no=1;
            while($rowPeminjam = mysqli_fetch_assoc($resultPeminjam)){
          ?>
            <div class="col-md-12 p-2 border-top border-bottom itemPemesanan">
              <div class="container-fluid p-0">
                <div class="row d-flex justify-content-around p-0 m-0">
                  <div class="col-md-1 my-auto">
                    <strong><?php echo $no;?></strong>
                  </div>
                  <div class="col-md-1 my-auto">
                    <img src="../attachment/img/<?php echo $rowPeminjam['foto'];?>" style="height:3em; width:3em; border-radius:50%;" alt="">
                  </div>
                  <div class="col-md-7 pl-5 my-auto">
                    <div class="container-fluid p-0">
                      <div class="row">
                        <div class="col-md-12">
                        <?php 
                          $resultUser=user($con, $rowPeminjam["peminjam"]);
                          $rowUser=mysqli_fetch_assoc($resultUser);
                        ?>
                          <strong class="nama"><?php echo $rowUser["nama"];
                          if($rowPeminjam["level"]=="mahasiswa"){
                            echo " (".tampilKelas($con, $rowPeminjam["id_user"]).")";
                          }
                          ?>
                          </strong>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-auto">
                          <small>
                            <i class="far fa-calendar-alt text-secondary"></i>
                            <span class="pl-1 text-muted tanggalPinjam"><?php echo tampilTanggal($rowPeminjam["waktu_pinjam"]);?></span>
                          </small>
                        </div>
                        <div class="col-md-auto">
                          <small>
                            <i class="far fa-clock text-secondary"></i>
                            <span class="pl-1 text-muted waktuMulai"><?php echo tampilWaktu($rowPeminjam["waktu_mulai"]);?></span>
                          </small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 my-auto pl-0">
                    <h4 class="kodeRuang"><?php echo $rowPeminjam["kode"];?></h4>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="bungkus label p-0">
                  <?php
                  if($rowPeminjam["status_dipinjam"]=="dipinjam"){
                    ?>
                    <label class="bg-success text-white rounded-bottom text-center caption-label">
                      <small class="pesan">Pesan</small>
                    </label>
                    <?php
                  }else if($rowPeminjam["status_dipinjam"]=="kosong"){
                    ?>
                    <label class="bg-danger text-white rounded-bottom text-center caption-label">
                      <small class="selesai">Selesai</small>
                    </label>
                    <?php
                  }
                  ?>                    
                  </div>
                </div>
              </div>
            </div>
          <?php
            $no++;
            }
          }else{
            ?>
            <div class="col-md-12 p-2 text-center">
              <p class="text-muted">Username, Kelas atau Ruangan tidak dapat ditemukan</p>
            </div>
            <?php
          }
          ?>
          <!-- End loop -->
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-6 p-0">
  <div class="container-fluid m-0 p-0">
    <div class="row">
      <div class="col-md-12">
        <div class="m-2 p-3 bg-white rounded shadow-sm">
          <h6 class="border-bottom border-gray pb-2 mb-0">Daftar Ruangan</h6>
          <div class="pt-3">
              <div class="container-fluid pl-2">
                <div class="row">
                  <div class="col-1 p-0 text-center">
                    <strong>Hari</strong>
                  </div>

                  <div class="col-11 p-0">
                    <div class="btn-group-toggle d-flex justify-content-around" data-toggle="buttons">
                      <label class="btn btn-outline-dark btn-hari active">
                        <input type="radio" name="hari" value="senin" class="hari" id="senin" autocomplete="off" checked> Senin
                      </label>
                      <label class="btn btn-outline-dark btn-hari">
                        <input type="radio" name="hari" value="selasa" id="selasa" autocomplete="off">Selasa
                      </label>
                      <label class="btn btn-outline-dark btn-hari">
                        <input type="radio" name="hari" value="rabu" id="rabu" autocomplete="off"> Rabu
                      </label>
                      <label class="btn btn-outline-dark btn-hari">
                        <input type="radio" name="hari" value="kamis" id="kamis" autocomplete="off"> Kamis
                      </label>
                      <label class="btn btn-outline-dark btn-hari">
                        <input type="radio" name="hari" value="jumat" id="jumat" autocomplete="off"> Jumat
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-1 p-0 text-center">
                    <strong>Jam</strong>
                  </div>
                  <div class="col-2 text-center p-0 pl-2">
                    <select class="optionJam" name="jam" id="jamKelasKosongAdmin">
                      <option value="07:00:00">07.00</option>
                      <?php
                      $jam = tampilJam($con);
                      while ($row = mysqli_fetch_array($jam)) {
                        ?>
                        <option value=<?php echo tampilWaktuDefault($row["waktu_mulai"]) ?>><?php echo tampilWaktu($row["waktu_mulai"]) ?></option>
                      <?php
                    }
                    ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <input type="button" name="cari" class="btn btn-success btn-cari" value="Cari" id="cariKelasKosongAdmin">
                  </div>
                </div>

            <div class="row pr-1 mt-2 scrollbar scrollbar-x" id="daftar-ruangan">

              <?php
              $resultKelasKosong = kelasKosong($con, '07:00:00', 'senin');
              if (mysqli_num_rows($resultKelasKosong) > 0) {
                while ($row = mysqli_fetch_assoc($resultKelasKosong)) {
                  $id_info_kelas_kosong = $row["id_info_kelas_kosong"];
                  if ($row["status_dipinjam"] == "kosong") {
                    ?>
                    <div class="col-md-6 p-2">
                      <div class="p-3 ruang rounded">
                        <form action="../process/proses_kelasKosong.php?act=pesan&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
                          <div class="row d-flex align-items-center">
                            <div class="col-7 text-left">
                              <strong><span class="p-0 m-0 kelas"><?php echo $row["kode_ruang"]; ?></span></strong>
                              <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $row["lantai"] . ")"; ?></span>
                              <br>
                              <strong><?php echo tampilWaktu($row["waktu_mulai"]) . " - " . tampilWaktu($row["waktu_selesai"]) ?></strong>
                            </div>
                            <div class="col-5 text-right">
                              <button type="submit" name="pesan" class="btn btn-pesan p-1 bg-blue text-white">Pesan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                <?php
              } else if ($row["status_dipinjam"] == "dipinjam") {
                ?>
                  <div class="col-md-6 p-2">
                      <div class="p-3 ruang rounded container-fluid">
                          <div class="row d-flex align-items-center">
                            <div class="col-7 text-left">
                              <strong><span class="p-0 m-0 kelas"><?php echo $row["kode"]; ?></span></strong>
                              <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . $row["lantai"] . ")"; ?></span>
                              <br>
                              <strong><?php echo tampilWaktu($row["waktu_mulai"]) . " - " . tampilWaktu($row["waktu_selesai"]) ?></strong>
                            </div>
                          </div>
                      </div>
                    </div>
                <?php
              }
            }
          } else {
            ?><div class="col-12 text-center mt-3"><strong>Tidak ada ruang yang kosong</strong></div><?php
          }
          mysqli_close($con);

          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="m-2 p-3 bg-white rounded shadow-sm">
      <h6 class="border-bottom border-gray pb-2 mb-0">Ruangan Dipesan</h6>
      <div class="row p-2">

        <div id="carouselExampleControls" class="carousel slide col-md-12 m-0 p-0" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active m-0 pl-2 pr-2">
              <div class="col-md-6 p-2" id="ruang-dipesan">
                <div class="p-3 ruang rounded">
                  <div class="row align-items-center">
                    <div class="col-7 text-left">
                      <strong><span class="p-0 m-0 kelas"><?php echo "LPR 1" ?></span></strong>
                      <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . "1" . ")"; ?></span>
                      <br>
                      <strong><?php echo "08.00" . " - " . "10.000" ?></strong>
                    </div>
                    <div class="col-5 text-right">
                      <h5><?php echo "Jumat"; ?></h5>
                      <button class="btn btn-danger btn-checkout text-white" data-toggle="modal" data-target="#modalCheckout">Checkout</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 p-2" id="ruang-dipesan">
                <div class="p-3 ruang rounded">
                  <div class="row align-items-center">
                    <div class="col-7 text-left">
                      <strong><span class="p-0 m-0 kelas"><?php echo "LPR 1" ?></span></strong>
                      <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . "1" . ")"; ?></span>
                      <br>
                      <strong><?php echo "08.00" . " - " . "10.000" ?></strong>
                    </div>
                    <div class="col-5 text-right">
                      <h5><?php echo "Jumat"; ?></h5>
                      <button class="btn btn-danger btn-checkout text-white" data-toggle="modal" data-target="#modalCheckout">Checkout</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item active m-0 pl-2 pr-2">
              <div class="col-md-6 p-2" id="ruang-dipesan">
                <div class="p-3 ruang rounded">
                  <div class="row align-items-center">
                    <div class="col-7 text-left">
                      <strong><span class="p-0 m-0 kelas"><?php echo "LPR 1" ?></span></strong>
                      <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . "1" . ")"; ?></span>
                      <br>
                      <strong><?php echo "08.00" . " - " . "10.000" ?></strong>
                    </div>
                    <div class="col-5 text-right">
                      <h5><?php echo "Jumat"; ?></h5>
                      <button class="btn btn-danger btn-checkout text-white" data-toggle="modal" data-target="#modalCheckout">Checkout</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 p-2" id="ruang-dipesan">
                <div class="p-3 ruang rounded">
                  <div class="row align-items-center">
                    <div class="col-7 text-left">
                      <strong><span class="p-0 m-0 kelas"><?php echo "LPR 1" ?></span></strong>
                      <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . "1" . ")"; ?></span>
                      <br>
                      <strong><?php echo "08.00" . " - " . "10.000" ?></strong>
                    </div>
                    <div class="col-5 text-right">
                      <h5><?php echo "Jumat"; ?></h5>
                      <button class="btn btn-danger btn-checkout text-white" data-toggle="modal" data-target="#modalCheckout">Checkout</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="carousel-item m-0 pl-2 pr-2 col-md-12">
                <div class="row">
                  <div class="col-md-6 p-2" id="ruang-dipesan">
                    <div class="p-3 ruang rounded">
                      <div class="row align-items-center">
                        <div class="col-7 text-left">
                          <strong><span class="p-0 m-0 kelas"><?php echo "LPR 1" ?></span></strong>
                          <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . "1" . ")"; ?></span>
                          <br>
                          <strong><?php echo "08.00" . " - " . "10.000" ?></strong>
                        </div>
                        <div class="col-5 text-right">
                          <h5><?php echo "Jumat"; ?></h5>
                          <button class="btn btn-danger btn-checkout text-white" data-toggle="modal" data-target="#modalCheckout">Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 p-2" id="ruang-dipesan">
                    <div class="p-3 ruang rounded">
                      <div class="row align-items-center">
                        <div class="col-7 text-left">
                          <strong><span class="p-0 m-0 kelas"><?php echo "LPR 1" ?></span></strong>
                          <span class="text-secondary lantai pl-1 pt-3"><?php echo "(Lantai " . "1" . ")"; ?></span>
                          <br>
                          <strong><?php echo "08.00" . " - " . "10.000" ?></strong>
                        </div>
                        <div class="col-5 text-right">
                          <h5><?php echo "Jumat"; ?></h5>
                          <button class="btn btn-danger btn-checkout text-white" data-toggle="modal" data-target="#modalCheckout">Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->


          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <small><span class="carousel-control-prev-icon" aria-hidden="true"></span></small>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <small><span class="carousel-control-next-icon" aria-hidden="true"></span></small>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
</div>

<!-- Modal -->
<form action="../process/proses_kelasKosong.php?module=kelasKosong&act=checkout&id=<?php echo $id_info_kelas_kosong; ?>" method="post">
  <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body pt-5 text-center">
          <strong>Apakah Anda yakin?</strong>
        </div>
        <div class="pb-4 pt-4 d-flex justify-content-around">
          <button type="button" class="btn btn-danger btn-confirm" data-dismiss="modal">Tidak</button>
          <button type="submit" name="checkout" class="btn btn-success btn-confirm">Ya</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- End Modal -->