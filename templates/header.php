<?php

    session_start();
    if($_SERVER['QUERY_STRING']=='noname'){
        unset($_SESSION['name']);
    }
    
    $name= $_SESSION['name'] ?? 'Guest'; //null coalescing


    //get cookie
    $status = $_COOKIE['status'] ?? 'someone';
?>
<head>
    <title>Zany's Company</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type = "text/css">
        .brand{
            background: #546e7a !important;
        }
        .brand-text{
            color:#546e7a !important;  
        }
        form{
            max-width:460px;
            margin:20px auto;
            padding: 20px;
        }
        .employee{
            width:100px;
            margin:40px auto -30px;
            display:block;
            position:relative;
            top:-30px;
        }

    </style>
</head>
    <body class="black lighten-4">
        <nav class="black z-depth-0">
            <div class="container">
                <a href="index.php" class="brand-logo brand-text ">Zany's Company</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <li class="grey-text">Heloo <?php echo htmlspecialchars($name);?></li>
                    <li class="grey-text">(<?php echo htmlspecialchars($status);?>)</li>
                    <li><a href="add.php" class="btn brand z-depth-0">Add an employee</a></li>
                </ul>
            </div>
        </nav>
