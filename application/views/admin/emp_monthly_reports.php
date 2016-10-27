<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Report</h2>
            </div>         
    <div class="box-content">    
        <form class="form-horizontal" role="form"  method="post" >  
            <div class="control-group">
                    <div class="controls col-md-2">
                        <select name="month" required class="form-control col-md-12"  >
                        <?php	foreach($month_array as $key=>$value) 	
                        {
                            $sel=($month==$key) ? 'selected' : '';
                            echo"<option value=".$key." $sel>".$value."</option>";
                        
                        } ?>	
                        </select>
                    </div>
                    <div class="controls  col-md-2">
                    <select name="year" required class="form-control col-md-12" >
                       
                        </select>
                    </div>
            </div>  
            <div class=" col-md-4 " style=" text-align: left;">
                <button type="submit" name="search" class="btn btn-small btn-info">Search</button>
            </div>            
            <div class=" col-md-4 " style=" text-align: right;">
<!--                <a href="emp_reports_csv.php?date="  class="btn btn-small btn-success">Export to CSV</a>-->
                <a target="_blank" href=""  class="btn btn-small btn-warning">Print</a>
            </div>           
        </form> 
        <br><br><br>
    <table class="table table-striped table-bordered   responsive" style="font-size: 12px;">
        <thead>
        <tr>
            <th>#</th>
            <th>Ficha</th>
            <th>Nombre</th>
            <th>Department</th>
            <th>RUT</th>
            <th>FECHA INGRESO</th>
            <th>Total Used</th>
            <th>FERIADO LEGAL</th>
            <th>DIAS PROGRESIVOS</th>
        </tr>
        </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
    </tbody>
    </table>
            </div>
        </div>
    </div>
</div>