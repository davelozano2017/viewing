<table id="table_branches" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Branch</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_branches() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['branches']?></td>
  <td style="width:1px"><a style="cursor:pointer" onclick="modify_branches('<?php echo$row['id']?>','<?php echo$row['branches']?>')"> <i class="fa fa-pencil"></i> </a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
$('#table_branches').DataTable({
  "paging": true, "lengthChange": true, "searching": true,
  "ordering": false, "info": false, "autoWidth": true
});

function modify_branches($id,$branches) {
  var id = $id;
  var branches = $branches;
  $('#modal_branches_update').modal('show');
  $('#modal_branches_update').find('#branch_id').val(id);
  $('#modal_branches_update').find('#update_branch').val(branches);
}
</script>