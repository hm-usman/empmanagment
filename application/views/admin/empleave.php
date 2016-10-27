<div ng-controller="leaveCrtl">
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-star-empty"></i>Ingresar solicitud individual </h2>
                </div>
                <div class="box-content">
                    <h5>Empleado:</h5>                 
                    <p style="text-align: right;">
                        <a href="" data-toggle="modal" data-target="#add"><button class="btn btn-warning"> <i class="glyphicon glyphicon-star icon-white"></i>Ingresar solicitud individual</button></a> 
                        <a class="btn btn-success" href="<?php echo base_url();?>#employee">Go Back</a>
                    </p>                
                    <table class="table table-striped table-bordered responsive" id="">
                    <thead>
                    <tr>
                            <th>No of Days</th>
                             <th width="10%">From:<br>To:</th>
                             <th >Reason</th>
                             <th>Type</th>
                             <th>Status</th>
                             <th width="18%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="data in list">
                            <td>{{data.leave_duration}}</td>
                            <td>{{data.leave_duration_from}} <br> {{data.leave_duration_to}} </td>
                            <td>{{data.leave_reason}}</td>
                            <td>{{data.leave_balance_type}}</td>
                            <td>{{data.leave_duration_from}}</td>
                            <td> 
                                <div class="btn-group">
                                    <button class="btn btn-warning btn-sm">Status</button>
                                    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle b2 btn-sm"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="" onclick="return action('2');"><i class="icon-ok"></i> Approve</a></li>
                                            <li><a href="" onclick="return action('1');"><i class="icon-minus"></i> Cancel</a></li>
                                            <li><a href="" onclick="return action('3');"><i class="icon-remove"></i>Delete</a></li>
                                        </ul>
                                </div>
                                <a class="btn btn-info btn-sm add_leave" href="">
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
    </div>
       <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">ADD</h4>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <select class="form-control" >
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label class="control-label">1/2 Dia</label>
                                <select class="form-control" >
                                <option value="">NO</option>
                                <option value="">YES</option>
                                </select> 
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fecha de Inicio</label>
                            <input class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fecha de Término</label>
                            <input class="form-control">
                        </div>
                        <div class="form-group">
                                <label class="control-label">Tipo</label>
                                <select class="form-control" >
                                <option value="D">Dia's Progressio</option>
                                <option value="F">Fedario Legal</option>
                                </select>
                        </div>
                         <div class="form-group">
                                <label class="control-label">Tipo</label>
                                <select class="form-control" >
                                <option value="">Approve</option>
                                <option value="">Pending</option>
                                <option value="">Delete</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Observación</label>
                            <textarea class="form-control" placeholder="Observación"></textarea>
                        </div>
                        <div class="form-group">
                                <button type="button" name="submit" ng-click="" class="btn btn-small btn-block  btn-success">ADD</button>
                        </div>
                    </div>
               </div>
              </div>
            </div>
          </div>
</div>
<style>
    .modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
    
}
</style>
