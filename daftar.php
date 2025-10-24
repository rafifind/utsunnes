<html>
    <head>
        <title>::Data Registrasi::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-size: cover;
                background-image: url("https://cdn.arstechnica.net/wp-content/uploads/2023/06/bliss-update-1440x960.jpg");
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 20px;
            }
            .container{
                background-color: white;
                border: 3px solid grey;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 600px;
                width: 100%;
            }
            h1{
                text-align: center;
                color: #333;
                margin-bottom: 30px;
                font-size: 28px;
            }
            .success-message{
                background-color: #d4edda;
                color: #155724;
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            .error-message{
                background-color: #f8d7da;
                color: #721c24;
                padding: 20px;
                margin-bottom: 20px;
                border: 1px solid #f5c6cb;
                border-radius: 5px;
                text-align: center;
                font-weight: bold;
            }
            table{
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td{
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th{
                background-color: #f8f9fa;
                font-weight: bold;
                color: #333;
                width: 30%;
            }
            td{
                color: #666;
            }
            .back-button{
                text-align: center;
                margin-top: 20px;
            }
            .back-button a{
                background-color: #007bff;
                color: white;
                padding: 12px 24px;
                text-decoration: none;
                border-radius: 5px;
                display: inline-block;
                transition: background-color 0.3s;
            }
            .back-button a:hover{
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Data Registrasi User</h1>
            
            <?php if (isset($_POST['submit'])): 
                $nama_depan    = htmlspecialchars($_POST['nama_depan'] ?? '');
                $nama_belakang = htmlspecialchars($_POST['nama_belakang'] ?? '');
                $asal_kota     = htmlspecialchars($_POST['asal_kota'] ?? '');
                $umur_raw      = $_POST['umur'] ?? '';

                $umur_valid = filter_var($umur_raw, FILTER_VALIDATE_INT);
                if ($umur_valid === false || $umur_valid < 10):
            ?>
                <div class="error-message">
                    X Error!<br>
                    Umur harus minimal 10 tahun!
                </div>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
            <?php
            else:
                    $umur = $umur_valid;
                    $nama_lengkap = strtoupper(trim($nama_depan . ' ' . $nama_belakang));
                    $kota_upper   = strtoupper($asal_kota);
            ?>
                <div class="success-message">
                    Registrasi Berhasil!
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">No</th>
                            <th style="width: 45%;">Nama Lengkap</th>
                            <th style="width: 15%;">Umur</th>
                            <th style="width: 30%;">Asal Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i = 2; $i <= $umur; $i += 2) {
                                if ($i === 4 || $i === 8) continue;
                                echo '<tr>';
                                echo '<td>' . $i . '</td>';
                                echo '<td>' . $nama_lengkap . '</td>';
                                echo '<td>' . $umur . ' tahun</td>';
                                echo '<td>' . $kota_upper . '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <div class="back-button">
                    <a href="index.html">Kembali ke Form Registrasi</a>
                </div>
                <?php endif; else: ?>
                <div style="text-align: center; color: #dc3545; padding: 20px;">
                    <h3>Error: Data tidak ditemukan</h3>
                    <p>Silakan isi form registrasi terlebih dahulu.</p>
                    <div class="back-button">
                        <a href="index.html">Kembali ke Form Registrasi</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>
