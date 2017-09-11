<table id="courses" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Course</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_courses() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['courses']?></td>
  <td style="width:1px"><a style="cursor:pointer" onclick="modify_courses('<?php echo$row['id']?>','<?php echo$row['courses']?>','<?php echo$row['options']?>')"> <i class="fa fa-pencil"></i> </a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>
<script>
$('#courses').DataTable({
  "paging": true, "lengthChange": true, "searching": true,
  "ordering": false, "info": false, "autoWidth": true
});

function modify_courses($id,$courses,$options) {
  var id = $id;
  var courses = $courses;
  var options = $options;
  $('#modal_courses_update').modal('show');
  $('#modal_courses_update').find('#course_id').val(id);
  $('#modal_courses_update').find('#update_course').val(courses);
  $('#modal_courses_update').find('#update_option').val(options);
}
</script>