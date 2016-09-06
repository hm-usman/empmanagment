<div ng-app="myApp" ng-app>
    <div ng-controller="customersCrtl">
        <div class="container" >
            <div class="row">
            <div class="box col-md-12">
            <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i>  Ver empleados </h2>
            </div>
            <div class="box-content">
              <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style=" font-size: 12px;">
                <thead>
                    <tr>
                        <th>Ficha</th>
                        <th>Nombre</th>
                        <th>Department</th>
                        <th>Rut</th>
                        <th>Today Balance</th>
                        <th>FERIADO LEGAL</th>
                        <th>DIAS PROGRESIVOS</th>
                        <th width="13%">Actions</th>
                    </tr>
                </thead>
            <tbody>
            <tr>
                 <?php foreach ($alpp_emp as $emp): ?>
                    <td><?php echo $emp['emp_file']; ?></td>
                    <td><?php echo $emp['emp_name']; ?></td>
                    <td><?php echo $emp['emp_department']; ?></td>
                    <td><?php echo $emp['emp_cellnum']; ?></td>
                    <td><?php echo $emp['emp_current_contract']; ?></td>
                    <td><?php echo $emp['emp_name']; ?></td>
                    <td><?php echo $emp['emp_name']; ?></td>
                    <td><div class="dropdown">
                            <button class="btn btn-default btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Actions
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a href="<?php base_url();?>/empmanagment/empholiday/single/<?php echo $emp['emp_id'];?>" role="menuitem" tabindex="-1">Modificar Saldos</a></li>
                              <li role="presentation"><a href="#" data-toggle="modal" data-target="#notes">Solicitud</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-ok"></span>Status</a></li>
                              <li role="presentation"><a href="#" data-toggle="modal" data-target="#notes"><span class="glyphicon glyphicon-file"></span>Notes</a></li>
                              <li role="presentation"><a href="#" data-toggle="modal" ng-click="readOne(<?php echo $emp['emp_id']; ?>)" data-target="#edit"><span class="glyphicon glyphicon-edit "></span>Edit</a></li>
                              <li role="presentation"><a href="<?php base_url();?>/empmanagment/employee/delete/<?php echo $emp['emp_id'];?>" onclick="return confirmation();"><span class="glyphicon glyphicon-trash "></span>Delete</a></li>
                            </ul>
                        </div>
                    </td>
            </tr>
                 <?php endforeach; ?>
            </tbody>
            </table>
            </div>
            </div>
            </div>
            </div>

        <!-- Modal Notes -->
        <div class="modal fade" id="notes" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Add Notes</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="5" id="comment"></textarea>            
                    </div>
                    </div>

                    <div class="form-group">
                         <label class="control-label col-sm-4">Leave Report</label>
                        <div class="col-sm-8">
                            <input type="file" name="notesfile">
                        </div>
                    </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="button" class="btn btn-info" type="submit">Save</button>                    
                            </div>
                        </div>
                    </form>

                   <table class="table table-striped table-bordered">

                 <thead>
                    <tr>
                        <th>Notes</th>
                        <th style="width: 15%">Document</th>
                        <th style="width: 15%">Date</th>
                        <th style="width: 10%">Action</th>
                    </tr>

                    <tr>
                        <td>

                        </td>
                        <td>asd</td>
                        <td>09-8-2016</td>
                        <td>
                            <a  title="Remove Notes" class=" btn btn-danger btn-sm add_employee_notes" href="#"><i class="glyphicon glyphicon-trash icon-white"></i></a>
                        </td>
                    </tr>

                 </thead>
                </table>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        <!-- Modal Edit -->

        <?php      
        $attributes = array('method' => 'post','onsubmit'=>'return Validate(this);');
        echo form_open('employee/update', $attributes);
        ?>
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" role="form">  
                        <div class="form-group">
                            <label class="control-label col-sm-2">Ficha</label>
                            <div class="col-sm-4">          
                                <input type="text" class="form-control"  placeholder="Ficha" ng-model="emp_file" >
                            </div>
                            <label class="control-label col-sm-2">Nombre</label>
                            <div class="col-sm-4">          
                                <input type="text" class="form-control"  placeholder="Nombre" ng-model="emp_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">RUT</label>                     
                            <div class="col-sm-4">
                                 <input type="text" class="form-control" value="" placeholder="RUT" name="emp_cellnum">
                            </div>
                            <label class="control-label col-sm-2">Department</label>
                            <div class="col-sm-4">
                                <select name="emp_department" class="form-control">

                                    <option value="Indubal">Indubal</option>
                                    <option value="Soinb">Soinb</option>
                                    <option value="Appadmins">Appadmins</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">FECHA INGRESO</label>                     
                            <div class="col-sm-4">
                                <input type="text" id="emp_current_contract" class="form-control" value="" onchange="" placeholder="Contrato Actual" name="emp_current_contract">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Email</label>                     
                            <div class="col-sm-4">
                                <input type="email" name="emp_email" class="form-control"  value="" placeholder="Enter email">
                            </div>
                            <label class="control-label col-sm-2">Password</label>                     
                            <div class="col-sm-3">
                                <input type="password" name="emp_password" class="form-control" value=""  placeholder="Password">
                            </div>
                        </div>        
                        <div class="form-group">
                            <label class="control-label col-sm-2">Status</label>
                            <div class="col-sm-4">
                                <select name="emp_status" class="form-control">
                                    <option value="">SELECT</option>
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                    <option value="2">Retired</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2">User Type</label>
                            <div class="col-sm-4">
                                <select name="emp_type" class="form-control">
                                    <option value="">SELECT</option>
                                    <option value="1">Worker</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Manager</option>
                                    <option value="4">Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="button" name="submit" ng-click="updateEmployee()" class="btn btn-small btn-block  btn-success">Update</button>
                            </div>
                        </div>       
                </div>
               </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
  $( "#emp_first_contract" ).datepicker({
        dateFormat: "dd-mm-yy"
    });
  $( "#emp_current_contract" ).datepicker({
        dateFormat: "dd-mm-yy"
    });
  
});
function getyear(contract2)
{
    contract = new Date(contract2);
    contract_month  =   contract.getMonth();
    contract_year   =   contract.getFullYear();
    contract_day    =   contract.getDate();

    todayDate = new Date();
    todayYear = todayDate.getFullYear();
    todayMonth = todayDate.getMonth();
    todayDay = todayDate.getDate();
    
    age = todayYear - contract_year;

    if (todayMonth < contract_month - 1)
    {
      age--;
    }

    if (contract_month - 1 == todayMonth && todayDay < contract_day)
    {
      age--;
    }
      document.getElementById("years").value=age;

}
</script>

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