<table id="professor_section" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Section</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_professor_section($_SESSION['id']) as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['professor_section']?></td>
  <td><a style="cursor:pointer" class="btn" onclick="modify_professor_section('<?php echo$row['id']?>','<?php echo$row['professor_section']?>')"> View </a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
jQuery( document ).ready(function( $ ) {
  $('#professor_section').DataTable({
    "paging": true, "lengthChange": true, "searching": true,
    "ordering": false, "info": false, "autoWidth": true
  });
});

function modify_professor_section($id,$section) {
  jQuery.noConflict();
  var id = $id;
  var section = $section;
  $('#update_professor_section').modal('show');
  $('#update_professor_section').find('#hiddenid').val(id);
  $('#update_professor_section').find('#prof_section').val(section);
}
</script>