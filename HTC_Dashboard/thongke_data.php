<?php
require_once 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        }

        .col-lg-12 {
            position: relative;
            width: 100%;
            padding-right: 5px;
            padding-left: 5px;
        }

        .container
        {
            width: 100%;
            padding-right: 0px;
            padding-left: 0px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
    <title>HTC Gear Store</title>
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danhsach':
                require_once 'thongke/danhsach.php';
                break;


            default:
                require_once 'thongke/danhsach.php';
                break;
        }
    } else {
        require_once 'thongke/danhsach.php';
    }
    ?>

</body>

</html>