<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i>  - Modificar saldos</h2>
            </div>
            <div class="col-md-7">
                <br>
                <table class="table table-striped table-bordered" >
                        <tr>
                            <th>Feriado Legal</th><td style=" background-color: #FFFFFF">1</th>
                            <th>Dias Progresivos</th><td style=" background-color: #FFFFFF">2</th>
                        </tr>
                </table>   
            </div>
                   <div class="col-md-4">
                <br>
                <p style="text-align: right;">
                <a class="btn add_balance btn-success btn-sm " href="" data-toggle="modal" data-target="#add"><i class="glyphicon icon-white"></i>Añadir Manual de Balanza</a>
                <a class="btn btn-success btn-sm" href="<?php base_url();?>/empmanagment/employee">Ver empleados</a>
                </p><br>
            </div>
     <link href="<?php echo base_url(); ?>bower_components/datatables/media/css/demo_table_1.css" rel="stylesheet">            
            <div class="box-content">
               <br>
               <table class="table table-striped table-bordered   responsive" style=" font-size: 12px;" >
                <thead>
                <tr>
                    <th style=" width: 10%;">iD</th>
                    <th style=" width: 10%;">Date</th>
                    <th>Reason</th>
                    <th>Days</th>
                    <th>Status</th>
                    <th style=" width: 10%;">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($alpp_transactions as $row): ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo  date("d-m-Y",strtotime($row['end_month_data'])); ?></td>
                    <td><?php  if ($row['trans_type'] == 'F') {echo 'FERIADO LEGAL';}else{echo 'Dias Progresivos';}?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td class="center">
                        <span class="label-success label label-default">Active</span>
                    </td>
                    <td class="center">
                        <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#edit<?php echo $row['id'];?>">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                        </a>
                        <a href="<?php base_url();?>/empmanagment/empholiday/delete/<?php echo $row['id'];?>" onclick="return confirmation();" class="btn btn-danger btn-sm" >
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
<!--Model Add-->
 <div class="modal fade" id="add" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <?php      
                    $attributes = array('method' => 'post','onsubmit'=>'return Validate(this);');
                    echo form_open('empholiday/add', $attributes);
                    ?>
  <div class="form-group">
      <?php foreach ($alpp_transactions as $row): ?>
    <input type="hidden" class="form-control" name="emp_id" disabled="" value="<?php echo $row['emp_id'];?>">
      <?php endforeach ?>
  </div>          
  <div class="form-group">
    <label for="days">Days</label>
    <input type="text" class="form-control" name="amount">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="text" id="datepicker" class="form-control" name="date" >
  </div>
  <div class="form-group">
  <label for="type">Type</label>
  <select class="form-control" name="trans_type">
      <option value="D">Dias Progresivos</option>
      <option value="F">FERIADO LEGAL</option>
  </select>
</div>              
  <div class="form-group">
      <label for="status">Status</label>
      <label class="radio-inline"><input type="radio" name="status" value="0">Active</label>
      <label class="radio-inline"><input type="radio" name="status" value="1">Disable</label>
  </div>
      <button type="submit" class="btn btn-success btn-block">Save</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 <!--Model Edit-->
      <?php foreach ($alpp_transactions as $row): ?>
<div class="modal fade" id="edit<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <form method="post" action="<?php base_url(). "empholiday/update/". $row['id'];?>">
                <div class="form-group">
                      <label for="days">Days</label>
                      <input type="text" class="form-control" name="amount" value="<?php echo $row['amount'];?>">
                    </div>
                    <div class="form-group">
                      <label for="date">Date</label>
                      <input type="text" id="datepicker1" class="form-control" name="date" value="<?php echo $row['date'];?>" >
                    </div>
                    <div class="form-group">
                    <label for="sel1">Type</label>
                    <select class="form-control" name="trans_type">
                        <option value="<?php echo $row['trans_type']; ?>"><?php if ($row['trans_type'] == 'F') {echo 'FERIADO LEGAL';}else{echo 'Dias Progresivos';}?></option>
                        <option value="D">Dias Progresivos</option>
                        <option value="F">FERIADO LEGAL</option>
                    </select>
                  </div>              
                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" name="status" value="0">Active</label>
                        <label class="radio-inline"><input type="radio" name="status" value="1">Disable</label>
                    </div>
                      <button type="submit" class="btn btn-success btn-block">Update</button>
        </form>                  
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>         
      </div>
    </div>
  </div>
<?php endforeach ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat: "dd-mm-yy"
    });
  });
</script>
<script>
  $(function() {
    $( "#datepicker1" ).datepicker({
        dateFormat: "dd-mm-yy"
    });
  });
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