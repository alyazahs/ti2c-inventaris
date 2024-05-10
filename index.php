<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata | Politeknik Negeri Madiun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #d5bdaf;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        header h3 {
            margin: 0;
            font-size: 1.5em;
        }

        h4 {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            text-align: center;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        nav ul li a:hover {
            background-color: #eee;
        }

        p {
            margin: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #d0e9c6;
            color: #3c763d;
            text-align: center;
        }

        p.error {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
    </style>
</head>

<body>
    <header>
         <h1>SELAMAT DATANG</h1>
         <h3>DATA BARANG</h3>
    </header>

    <h4>Menu</h4>
    <nav>
        <ul>
            <li><a href="input-data.php">Tambah Data</a></li>
            <li><a href="data-barang.php">List Data</a></li>
        </ul>
    </nav>
    <?php if(isset($_GET['status'])): ?>
        <p>
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "Penambahan Data Barang Berhasil!";
                } else {
                    echo "Pendataan gagal!";
                }
            ?>
        </p>
    <?php endif; ?>
    </body>
</html>