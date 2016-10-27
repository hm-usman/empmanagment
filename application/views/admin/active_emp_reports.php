<div ng-controller="activeempreportsCtrl">
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i>  Empleados activos </h2>
            </div>
           <div class="box-content">
               <br>
            <table class="table table-striped table-bordered  responsive" style=" font-size: 12px;">
  
            <thead>
                <tr>
                    <th>Ficha</th>
                    <th>Nombre</th>
                    <th>Department</th>
                    <th>RUT</th>
                    <th width="10%">FECHA INGRESO</th>
                    <th style=" width: 10px;">Feriados Disponibles</th>
                    <th>Status/ Notes</th>
                    
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
              
   <!-- <tr>
        <td><a class=" btn-success btn-sm" href=""></a></td>-->

        <tr ng-repeat="data in list">             
                    <td>{{data.emp_id}}</td>
                    <td>{{data.emp_file}}</td>
                    <td>{{data.emp_name}}</td>
                    <td>{{data.emp_department}}</td>
                    <td>{{data.emp_cellnum}}</td>
                    <td>{{data.emp_email}}</td>
            <a class=" btn-success btn-sm" href=""> </a>

        <td class="center" style="text-align: center;">
           
            <a class=" btn-success btn-sm"><i title="Status" class="glyphicon glyphicon-ok icon-ok"></i></a>

              <a class=" btn-danger btn-sm"><i title="Status" class="glyphicon glyphicon-remove"></i></a>
           &nbsp;<a title="Manage Notes" class="btn btn-info btn-sm add_employee_notes" href=""><span class="glyphicon glyphicon-file"></span>
            </a>
        </td>
        
        
        <td class="center">
            <a class=" btn-warning btn-sm" href="" title="Ingresar solicitud individual">
           Solicitud
         </a>
        <a class=" btn-info btn-sm add_employee" href="">
           <i class="glyphicon glyphicon-edit icon-white"></i>
         </a>
         <a class=" btn-danger btn-sm" onclick="return confirmation();" href="">
             <i class="glyphicon glyphicon-trash icon-white"></i>
         </a>
        </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
</div>