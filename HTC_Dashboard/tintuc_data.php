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
            width: 140px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
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
            padding: 2.25rem;
            padding-top: 40px;
        }

        .btn-primary {
            margin-left: 2rem;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        textarea.form-control {
            min-height: calc(18.5em + (.75rem + 2px));
        }
    </style>
    <title>HTC Gear Store</title>
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danhsach':
                require_once 'tintuc/danhsach.php';
                break;
            case 'them':
                require_once 'tintuc/them.php';
                break;
            default:
                require_once 'tintuc/danhsach.php';
                break;
        }
    } else {
        require_once 'tintuc/danhsach.php';
    }
    ?>
</body>

</html>