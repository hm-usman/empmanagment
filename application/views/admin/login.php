<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Employee Management Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url(); ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/colorbox/example5/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>bower_components/jquery/jquery.min.js"></script>

<script>
    $(document).ready(function(){
            $(".change_pass").colorbox({iframe:true, width:"30%", height:"60%"});
    });
</script>
</head>
<body>
<div class="row">
    &nbsp;
</div>
<div class="row">
    <div class="col-md-12" style="text-align: center;">
        <h2>Bienvenido al Sistema de Gestión de Empleados</h2>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12 center login-header">
        <h4>Entrar como Empleado/Supervisor/Admins</h4>
    </div>
    <!--/span-->
</div><!--/row-->

<div class="row">
    <div class="well col-md-5 center login-box">
  
    <div  class="form-horizontal" method="post">
  <?php      
            $attributes = array('method' => 'post','onsubmit'=>'return Validate(this);');
            echo form_open('login/dologin',$attributes);
    ?>

        <fieldset>
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input type="text" class="form-control" placeholder="Email"  name="email">
            </div>
            <div class="clearfix"></div><br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" >
            </div>
            <div class="clearfix pull-right">
        
                <h7><a class="change_pass" href="<?php echo base_url(); ?>forget_password.php">Forget Password ?</a></h7>
       
            </div>
            <div class="clearfix"></div>

            <p class="center col-md-5">
                <button type="submit" name="submit" class="btn btn-primary">Iniciar sesión</button>
            </p>
        </fieldset>

    
  </div>
    </div>
</div><!--/row-->
</body>
</html>