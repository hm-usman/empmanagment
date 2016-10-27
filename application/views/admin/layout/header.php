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
                    <li><a href="<?php echo base_url(); ?>#logout">Cerrar sesión</a></li>
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
                        
                        <li><a class="" href="<?php echo base_url(); ?>#/"><i class="glyphicon glyphicon-home"></i><span> Inicio</span></a></li>
                        
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Empleados</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="<?php echo base_url(); ?>#employee"><i class="glyphicon glyphicon-icon-user"></i><span> Ver empleados </span></a></li>
                                        
                                    </ul>
                                </li>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Ingresar Solicitud</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="ajax-link"><a href=""  data-toggle="modal" data-target="#add_multiple_leave"><i class="glyphicon glyphicon-list"></i><span> Ingresar Solicitud</span></a></li>
                                        <!--<li class="ajax-link"><a href="<?php// echo SITE_ADDRESS; ?>manage_requests.php"><i class="glyphicon glyphicon-file"></i><span> Manage Requests</span></a></li>-->
                                        <li class="ajax-link"><a href="#leavelist"><i class="glyphicon glyphicon-eye-open"></i><span> Historial</span></a></li>
                                    </ul>
                                </li>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Listado de Feriados</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="ajax-link"><a href="<?php echo base_url(); ?>#holidaylist"><i class="glyphicon glyphicon-random"></i><span> Feriados</span></a></li>
                                        
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
                                <li><a href=""  data-toggle="modal" data-target="#addmonthly"><i class="glyphicon glyphicon-icon-user"></i><span> Add Manual Balance </span></a></li>
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>#feradio"><i class="glyphicon glyphicon-random"></i><span> Feriado Legal</span></a></li>
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>#dias"><i class="glyphicon glyphicon-random"></i><span> Dias Progresivos</span></a></li>
                             <!--   
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/emp_balance_entry_alerts.php"><i class="glyphicon glyphicon-random"></i><span> Balance Alerts</span></a></li>
                             -->
                            </ul>
                        </li>
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Listado de Feriados</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="ajax-link"><a href="<?php echo base_url(); ?>employee/holidays_list.php"><i class="glyphicon glyphicon-random"></i><span> Feriados</span></a></li>
                                <li class="ajax-link"><a  href=""  data-toggle="modal" data-target="#feriados"><i class="glyphicon glyphicon-random"></i><span> Holiday Type</span></a></li>
                                <li class="ajax-link"><a  href=""  data-toggle="modal" data-target="#addferadieo"><i class="glyphicon glyphicon-random"></i><span> Add Holiday</span></a></li>
                            </ul>
                        </li>
                        
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>Informes</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?php echo base_url(); ?>#emp_reports"><i class="glyphicon glyphicon-list-alt"></i><span> Informe del empleado </span></a></li>
                                <li><a href="<?php echo base_url(); ?>#emp_monthly_reports"><i class="glyphicon glyphicon-list-alt"></i><span> Saldo mensual</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#active_emp_reports"><i class="glyphicon glyphicon-list-alt"></i><span> Empleados activos</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#inactive_emp_reports"><i class="glyphicon glyphicon-list-alt"></i><span> En Empleados Activos</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#admin_emp_reports"><i class="glyphicon glyphicon-list-alt"></i><span>Supervisors/Managers</span></a></li>
                                <li><a href="<?php echo base_url(); ?>#retired_emp_reports"><i class="glyphicon glyphicon-list-alt"></i><span> Retired Empleados</span></a></li>
                                
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
<div class="modal fade" id="add_multiple_leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">ADD</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">                        
    <div class="form-group">                    
        <label class="control-label col-sm-2">1/2 Día</label>                     
        <div class="col-sm-2">
            <select name="half_day" class="form-control col-sm-2" >
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <label class="control-label col-sm-2">Buscador:</label>  
        <div class="col-sm-3">
            <input name="SearchText" class="form-control col-sm-3" type="text" value="" placeholder="Buscador Empleado">
        </div>
        <div class="col-sm-2">
            <button type="submit" name="Search" class="btn btn-block btn-info">Buscar</button>
        </div>
    </div>
<div class="form-group">
    <label class="control-label col-sm-2">Empleado</label>
    <div class="col-sm-10">                                    
           <fieldset class="multiselectcheck form-control">
        <label> <input type="checkbox" id="togglecheck" value="select" onClick="do_this()" />&nbsp;&nbsp;&nbsp;Seleccionar todos</label>
        
        </fieldset>
           
        &nbsp;(Ficha - Nombre del Empleado - Departamento - DIAS PROGRESIVOS - FERIADO LEGAL)
    </div>
</div>
      
         
            <div class="form-group">                    
             <label class="control-label col-sm-2">Fecha de Inicio *</label>                     
             <div class="col-sm-2">
                 <input type="text" required="" class="form-control col-sm-4"  style="width:180px;"  id="leave_duration_from" name="leave_duration_from" value="<?php echo date('d-m-Y'); ?>">
             </div>
                            
             <label class="control-label col-sm-2">Fecha de Término *</label>                     
             <div class="col-sm-2">
                 <input type="text" required="" class="form-control col-sm-4" style="width:180px;"  id="leave_duration_to" name="leave_duration_to" value="<?php echo date('d-m-Y'); ?>">
             </div>
         </div>
         
         <div class="form-group">
              <label class="control-label col-sm-2">Tipo</label>
                <div class="col-sm-2">
                    <select name="trans_type" class="form-control" style="width:180px;" >
                        <option value="F" >FERIADO LEGAL</option>
                        <option value="D" >DIAS PROGRESIVOS</option>
                        
                    </select>
                </div>
         
                        <label class="control-label col-sm-2">Estatus</label>
                        <div class="col-sm-2">          
                         <select name="approval" class="form-control" required="" style="width:180px;">
                          <option value="">SELECCIONE</option>
                        </select>
                        </div>
                    </div>
          <div class="form-group">
                         <label class="control-label col-sm-2">Observación</label>                     
                        <div class="col-sm-8">
                            <textarea  class="form-control" name="reason"  placeholder="Observación"></textarea>
                        </div>
                    </div>

         <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-4">
                            <button type="submit" name="submit" class="btn btn-block btn-info">Guardar</button>
                         </div>
                    </div>  

                    <br>
                </form>
               </div>
              </div>
            </div>
          </div>
        <!--ADD Fedaireo Type-->
         <div class="modal fade" id="feriados" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD FEDAIEREO</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Holiday Type</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn default btn-success btn-block">Save</button>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        <!--ADD Fedaireo-->
            <div class="modal fade" id="addferadieo" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD Holiday</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label">Holiday Type</label>
                <select class="form-control" placeholder="SELECT">
                    <option value=""></option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Holiday Title</label>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Date</label>
                <input class="form-control" type="date">
            </div>
            <div class="form-group">
                <button class="btn btn default btn-success btn-block">Save</button>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        <!-- Add monthly Balance -->
  <div class="modal fade" id="addmonthly" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body" ng-controller="customersCrtl">
            <div class="col-sm-4">Date
                <input type="datetime-local" class="form-control">
                </div>
            
                <div class="col-md-6">
                        <br>
                        <p style="text-align: center;">
                        Check from the list to include in updated queue
                </p><br>
                </div>
            <table class="table table-striped table-bordered  responsive" style=" font-size: 12px;">
                <thead>
                    <tr>
                        <th><input type="checkbox"</th>
                        <th><a ng-click="sort_by('emp_file');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp;Ficha</th>
                        <th><a ng-click="sort_by('emp_name');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp;Nombre</th>
                        <th><a ng-click="sort_by('emp_department');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; FECHA INGRESO</th>
                        <th><a ng-click="sort_by('emp_cellnum');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; FERIADO LEGAL</th>
                        <th>Balance</th>                    </tr>
                </thead>
            <tbody>
            <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" ng-show="filteredItems > 0">
                
                    <td><input type="checkbox"</td>
                    <td>{{data.emp_file}}</td>
                    <td>{{data.emp_name}}</td>
                    <td>{{data.emp_first_contract}}</td>
                    <td>{{data.emp_cellnum}}</td>
                    <td><input type="number" value="1.25"</td>
            </tr>
            </tbody>
            </table>
                 <div class="col-md-12">
                        <h5 style="text-align: center;">
                        Filtered {{ filtered.length }} of {{ totalItems}} total customers
                </h5>
                </div>
                <div ng-show="filteredItems == 0">
                        <h4>No customers found</h4>                    
                </div>
                <div  ng-show="filteredItems > 0">    
                    <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination" previous-text="&laquo;" next-text="&raquo;"></div>
                </div> 
                <div class="form-group">
                    <button class="btn btn-block btn-success">Save</button>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        
        
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
        
            
