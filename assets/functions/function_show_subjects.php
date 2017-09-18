<style>.custom{background:transparent;border:none;outline:none};</style>
<table id="subject_tables" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Course</th>
      <th>Subjects</th>
      <th>Section</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_subjects() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['course']?></td>
  <td><?php echo $row['subject']?></td>
  <td><?php echo $row['section']?></td>
  <td><button class="custom" 
  onclick="modify_subjects('<?php echo $row['id']?>','<?php echo $row['course']?>','<?php echo $row['subject']?>','<?php echo $row['section']?>')"><i class="fa fa-pencil"></i></button></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
$('#subject_tables').DataTable({
"paging": true, "lengthChange": true, "searching": true,
"ordering": false, "info": false, "autoWidth": true
});


function modify_subjects($id,$course,$subject,$section) {
  var sub_id      = $id;
  var sub_course  = $course;
  var sub_subject = $subject;
  var sub_section = $section;
  $('#update_modal_subjects').modal('show');
  $('#update_modal_subjects').find('#update_sub_id').val(sub_id);
  $('#update_modal_subjects').find('#update_sub_course').val(sub_course);
  $('#update_modal_subjects').find('#update_sub_subject').val(sub_subject);
  $('#update_modal_subjects').find('#update_sub_section').val(sub_section);
}
</script>
