<!DOCTYPE html>
<html lang="en" >
<head>

    <meta charset="utf-8">
    <title>Employee Management Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>bower_components/datatables/media/css/demo_table_1.css" rel="stylesheet">
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
    <!-- angular js -->
    <script src="<?php echo base_url(); ?>angular/js/angular.min.js"></script>
    <script src="<?php echo base_url(); ?>angular/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
    <script src="<?php echo base_url(); ?>angular/js/angular-route.min.js"></script>
    <script src="<?php echo base_url(); ?>angular/app/app.js"></script>
    <!-- end angular js -->
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">		

</head>

<body ng-app="main-App">
   <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" onclick="javascript::return false;"> 
                <span><img alt="Employee Logo" src="<?php echo base_url(); ?>img/logo20.png" class="hidden-xs"/></span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">&nbsp;</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    
                
                    <li><a href="#"  data-toggle="modal" data-target="#add">Conectado como Empleado</a></li>
                    <li class="divider"></li>
                    <li><a class="add_employee" href="<?php echo base_url(); ?>employee/update_employee_profile.php?update=<?php // echo $_SESSION['session_admin_id']; ?>">Mi perfil</a></li>
                    <li><a class="add_employee">Conectado como administrador</a></li>
                    <li class="divider"></li>
                    <li><a class="add_employee" href="<?php echo base_url(); ?>employee/update_employee_profile.php?update=<?php // echo $_SESSION['session_admin_id']; ?>">Mi perfil</a></li>
                

                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>login/logout">Cerrar sesión</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main&nbsp;
                                                 
                        </li>
                        
                        <li><a class="ajax-link" href="<?php echo base_url(); ?>#/"><i class="glyphicon glyphicon-home"></i><span> Inicio</span></a></li>
                        
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Empleados</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?php echo base_url(); ?>#employee"><i class="glyphicon glyphicon-icon-user"></i><span> Ver empleados </span></a></li>
                                        
                                    </ul>
                                </li>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Ingresar Solicitud</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="ajax-link"><a  class="add_leave_multi" href="<?php echo base_url(); ?>leave/add_multiple_leave.php"><i class="glyphicon glyphicon-list"></i><span> Ingresar Solicitud</span></a></li>
                                        <!--<li class="ajax-link"><a href="<?php// echo SITE_ADDRESS; ?>manage_requests.php"><i class="glyphicon glyphicon-file"></i><span> Manage Requests</span></a></li>-->
                                        <li class="ajax-link"><a href="<?php echo base_url(); ?>leave/leave_list.php"><i class="glyphicon glyphicon-eye-open"></i><span> Historial</span></a></li>
                                    </ul>
                                </li>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Listado de Feriados</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/holidays_list.php"><i class="glyphicon glyphicon-random"></i><span> Feriados</span></a></li>
                                        
                                    </ul>
                                </li>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Informes</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?php echo base_url(); ?>employee/emp_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> Informe del empleado </span></a></li>
                                        <li><a href="<?php echo base_url(); ?>employee/emp_monthly_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> Saldo mensual</span></a></li>
                                        

                                    </ul>
                                </li>
                            
                            <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Empleados</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url(); ?>employee"><i class="glyphicon glyphicon-icon-user"></i><span> Ver empleados </span></a></li>
                                <li><a class="add_employee" href="<?php echo base_url(); ?>employee/add_employee.php"><i class="glyphicon glyphicon-list-alt"></i><span> Ingresar</span></a></li>
                                <li><a class="add_employee_balance" href="<?php echo base_url(); ?>employee/emp_balance_single.php"><i class="glyphicon glyphicon-list-alt"></i><span> Modificar saldos</span></a></li>
                            </ul>
                        </li>
                                            
                            
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Ingresar Solicitud</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="ajax-link"><a  class="add_leave_multi" href="<?php echo base_url(); ?>leave/add_multiple_leave.php"><i class="glyphicon glyphicon-list"></i><span> Ingresar Solicitud</span></a></li>
                                <!--<li class="ajax-link"><a href="<?php echo base_url() ?>manage_requests.php"><i class="glyphicon glyphicon-file"></i><span> Manage Requests</span></a></li>-->
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>leave/leave_list.php"><i class="glyphicon glyphicon-eye-open"></i><span> Historial</span></a></li>
                            </ul>
                        </li>
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Ajuste de Saldos</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="add_monthly" href="<?php echo base_url(); ?>employee/add_monthly.php"><i class="glyphicon glyphicon-icon-user"></i><span> Add Manual Balance </span></a></li>
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/emp_balance_feriado_legal_cron.php"><i class="glyphicon glyphicon-random"></i><span> Feriado Legal</span></a></li>
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/emp_balance_dias_progresivos_cron.php"><i class="glyphicon glyphicon-random"></i><span> Dias Progresivos</span></a></li>
                             <!--   
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/emp_balance_entry_alerts.php"><i class="glyphicon glyphicon-random"></i><span> Balance Alerts</span></a></li>
                             -->
                            </ul>
                        </li>
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Listado de Feriados</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/holidays_list.php"><i class="glyphicon glyphicon-random"></i><span> Feriados</span></a></li>
                                <li class="ajax-link"><a class="add_holiday cboxElement" href="<?php echo base_url(); ?>employee/add_holiday_type.php"><i class="glyphicon glyphicon-random"></i><span> Holiday Type</span></a></li>
                                <li class="ajax-link"><a class="add_holiday cboxElement" href="<?php echo base_url(); ?>employee/add_holiday.php"><i class="glyphicon glyphicon-random"></i><span> Add Holiday</span></a></li>
                            </ul>
                        </li>
                        
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Informes</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url(); ?>employee/emp_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> Informe del empleado </span></a></li>
                                <li><a href="<?php echo base_url(); ?>employee/emp_monthly_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> Saldo mensual</span></a></li>
                                <li><a href="<?php echo base_url(); ?>employee/active_emp_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> Empleados activos</span></a></li>
                                <li><a href="<?php echo base_url(); ?>employee/inactive_emp_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> En Empleados Activos</span></a></li>
                                <li><a href="<?php echo base_url(); ?>employee/admin_emp_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span>Supervisors/Managers</span></a></li>
                                <li><a href="<?php echo base_url(); ?>employee/retired_emp_reports.php"><i class="glyphicon glyphicon-list-alt"></i><span> Retired Empleados</span></a></li>
                                
                            </ul>
                        </li>
                        
                        <li><a href="<?php echo base_url(); ?>settings/alerts.php"><i class="glyphicon glyphicon-globe"></i><span> System Alerts</span></a></li>

                                  
                <li class="ajax-link"><a class="add_leave" href="<?php echo base_url(); ?>leave/add_leave.php"><i class="glyphicon glyphicon-list"></i><span> Presentar una solicitud de licencia</span></a></li>
                <li><a href="<?php echo base_url(); ?>leave/leave_list.php"><i class="glyphicon glyphicon-list"></i> Historial </a></li>
                           
                        <li><a href="<?php echo base_url(); ?>login/logout"><i class="glyphicon glyphicon-lock"></i><span> Cerrar sesión</span></a></li>
                       
                    </ul>
                 </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
        
            
