<?php require_once '../../config/config.php';?>
<?php require_once '../../controlers/valida_sessao.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Deividi Merg">

    <title>DBSeller</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL;?>lib/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTable Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>lib/css/dataTables.css?p=<?php echo time();?>">
    <!-- DataTimePiker Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>lib/css/datetimepiker.css?p=<?php echo time();?>">
    <!-- Custom CSS -->
    <link href="<?php echo URL;?>assets/css/custom.css?p=<?php echo time();?>" rel="stylesheet">

    <link href="<?php echo URL;?>assets/css/simple-sidebar.css?p=<?php echo time();?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>