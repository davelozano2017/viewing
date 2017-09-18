<table id="table_section" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Section</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_sections() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['sections']?></td>
  <td style="width:1px"><a style="cursor:pointer" onclick="modify_update_section('<?php echo$row['id']?>','<?php echo$row['sections']?>')"> <i class="fa fa-pencil"></i> </a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
  $('#table_section').DataTable({
    "paging": true, "lengthChange": false, "searching": true,
    "ordering": false, "info": false, "autoWidth": true
  });

function modify_update_section($id,$section) {
  var id = $id;
  var section = $section;
  $('#update_modal_section').modal('show');
  $('#update_modal_section').find('#section_id').val(id);
  $('#update_modal_section').find('#section_update').val(section);
}
</script>