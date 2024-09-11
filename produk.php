<?php
    include "includes/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>admin Template</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <script>

        tinymce.init({
            selector: 'textarea#basic-example',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });


    </script>
    <style>
    body {

        font-family: 'Quicksand', sans-serif;
    }

    .wrapper {
        width: 100%;
        height: 100%;
    }

    .navbar {
        margin-bottom: 0;
    }

    .sidebar {
        width: 100%;
        height: 100%;
        background: #293949;
        position: absolute;
        z-index: 100;
    }

    ul {
        padding: 0;
        margin-left: -40px;
    }

    ul li {
        list-style: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.5);
    }

    ul li a {
        text-decoration: none;
        color: #aeb2b7;
        display: block;
        padding: 19px 0px 18px 25px;
        transition: all 200ms ease-in;
    }

    ul li a:hover {
        text-decoration: none;
        color: #1abc9c;
    }

    ul li a:visited {
        text-decoration: none;
        color: #fff;
    }

    li li a span {
        display: inline-block;
    }

    ul ul {
        display: none;
        margin: 0px;
    }

    ul li a .fa-angle-down {
        margin-right: 10px;
    }

    /*apabila lebar min 768px*/
    @media(min-width: 768px) {
        .sidebar {
            width: 240px;
        }

        .content {
            margin-left: 250px;
        }

        .inner {
            padding: 15px;
        }
    }
</style>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">XXX Library</a>
            </div>
        </nav>
        <aside class="sidebar">
            <menu>
            <ul class="menu-content">
                    <li><a href="admin.php"><i class="fa fa-home"></i>Home</a></li>
                    <li>
                        <a href="produk.php"><i class="fa fa-cube"></i> Produk</a></li>
                    </li>
                    <li>
                        <a href="pembelian.php"><i class="fa fa-shopping-basket"></i> Pembelian</a></li>
                    </li>
                    <li>
                        <a href="peminjaman.php"><i class="fa fa-cube"></i> Peminjaman</a></li>
                    </li>
                    <li><a href="member.php"><i class="fas fa-user-alt"></i> Member</a></li>
                </ul>
            </menu>
        </aside>
        <section class="content">
            <div class="inner">
                <p>
                <?php
                                        $query = "SELECT * FROM stok_buku";
                                        $hasil = mysqli_query($koneksi, $query);

                                        echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        echo "<th>Username</th><th>Password</th><th>Nama</th><th>Email</th>";
                                        echo "</tr>";

                                        foreach ($hasil as $data) {
                                            echo "<tr>";
                                            echo "<td>$data[id_buku]</td>";
                                            echo "<td>$data[judul]</td>";
                                            echo "<td>$data[genre]</td>";
                                            echo "<td>$data[harga]</td>";
                                            echo "<td>$data[pengarang]</td>";
                                            echo "<td>$data[tgl_terbit]</td>";
                                            echo "<td>$data[penerbit]</td>";

                                            echo "<td><form method='POST' action='ubah.php'>
                                            <input hidden type='text' name='id' value=". $data['id_buku'] .">
                                            <button type='submit' name='btnUpdate' class='btn btn-success'>Update</button></form></td>";

                                            echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\" method='POST'>";
                                            echo "<input hidden name='id' type='text' value=$data[id_buku]>";
                                            echo "<button type='submit' name='btnHapus' class='btn btn-danger';>Delete</button></form></td>";


                                            echo "</tr>";
                                        }

                                        echo "</table>";
                                    ?>

                                    <?php
                                        if(isset($_POST['btnHapus'])){

                                    
                                        $id=$_POST['id_buku'];

                                        if ($koneksi){
                                            $sql = "DELETE FROM stok_buku WHERE id_buku=$id";
                                            mysqli_query($koneksi,$sql);
                                            echo "<p class='alert alert-success text-center'><b>Data Akun Berhasil Dihapus.</b></p>";
                                        } elseif ($koneksi->connect_error){
                                            echo "<p class='alert alert-danger text-center><b>Data gagal dihapus. Terjadi kesalahan: ". $koneksi->connect_error. "</b></p>";
                                        }
                                    }
                                   ?>
                </p>
                <textarea id="basic-example">
    <p><img style="display: block; margin-left: auto; margin-right: auto;" title="Tiny Logo" src="https://www.tiny.cloud/docs/images/logos/android-chrome-256x256.png" alt="TinyMCE Logo" width="128" height="128" /></p>
    <h2 style="text-align: center;">Welcome to the TinyMCE editor demo!</h2>
  
    <h2>Got questions or need help?</h2>
  
    <ul>
      <li>Our <a href="https://www.tiny.cloud/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>
      <li>Have a specific question? Try the <a href="https://stackoverflow.com/questions/tagged/tinymce" target="_blank" rel="noopener"><code>tinymce</code> tag at Stack Overflow</a>.</li>
      <li>We also offer enterprise grade support as part of <a href="https://www.tiny.cloud/pricing">TinyMCE premium plans</a>.</li>
    </ul>
  
    <h2>A simple table to play with</h2>
  
    <table style="border-collapse: collapse; width: 100%;" border="1">
      <thead>
        <tr>
          <th>Product</th>
          <th>Cost</th>
          <th>Really?</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>TinyMCE</td>
          <td>Free</td>
          <td>YES!</td>
        </tr>
        <tr>
          <td>Plupload</td>
          <td>Free</td>
          <td>YES!</td>
        </tr>
      </tbody>
    </table>
  
    <h2>Found a bug?</h2>
  
    <p>
      If you think you have found a bug please create an issue on the <a href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.
    </p>
  
    <h2>Finally ...</h2>
  
    <p>
      Don't forget to check out our other product <a href="http://www.plupload.com" target="_blank">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.
    </p>
    <p>
      Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br>All the best from the TinyMCE team.
    </p>
  </textarea>
            </div>
        </section>
    </div>
</body>

</html>
