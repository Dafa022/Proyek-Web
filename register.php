<?php
// Mulai sesi
session_start();

// Menyertakan koneksi ke database
include "koneksi.php";

// Proses saat tombol "register" ditekan
if (isset($_POST['register'])) {
    // Mengambil data dari form
    $NamaLengkap = mysqli_real_escape_string($con, $_POST['NamaLengkap']);
    $Username = mysqli_real_escape_string($con, $_POST['Username']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Password = !empty($_POST["Password"]) ? md5($_POST["Password"]) : null; // Encrypt password with MD5
    $Alamat = mysqli_real_escape_string($con, $_POST['Alamat']);

    // Validasi password
    if ($Password === null) {
        die("Password tidak boleh kosong!");
    }

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO user (NamaLengkap, Username, Email, Password, Alamat) 
            VALUES ('$NamaLengkap', '$Username', '$Email', '$Password', '$Alamat')";

    // Menjalankan query
    if (mysqli_query($con, $sql)) {
        $_SESSION['message'] = "Akun berhasil dibuat!";
        header("Location: index.php"); // Redirect ke halaman lain setelah sukses
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, rgb(220, 199, 40), rgb(244, 20, 0), rgb(0, 51, 255));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 500px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input, .form-group textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 4px rgba(52, 152, 219, 0.5);
        }
        .login-btn {
            width: 99.5%;
            padding: 15px;
            background: #fc6060;
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .login-btn:hover {
            background:rgba(104, 105, 105, 0.62);
        }
        .error, .success {
            text-align: center;
            font-size: 14px;
            margin-bottom: 15px;
            color: red;
        }
        .success {
            color: green;
        }
        .register a {
            text-decoration: none;
            color: #2980b9;
        }
        .register h4 {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Register</h2>
        
        <?php
        // Menampilkan pesan sukses
        if (isset($_SESSION['message'])):
        ?>
            <div class="success"><?php echo $_SESSION['message']; ?></div>
        <?php
            unset($_SESSION['message']);
        endif;

        // Menampilkan pesan error
        if (isset($_SESSION['error'])):
        ?>
            <div class="error"><?php echo $_SESSION['error']; ?></div>
        <?php
            unset($_SESSION['error']);
        endif;
        ?>

        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="NamaLengkap">Nama Lengkap</label>
                <input type="text" name="NamaLengkap" id="NamaLengkap" placeholder="Nama Lengkap" required />
            </div>

            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="Username" id="Username" placeholder="Username" required />
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" placeholder="Alamat Email" required />
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="Password" id="Password" placeholder="Password" required />
            </div>

            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea name="Alamat" id="Alamat" placeholder="Alamat Lengkap" rows="3" required></textarea>
            </div>

            <input type="submit" class="login-btn" name="register" value="Daftar" />

            <div class="register">
                <h4>Sudah Punya Akun? <a href="index.php">Login di Sini</a></h4>
            </div>
        </form>
    </div>
</body>
</html>

