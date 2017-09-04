<table id="professor_courses" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Course</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_professor_courses($_SESSION['id']) as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['courses']?></td>
  <td><a style="cursor:pointer" class="btn" 
  onclick="modify_professor_courses('<?php echo$row['id']?>','<?php echo$row['courses']?>')"> View </a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
 $(document).ready(function(){
    $('#professor_courses').DataTable({
      "paging": true, "lengthChange": true, "searching": true,
      "ordering": false, "info": false, "autoWidth": true
    });
 });

function modify_professor_courses($id,$courses) {
  var id = $id;
  var courses = $courses;
  $('#update_professor_course').modal('show');
  $('#update_professor_course').find('#update_id').val(id);
  $('#update_professor_course').find('#professor_update_course').val(courses);
}
</script>