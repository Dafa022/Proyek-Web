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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="site-wrap">

<div class="site-section" data-aos="fade">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
            <?php
                // Check if FotoID is provided via GET
                $fotoID = isset($_GET['FotoID']) ? mysqli_real_escape_string($con, $_GET['FotoID']) : null;

                if ($fotoID) {
                    // Query to get photo details
                    $query = "SELECT JudulFoto, DeskripsiFoto, LokasiFoto FROM foto WHERE FotoID = '$fotoID'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $foto = mysqli_fetch_assoc($result);
                        // Display photo details
                        echo "<div class='foto-detail'>";
                        echo "<h2 class='text-center'>{$foto['JudulFoto']}</h2>";
                        echo "<img src='uploads/{$foto['LokasiFoto']}' class='img-fluid mb-3' alt='foto'>";
                        echo "<p>{$foto['DeskripsiFoto']}</p>";
                        echo "</div>";
                    } else {
                        echo "<p>foto not found.</p>";
                    }
                } else {
                    echo "<p>No foto selected.</p>";
                }
                ?>

            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>