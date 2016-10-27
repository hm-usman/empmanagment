<div ng-controller="customersCrtl">
            <div class="row">
            <div class="box col-md-12">
            <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i>  Ver empleados </h2>
            </div>
                <div><br></div>
            <div class="box-content">
                <div class="col-sm-2">PageSize:
                    <select ng-model="entryLimit" class="form-control">
                        <option>5</option>
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                </div>
                <div class="col-sm-2">Filter:
                    <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
                </div>
                <div class="col-md-8">
                        <br>
                        <p style="text-align: right;">
                        <a class="btn btn-primary btn-md"  href="" data-toggle="modal" data-target="#add"><i class="glyphicon icon-white glyphicon-plus"></i> Add Employee</a>
                </p><br>
                </div>
                <table class="table table-striped table-bordered  responsive" style=" font-size: 12px;">
                <thead>
                    <tr>
                        <th><a ng-click="sort_by('emp_file');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp;Ficha</th>
                        <th><a ng-click="sort_by('emp_name');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp;Nombre</th>
                        <th><a ng-click="sort_by('emp_department');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; Department</th>
                        <th><a ng-click="sort_by('emp_cellnum');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; Rut</th>
                        <th><a ng-click="sort_by('emp_name');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; Today Balance</th>
                        <th><a ng-click="sort_by('emp_name');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; FERIADO LEGAL</th>
                        <th> <a ng-click="sort_by('emp_name');"><i class="glyphicon glyphicon-sort"></i></a>&nbsp; DIAS PROGRESIVOS</th>
                        <th width="13%">Actions</th>
                    </tr>
                </thead>
            <tbody>
            <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit" ng-show="filteredItems > 0">
                
                    <td>{{data.emp_file}}</td>
                    <td>{{data.emp_name}}</td>
                    <td>{{data.emp_department}}</td>
                    <td>{{data.emp_cellnum}}</td>
                    <td>{{data.emp_email}}</td>
                    <td>{{data.emp_password}}</td>
                    <td>{{data.emp_current_contract}}</td>
                    <td><div class="dropdown">
                            <button class="btn btn-default btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Actions
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu responsive" role="menu" aria-labelledby="menu1" tabindex="-1">
                                <li role="presentation"><a href="<?php base_url();?>#holiday" role="menuitem" tabindex="-1">Modificar Saldos</a></li>
                              <li role="presentation"><a  href="<?php base_url();?>#leave" role="menuitem" tabindex="-1">Solicitud</a></li>
                              <li role="presentation"><a  role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-ok"></span>Status</a></li>
                              <li role="presentation"><a  data-toggle="modal" ng-click="readNotes(data.emp_id)" data-target="#notes"><span class="glyphicon glyphicon-file"></span>Notes</a></li>
                              <li role="presentation"><a  data-toggle="modal" ng-click="readOne(data.emp_id)" data-target="#edit"><span class="glyphicon glyphicon-edit "></span>Edit</a></li>
                              <li role="presentation"><a  ng-click="deleteEmployee(data.emp_id)"><span class="glyphicon glyphicon-trash "></span>Delete</a></li>
                            </ul>
                        </div>
                    </td>
            </tr>
            </tbody>
            </table>
                <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
                <div ng-show="filteredItems == 0">
                        <h4>No customers found</h4>                    
                </div>
                <div  ng-show="filteredItems > 0">    
                    <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination" previous-text="&laquo;" next-text="&raquo;"></div>
                </div>
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
                        <td ng-model="date"></td>
                        <td></td>
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
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">{{emp_name}}</h4>
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
                                 <input type="text" class="form-control" placeholder="RUT" ng-model="emp_cellnum">
                            </div>
                            <label class="control-label col-sm-2">Department</label>
                            <div class="col-sm-4">
                                <select ng-model="emp_department" class="form-control">
                                    <option ng-model="emp_department"></option>
                                    <option value="Indubal">Indubal</option>
                                    <option value="Soinb">Soinb</option>
                                    <option value="Appadmins">Appadmins</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">FECHA INGRESO</label>                     
                            <div class="col-sm-4">
                                <input type="text" id="emp_current_contract" class="form-control" onchange="" placeholder="Contrato Actual" ng-model="emp_current_contract">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Email</label>                     
                            <div class="col-sm-4">
                                <input type="email" class="form-control" placeholder="Enter email" ng-model="emp_email">
                            </div>
                            <label class="control-label col-sm-2">Password</label>                     
                            <div class="col-sm-3">
                                <input type="password" class="form-control" placeholder="Password" ng-model="emp_password">
                            </div>
                        </div>        
                        <div class="form-group">
                            <label class="control-label col-sm-2">Status</label>
                            <div class="col-sm-4">
                                <select ng-model="emp_status" class="form-control">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                    <option value="2">Retired</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2">User Type</label>
                            <div class="col-sm-4">
                                <select ng-model="emp_type" class="form-control">
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
              </div>
            </div>
          </div>
        <!--MODEL ADD-->
         <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><i>Add New Employee</i></h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal" role="form">  
                        <div class="form-group">
                            <label class="control-label col-sm-2">Ficha</label>
                            <div class="col-sm-4">          
                                <input type="text" class="form-control"  placeholder="Ficha" name="emp_file" ng-model="emp_file">
                                <span class="text-danger"><?php echo form_error('emp_file'); ?></span>
                            </div>
                            <label class="control-label col-sm-2">Nombre</label>
                            <div class="col-sm-4">          
                                <input type="text" class="form-control"  placeholder="Nombre" name="emp_name" ng-model="emp_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">RUT</label>                     
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="RUT" name="emp_cellnum" ng-model="emp_cellnum">
                            </div>
                            <label class="control-label col-sm-2">Department</label>
                            <div class="col-sm-4">
                                <select name="emp_department" ng-model="emp_department" class="form-control">
                                    <option value="Indubal">Indubal</option>
                                    <option value="Soinb">Soinb</option>
                                    <option value="Appadmins">Appadmins</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">FECHA INGRESO</label>                     
                            <div class="col-sm-4">
                                <input type="text" id="emp_current_contract" class="form-control" onchange="" placeholder="Contrato Actual" name="emp_current_contract" ng-model="emp_current_contract">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Email</label>                     
                            <div class="col-sm-4">
                                <input type="email" class="form-control" placeholder="Enter email" name="emp_email" ng-model="emp_email">
                            </div>
                            <label class="control-label col-sm-2">Password</label>                     
                            <div class="col-sm-3">
                                <input type="password" class="form-control" placeholder="Password" name="emp_password" ng-model="emp_password">
                            </div>
                        </div>        
                        <div class="form-group">
                            <label class="control-label col-sm-2">Status</label>
                            <div class="col-sm-4">
                                <select name="emp_status" ng-model="emp_status" class="form-control">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                    <option value="2">Retired</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2">User Type</label>
                            <div class="col-sm-4">
                                <select name="emp_type" ng-model="emp_type" class="form-control">
                                    <option value="1">Worker</option>
                                    <option value="2">Supervisor</option>
                                    <option value="3">Manager</option>
                                    <option value="4">Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="button" name="submit" ng-click="createEmployee()" class="btn btn-small btn-block  btn-success">ADD</button>
                            </div>
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

