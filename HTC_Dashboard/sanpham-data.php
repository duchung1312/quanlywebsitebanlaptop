<?php
include_once 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="./img/favicon.png">
    <style>
        label {
            font-weight: 500;
        }

        .card input[type="search"] {
            margin-right: -6px;
        }

        .card input[type="search"]:focus,
        .card-header button:focus {
            box-shadow: none !important;
        }

        .card-header button {
            width: 141px;
        }

        .card-header .btn-danger {
            margin-right: 2rem;
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .card-header .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary {
            margin-left: 2rem;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .table .thead-dark th {
            /* text-align: center; */
            color: #fff;
            background-color: #343a40;
            border-color: #454d55;
        }

        .card .card-header {
            padding: 30px 20px 0;
            z-index: 3;
            border-bottom: 0px !important;
            background-color: #fff;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
            padding-top: 40px;
        }
    </style>
    <title>HTC Gear Store</title>
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danhsach':
                require_once 'sanpham/danhsach.php';
                break;

            case 'them':
                require_once 'sanpham/them.php';
                break;

            case 'sua':
                require_once 'sanpham/sua.php';
                break;

            default:
                require_once 'sanpham/danhsach.php';
                break;
        }
    } else {
        require_once 'sanpham/danhsach.php';
    }
    ?>
</body>

</html>