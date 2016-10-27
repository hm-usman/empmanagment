<div ng-controller="empreportsCtrl">
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Employee Report</h2>
            </div>         
    <div class="box-content">    
        <form class="form-horizontal" role="form"  method="post" >  
            <div class="control-group">
                <label class="control-label" >Select Date</label>
                    <div class="controls">
                        <input type="date" style=" width: 20%" id="date" required="" class="form-control col-sm-2"  value=""  name="date">
                    </div>
            </div>  
            <div class=" col-sm-5 " style=" text-align: left;">
                <button type="submit" name="search" class="btn btn-small btn-info">Search</button>
            </div>            
            <div class=" col-sm-4 " style=" text-align: right;">
                <a href=""  class="btn btn-small btn-success">Export to CSV</a>
                <a href=""  class="btn btn-small btn-success">Export to Excel</a>
                <a href=""  class="btn btn-small btn-warning" target="_blank">Print</a>
            </div>            
        </form> 
    <br><br><br>
    <table class="table table-striped table-bordered  responsive" style="font-size: 12px;">
        <thead>
        <tr>
            <th>#</th>
            <th>Ficha</th>
            <th>Nombre</th>
            <th>Department</th>
            <th>RUT</th>
            <th>FECHA INGRESO</th>
            <th>Today Balance</th>
            <th>FERIADO LEGAL</th>
            <th>DIAS PROGRESIVOS</th>
        </tr>
        </thead>
    <tbody>
    <tr ng-repeat="data in list">             
                    <td>{{data.emp_id}}</td>
                    <td>{{data.emp_file}}</td>
                    <td>{{data.emp_name}}</td>
                    <td>{{data.emp_department}}</td>
                    <td>{{data.emp_cellnum}}</td>
                    <td>{{data.emp_email}}</td>
                    <td>{{data.emp_password}}</td>
                    <td>{{data.emp_current_contract}}</td>
    </tr>
    </tbody>
    </table>
            </div>
        </div>
    </div>
</div>
    </div>
