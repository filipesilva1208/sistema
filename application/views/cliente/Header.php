<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$site_name.' - '.$page_name?></title>

    <?php echo $css?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php //$this->load->view('cliente/Preload')?>
        <?php $this->load->view('cliente/Navbar')?>
        <?php $this->load->view('cliente/Sidebar')?>
        <?php $this->load->view('cliente/Content_header')?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">