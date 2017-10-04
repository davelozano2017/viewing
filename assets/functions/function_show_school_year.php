<table id="schoolyear" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>School Year</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_all_school_year() as $row): ?>
<?php $status = ($row['status'] == 1) ? '<label class="label label-primary flat">Used</label>' : '<label class="label label-danger flat">Unuse</label>';?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['schoolyear']?></td>
  <td><a style="cursor:pointer" onclick="activate('<?php echo$row['id']?>','<?php echo$row['schoolyear']?>')"><?php echo $status?></a></td>
  <td style="width:1px"><a style="cursor:pointer" onclick="modify_schoolyear('<?php echo$row['id']?>','<?php echo$row['schoolyear']?>')"> <i class="fa fa-pencil"></i> </a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
$('#schoolyear').DataTable({
  "paging": true, "lengthChange": true, "searching": false,
  "ordering": false, "info": false, "autoWidth": true
});



function modify_schoolyear($id,$schoolyear) {
  var id = $id;
  var schoolyear = $schoolyear;
  $('#modal_school_year_update').modal('show');
  $('#modal_school_year_update').find('#update_id').val(id);
  $('#modal_school_year_update').find('#update_schoolyear').val(schoolyear);
}
</script>