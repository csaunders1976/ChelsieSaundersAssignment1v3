<!DOCTYPE html>
<html>
<head>
    <title>Small Steps</title>
    <link rel=stylesheet href="<?=base_url()?>public/css/bootstrap.min.css" />
    <link rel=stylesheet href="<?=base_url()?>public/css/styles.css" />
    <link rel=stylesheet href="<?=base_url()?>public/css/jquery-ui.min.css" />
    <link rel=stylesheet href="<?=base_url()?>public/css/jquery-ui.structure.min.css" />
    <link rel=stylesheet href="<?=base_url()?>public/css/jquery-ui.theme.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/js/jquery-ui.min.js"></script>
</head>
<body>
<header>
    <a class="brand" href="/"><img src="<?=base_url()?>public/images/lungs.png"/><h1>Small Steps</h1></a>
</header>
    <nav class="navbar">

        <div class="navbar-inner">
            <ul class="nav">
                <li><a href="<?=base_url()."dashboard"?>">Dashboard</a></li>
                <li><a href="<?=base_url()."user/user"?>">User</a></li>
                <li><a href="<?=site_url()."dashboard/logout"?>">Logout</a></li>
            </ul>
        </div>
    </nav>


<div class="wrapper">
    <h3>Welcome <?php echo $this->session->userdata('login');?></h3>

