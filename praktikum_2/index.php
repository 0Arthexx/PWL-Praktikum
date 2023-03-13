<?php
include_once 'db_utility/util_function.php';
include_once 'db_utility/genre_function.php';
include_once 'db_utility/book_function.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertemuan 1 & 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

</head>
<body>
    <style>
        .warna {
            background-color: #9ADCFF;
        }
        li {
            font-family: "Javanese Text";
        }
        .text {
            font-family: "Javanese Text";
            margin-top: 20px;
            margin-left: 10px;
        }

    </style>

    <nav class="navbar navbar-expand-lg sticky-top warna">
        <div class="container-fluid m-2">
            <img src="./src/logofixed.png" alt="" width="50">
            <h4 class="text" >BACA.KUY</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?menu=home"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?menu=genre"> Genre </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?menu=book"> Book </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <?php
        $navigation = filter_input(INPUT_GET, var_name: 'menu');
        switch ($navigation) {
            case 'home':
                include_once 'pages/home.php';
                break;
            case 'genre':
                include_once 'pages/genre.php';
                break;
            case 'book':
                include 'pages/book.php';
                break;
            case 'genre_update':
                include_once 'pages/genre_edit.php';
            default:
                include_once 'pages/home.php';
                break;
            }
            ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
</body>
</html>