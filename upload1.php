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
    <title>PixMa</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/icon2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <nav class="classy-navbar justify-content-between" id="alimeNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="./dashboard.php"><img src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="./dashboard.php">Home</a></li>
                                    <li><a href="./upload1.php">Upload</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Upload Photo Section -->
    <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <p style="text">Selamat Datang <?php echo htmlspecialchars($_SESSION['Username']); ?>
                    <h3>Unggah Foto Baru</h3>
                    <form action="upload.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <label for="judul">Judul Foto:</label>
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan judul foto" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Foto:</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control" placeholder="Masukkan deskripsi foto" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal Unggah:</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="foto">Upload Foto:</label>
                            <input type="file" id="foto" name="foto" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="album">Album:</label>
                            <select name="album" id="album" class="form-control" required>
                                <?php
                                $query = "SELECT * FROM album";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['AlbumID']}'>{$row['NamaAlbum']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn alime-btn btn-2 mt-15">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Upload Photo Section End -->

    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                        <div class="copywrite-text">
                            <p>&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Template by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
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
    <!-- Footer Area End -->

    <!-- JS Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/alime.bundle.js"></script>
    <script src="js/default-assets/active.js"></script>
</body>

</html>
