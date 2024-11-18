<?php
    require_once('lib/lib.php');
    $get = $buku->getData();
?>


<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perpustakaan SKANSA</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <style>
        * {

            font-family: "Poppins", sans-serif;
            font-style: normal;
        }

        .custom-hr {
            width: 35%;
            border: 2px solid #000000;
            margin: 20px auto;
            border-radius: 50px;
        }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <nav class="navbar bg-body-tertiary bg-dark">
                <div class="container">
                    <a class="navbar-brand text-white fw-bold d-flex align-items-center" href="#">
                        <img src="https://www.smkn1purwosari.sch.id/public/img/fav.png" alt="Logo" width="50px"
                            class="me-2">
                        <div>
                            <span class="d-block" style="font-size: 1.1rem;">Perpustakaan</span>
                            <span class="d-inline" style="font-size: 1.1rem; letter-spacing: .06rem;">SMKN 1
                                Purwosari</span>
                        </div>
                    </a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 bg-dark text-light" type="search" placeholder="Cari buku"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <center>
                        <h2 class="mt-3 fw-bold">Tambah Buku</h2>
                    </center>
                    <hr class="custom-hr">
                    <form action="lib/process/tambah.php" method="post" class="needs-validation" novalidate>
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul..." required>
                        <div class="invalid-feedback">
                            Judul tidak boleh kosong.
                        </div>
                        <br>

                        <label>Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" placeholder="Masukkan Pengarang..."
                            required>
                        <div class="invalid-feedback">
                            Pengarang tidak boleh kosong.
                        </div>
                        <br>

                        <label>Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit..." required>
                        <div class="invalid-feedback">
                            Penerbit tidak boleh kosong.
                        </div>
                        <br>

                        <label>Nomor Inventaris</label>
                        <input type="number" name="inventaris" class="form-control" placeholder="Masukkan No Inventaris..."
                            required>
                        <div class="invalid-feedback">
                            Nomor Inventaris tidak boleh kosong.
                        </div>
                        <br>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary">Tambah Data</button>
                        </div>
                    </form>
                    <br><br>
                    <!-- Daftar Buku -->
                    <center>
                        <h2 class="fw-bold">Daftar Buku</h2>
                    </center>
                    <hr class="custom-hr">

                    <table class="table shadow">
                        <tr class="bg-secondary text-white text-center fw-semibold">
                            <td>No</td>
                            <td>Judul</td>
                            <td>Pengarang</td>
                            <td>Penerbit</td>
                            <td>Nomor Inventaris</td>
                            <td>Action</td>
                        </tr>
                        <?php
                            foreach ($get as $data) {
                            @$no++;
                        ?>
                        <tr class="text-center">
                            <td><?php echo $no?></td>
                            <td><?php echo $data['judul']?></td>
                            <td><?php echo $data['pengarang']?></td>
                            <td><?php echo $data['penerbit']?></td>
                            <td><?php echo $data['inventaris']?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editModal"
                                        class="btn btn-warning bt-ubah" data-id="<?php echo $data['id']?>"
                                        data-judul="<?php echo $data['judul']?>"
                                        data-pengarang="<?php echo $data['pengarang']?>"
                                        data-penerbit="<?php echo $data['penerbit']?>"
                                        data-inventaris="<?php echo $data['inventaris']?>">Ubah</a>

                                    <a href="lib/process/delete.php?id=<?php echo $data['id']?>" type="button"
                                        class="btn btn-danger rounded-end" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Hapus
                                    </a>


                                </div>
                            </td>
                        </tr>

                        <?php
                        }
                    ?>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <!-- Modal Hapus Data -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data buku?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>

                        <a href="lib/process/delete.php?id=<?php echo $data['id']?>">
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </a>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Edit Data -->
        <div class="modal fade" tabindex="-1" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content shadow-lg">
                    <div class="modal-header">
                        <h5 class="modal-title fw-semibold">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="lib/process/edit.php" method="post">
                        <div class="modal-body">
                            <label>Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control">
                            <br>
                            <label>Pengarang</label>
                            <input type="text" name="pengarang" id="pengarang" class="form-control">
                            <br>
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" class="form-control">
                            <br>
                            <label>Nomor Inventaris</label>
                            <input type="number" name="inventaris" id="inventaris" class="form-control">
                            <input type="hidden" id="id_buku" class="form-control" name="id_buku">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="bg-dark text-light pt-5 pb-4">
            <div class="container text-center text-md-start">
                <div class="row">

                    <!-- Kolom pertama -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                        <h5 class="text-uppercase fw-semibold mb-4 text-warning">Perpustakaan SKANSA</h5>
                        <p>Perpustakaan SMKN 1 PURWOSARI menyediakan berbagai buku yang bisa dibaca di Perpustakaan dan juga
                            saat Perpustakaan Keliling.</p>
                    </div>

                    <!-- Kolom kedua -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h5 class="text-uppercase fw-semibold mb-4 text-warning">Buku</h5>
                        <p><a href="#" class="text-light text-decoration-none">Fiksi</a></p>
                        <p><a href="#" class="text-light text-decoration-none">NonFiksi</a></p>
                        <p><a href="#" class="text-light text-decoration-none">Sejarah</a></p>
                        <p><a href="#" class="text-light text-decoration-none">Education</a></p>
                    </div>

                    <!-- Kolom ketiga -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h5 class="text-uppercase fw-semibold mb-4 text-warning">Team Work</h5>
                        <p><a href="#" class="text-light text-decoration-none">Genlord</a></p>
                        <p><a href="#" class="text-light text-decoration-none">GLS</a></p>
                        <p><a href="#" class="text-light text-decoration-none">Osis</a></p>
                    </div>

                    <!-- Kolom keempat -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h5 class="text-uppercase fw-semibold mb-4 text-warning">Contact</h5>
                        <p>
                            <i class="bi bi-geo-alt m-1"></i>Jl. Raya Purwosari No. 1, Kec Purwosari, Kab Pasuruan, Jawa
                            Timur 67162
                        </p>
                        <p><i class="bi bi-envelope m-1"></i>info@smkn1purwosari.sch.id</p>
                        <p>
                            <i class="bi bi-telephone m-1"></i>(0343) 613747
                        </p>

                    </div>
                </div>
            </div>

            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                &copy; 2024 SkansaLibrary. All Rights Reserved.
            </div>
        </footer>
        <!-- end of modal edit data -->

        <!-- Kumpulan Script JavaScript -->
        <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.bt-ubah').click(function() {
                    var id_buku = $(this).data('id');
                    var judul = $(this).data('judul');
                    var pengarang = $(this).data('pengarang');
                    var penerbit = $(this).data('penerbit');
                    var inventaris = $(this).data('inventaris');


                    $("#judul").val(judul);
                    $("#pengarang").val(pengarang);
                    $("#penerbit").val(penerbit);
                    $("#inventaris").val(inventaris);
                    $("#id_buku").val(id_buku);
                });
            });
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    var forms = document.getElementsByClassName('needs-validation');
                    Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>

</html>