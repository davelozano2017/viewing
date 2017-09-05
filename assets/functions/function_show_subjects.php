<style>.custom{background:transparent;border:none;outline:none};</style>
<table id="subject_tables" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Course</th>
      <th>Section</th>
      <th>Subjects</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_subjects($_SESSION['id']) as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['course']?></td>
  <td><?php echo $row['section']?></td>
  <td><?php echo $row['subject']?></td>
  <td><button class="custom" onclick="edit_subject('<?php echo $row['id']?>','<?php echo $row['professor_id']?>','<?php echo $row['course']?>','<?php echo $row['subject']?>','<?php echo $row['section']?>')"><i class="fa fa-pencil"></i></button></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
$('#subject_tables').DataTable({
"paging": true, "lengthChange": true, "searching": true,
"ordering": false, "info": false, "autoWidth": true
});
</script>
