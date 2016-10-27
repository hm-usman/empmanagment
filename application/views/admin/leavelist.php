<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Historial</h2>
            </div>
            

<div class="box-content">
    <table class="table table-striped table-bordered datatable   responsive" id="leave_list" style=" font-size: 12px; padding-bottom: 0px;">
    <thead>
    <tr>
        <th style=" width: 8%;">Fecha del Registro</th>
        <th style=" width: 10%;">Nombre</th>
        <th style=" width: 2%;">N° de Días</th>
        <th style=" width: 8%;">Desde<br>Hasta</th>
        <th style=" width: 20%;">Observación</th>
        <th style=" width: 10%;">Tipo</th>
        <th style=" width: 12%;">Estatus</th>
        <th style=" width: 13%;">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
             <td><br>
                 </td>
        <td></td>
        <td>        </td>
       <td></td>
        <td>        </td>
       
        <td>
        <div class="btn-group">
                    <button class="btn btn-danger btn-sm">Pendiente</button>
                    <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle b2 btn-sm"><span class="caret"></span></button>
                    <button class="btn btn-danger btn-sm">Cancelado</button>
                    <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle b2 btn-sm"><span class="caret"></span></button>
                    <button class="btn btn-success btn-sm">Aprobado</button>
                    <button data-toggle="dropdown" class="btn btn-success dropdown-toggle b2 btn-sm"><span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a class="status_leave" href=""><i class="icon-ok"></i> Aprobado</a></li>
                <li><a class="status_leave" href=""><i class="icon-minus"></i> Cancelado</a></li>
                    <li><a href="javascript:;" onclick="return action('3','');"><i class="icon-remove"></i>Delete</a></li>
            </ul>
        </div>
        </td>


        <td>
            
            
                           
      
            <a class="btn btn-success report_leave btn-sm" href="">
                <i title="Report" class="glyphicon glyphicon-print icon-white"></i>
            </a>
             <a class="btn btn-info add_leave btn-sm" href="">
                <i class="glyphicon glyphicon-edit icon-white"></i>
               
            </a>
                <a onclick="return confirmation();" class="btn btn-danger btn-sm" href="">
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



<script>
    function confirmation() {
        var answer = confirm("Do you want to delete this record?");
    if(answer){
            return true;
    }else{
            return false;
    }
}
</script>
