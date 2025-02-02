<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header("Location: index.php");
    exit();
}
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Photo Gallery</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-between" id="alimeNav">
                        <a class="nav-brand"><img src="./img/core-img/logo.png" alt=""></a>
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        <div class="classy-menu">
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="./dashboard.php">Home</a></li>
                                    <li><a href="./upload1.php">Upload</a></li>
                                    <li><a href="index.php">Login</a></li>
                                </ul>
                                <div class="search-icon" data-toggle="modal" data-target="#searchModal"><i class="ti-search"></i></div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Gallery Area Start -->
    <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3>Foto yang Telah Diupload</h3>
                </div>
            </div>

            <div class="row alime-portfolio">
                <?php
                $query = "SELECT 
                            foto.FotoID, 
                            foto.JudulFoto, 
                            foto.DeskripsiFoto, 
                            foto.TanggalUnggah, 
                            foto.LokasiFoto, 
                            album.NamaAlbum, 
                            user.NamaLengkap, 
                            (SELECT COUNT(*) FROM likefoto WHERE likefoto.FotoID = foto.FotoID) AS JumlahLike, 
                            (SELECT COUNT(*) FROM komentarfoto WHERE komentarfoto.FotoID = foto.FotoID) AS JumlahKomentar
                        FROM foto
                        INNER JOIN album ON foto.AlbumID = album.AlbumID
                        INNER JOIN user ON foto.UserID = user.UserID";

                $result = mysqli_query($con, $query);

                if (!$result) {
                    die("Query Error: " . mysqli_error($con));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 col-sm-6 col-lg-3 single_gallery_item mb-30 wow fadeInUp' data-wow-delay='100ms'>
                            <div class='single-portfolio-content'>
                                <img src='uploads/{$row['LokasiFoto']}' alt='{$row['JudulFoto']}'>
                                <div class='hover-content'>
                                    <h5>{$row['JudulFoto']}</h5>
                                    <p>{$row['DeskripsiFoto']}</p>
                                    <p><strong>Tanggal:</strong> {$row['TanggalUnggah']}</p>
                                    <p><strong>Album:</strong> {$row['NamaAlbum']}</p>
                                    <p><strong>User:</strong> {$row['NamaLengkap']}</p>
                                    <p><strong>Likes:</strong> {$row['JumlahLike']} | <strong>Komentar:</strong> {$row['JumlahKomentar']}</p>
                                    <a href='edit.php?id={$row['FotoID']}' class='btn btn-primary'>Edit</a>
                                    <a href='delete.php?id={$row['FotoID']}' onclick='return confirmDelete()' class='btn btn-danger'>Delete</a>
                                </div>
                            </div>
                        </div>";
                }
                ?>
            </div>

            <div class="row">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="200ms">
                    <a href="#" class="btn alime-btn btn-2 mt-15">View More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                        <div class="copywrite-text">
                            <p>&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
                        </div>
                        <div class="footer-logo">
                            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <div class="social-info">
                            <a href="#"><i class="ti-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-twitter-alt" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alime.bundle.js"></script>
    <script src="js/default-assets/active.js"></script>

    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus foto ini?");
        }
    </script>
</body>

</html>
