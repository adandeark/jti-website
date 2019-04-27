<main id="adminBerita" role="main" class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="m-2 bg-white shadow-sm rounded">
                <div class="row">
                    <div class="col-md-auto pr-0">
                        <strong><span class="nav-link">Berita</span></strong>
                    </div>
                    <div class="col pl-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-2 m-0 bg-white">
                                <li class="breadcrumb-item"><a href="index.php?module=home">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Berita</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 p-0">
            <div class="m-2 p-3 bg-white rounded shadow-sm">
                <div class="col-md-12 p-0">
                    <div class="card border border-secondary">
                        <div class="card-header">
                            <strong>Buat Postingan Berita</strong>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" class="p-0">
                                <div class="form-group berita-utama">
                                    <input type="text" class="form-control border-0" name="berita-utama" placeholder="Berita Utama ..." style="width=100%">
                                </div>
                                <hr>
                                <div class="form-group ketik-berita">
                                    <textarea name="ketik-berita" id="" cols="30" rows="6" placeholder="Ketik Berita ..." maxlength="500" class="form-control border-0" oninput="Beritacharcountupdate(this.value)">
                                    </textarea> 
                                </div>
                                <div class="col-md-12 p-0">
                                        <span class="close">&times;</span>
                                        <p style="background-color:#CF212A; height: 30px; color: white;">&nbsp Pak Dimas.jpg (Gagal Upload) - Kapasitas gambar lebih dari 5 Mb</p>
                                    </div>
                                    <div class="col-md-12 p-0">
                                        <span class="close">&times;</span>
                                        <p style="background-color:#F5F5F5; height: 30px; margin-top: -10px;">&nbsp Pak Dimas.jpg</p>
                                    </div>
                                <hr>
                                <div class="container m-0">
                                    <div class="row">
                                        <div class="col-md-1"> <span style="color:grey" id=Bercharcount></span>
                                        </div>
                                        <div class="col-md-11 text-right d-flex justify-content-end lampir">
                                                    <label for="file-input">
                                                    <img src="../img/imgUpload.svg" alt="Image Upload" class="mr-3" data-placement="top" title="Lampirkan Gambar">
                                                    </label>
                                                    <input id="file-input" type="file" onchange="readURL(this,'Picture')" style="cursor: pointer;  display: none"/>
                                                    <label for="file-input1">
                                                    <img src="../img/fileUpload.svg" alt="File Upload" class="mr-3" data-placement="top" title="Lampirkan File">
                                                    </label>
                                                    <input id="file-input1" type="file" onchange="readURL(this,'Picture')" style="cursor: pointer;  display: none"/>
                                                    <strong><label for="kategori-AdBer" class="labelBerita mt-1 mr-2">Kategori :
                                                    </label></strong> 
                                                    <select name="" id="" class="mr-3 pilihKategoriBerita">
                                                        <option value="ridwan">Berita</option>
                                                        <option value="rudy">Pengumuman</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-success btn-kirim">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <form class="form-inline ml-4">
                        <i class="fas fa-search mr-2"></i>
                        <div class="col-2">
                                <div class="input-group date " id="datepicker">
                                    <input type="text" class="form-control" value="12/02/2012">
                                    <div class="input-group-addon tgl">
                                        <span>
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <button class="btn btn-success" type="submit">Cari</button>
                    </form>
                    <div class="scrolltable">
                        <table class="table table-striped table-bordered text-center mt-3">
                            <thead>
                                <tr class="p-2">
                                    <th>No</th>
                                    <th id="beritaBerita">Berita</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Tanggal Perubahan</th>
                                    <th>Komentar</th>
                                    <th colspan="2">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview1">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview2">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview3">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td class="text-left" data-toggle="modal" data-target="#preview">5 Dosen Dikirim ke Jepang</td>
                                    <td>20 Februari 2019</td>
                                    <td>25 Februari 2019</td>
                                    <td>10</td>
                                    <td><button class=" tmbl-table btn btn-primary" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#editModal"
                                            class="edit">Edit</button></td>
                                    <td><button class=" tmbl-table btn btn-danger" type="button"
                                            class="pratinjau btn" data-toggle="modal" data-target="#hapus"
                                            class="hapus">Hapus</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                </div>
                <div class='text-center'>
                        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                        <p class='text-muted'>Tidak ada berita pada "03 juni 2019"</p>
                    </div>
            </div>
        </div>
    </div>
    <!-- Modal Hapus -->
    <div class="modal fade hapusBerita-modal" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusTitle" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content konten-modal">
                <div class="modal-body ">
                    <h5 class="isiHapusBerita text-center">Apakah Anda Yakin?</h5>
                    <div class="tombolAksiHapusBerita text-center">
                        <button type="button" class="btn btn-tidak" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-iya">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview -->
    <div class="modal fade prevBer1" id="preview1" tabindex="-1" role="dialog" aria-labelledby="previewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><h5 class="modal-title">5 Dosen Dikirim Ke Jepang</h5></strong>
                </div>
                <div class="modal-body">
                    <p>
                        Dikarenakan dosen bernama : <br>
                        - Pak Yan <br>
                        - Pak Rosa <br>
                        - Pak Vipkas <br>
                        sedang di tugaskan ke jepang maka kelas yang diajar oleh dosen-dosen tersebut diharap segera menghubungi
                        untuk meminta tugas. <br><br>
                        Terima Kasih...
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-tutup" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Preview+Gambar -->
    <div class="modal fade prevBer2" id="preview2" tabindex="-1" role="dialog" aria-labelledby="previewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><h5 class="modal-title">5 Dosen Dikirim Ke Jepang</h5></strong>
                </div>
                <div class="modal-body">
                    <p>
                        Dikarenakan dosen bernama : <br>
                        - Pak Yan <br>
                        - Pak Rosa <br>
                        - Pak Vipkas <br>
                        sedang di tugaskan ke jepang maka kelas yang diajar oleh dosen-dosen tersebut diharap segera menghubungi
                        untuk meminta tugas. <br><br>
                        Terima Kasih...
                    </p>
                    <img class="img img-fluid img-responsive" width="20%" src="../attachment/img/yuri.png" alt="foto">
                    <img class="img img-fluid img-responsive" width="20%" src="../attachment/img/yuri.png" alt="foto">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-tutup" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Preview + File -->
    <div class="modal fade prevBer3" id="preview3" tabindex="-1" role="dialog" aria-labelledby="previewTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><h5 class="modal-title">5 Dosen Dikirim Ke Jepang</h5></strong>
                </div>
                <div class="modal-body">
                    <p>
                        Dikarenakan dosen bernama : <br>
                        - Pak Yan <br>
                        - Pak Rosa <br>
                        - Pak Vipkas <br>
                        sedang di tugaskan ke jepang maka kelas yang diajar oleh dosen-dosen tersebut diharap segera menghubungi
                        untuk meminta tugas. <br><br>
                        Terima Kasih...
                    </p>
                    <div class="row isi-download">
                    <div class="col-md-12">
                        <button class="btn btn-outline-dark download d-flex">
                            <div class="col-sm-7">
                                <a href=""><h6 class="mt-1">Dokumen Rahasia</h6></a>
                            </div>
                            <div class="col-sm-5 text-right">
                                <img src="../img/vector.svg" alt="Download button" class="">
                            </div>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-tutup" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</main>