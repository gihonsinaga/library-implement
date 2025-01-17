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
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
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
                    <li><a><i class="fa fa-home"></i>Home</a></li>
                    <li>
                        <a href="produk.php"><i class="fa fa-cube"></i> Produk</a>
                    </li>
                    </li>
                    <li>
                        <a href="pembelian.php"><i class="fa fa-shopping-basket"></i> Pembelian</a>
                    </li>
                    </li>
                    <li>
                        <a href="peminjaman.php"><i class="fa fa-cube"></i> Peminjaman</a>
                    </li>
                    </li>
                    <li><a href="member.php"><i class="fas fa-user-alt"></i> Member</a></li>
                </ul>
            </menu>
        </aside>
        <section class="content">
        <div id="editor">
                        <form action="produk.php" method="POST">
                            <label for="id_member">ID Buku</label>
                            <input type="number" id="fname" name="id_buku"><br><br>
                            <label for="judul">Judul</label>
                            <input type="text" id="lname" name="judul"><br><br>
                            <label for="genre">Genre</label>
                            <input type="text" id="lname" name="genre"><br><br>
                            <label for="harga">Harga</label>
                            <input type="number" id="lname" name="harga"><br><br>
                            <label for="tgl_terbit">Tanggal Terbit</label>
                            <input type="date" id="lname" name="tgl_terbit"><br><br>
                            <label for="penerbit">Penerbit</label>
                            <input type="text" id="lname" name="penerbit"><br><br>
                            <label for="review">Review</label>
                            <textarea name="review"></textarea>
                <script>
                        CKEDITOR.replace( 'review' );
                </script>
                            <input type="submit" value="Submit">
                          </form>
                </div>
        </section>
    </div>
</body>
<script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>
</html>
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