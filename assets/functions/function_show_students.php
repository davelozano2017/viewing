<style>.custom{background:transparent;border:none;outline:none};</style>
<table id="tables" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>School ID</th>
      <th>Branch</th>
      <th>Course</th>
      <th>Subject</th>
      <th>Section</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_students() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['firstname']. ' '.$row['middlename']. ' '.$row['lastname']?></td>
  <td><?php echo $row['username']?></td>
  <td><?php echo $row['branch']?></td>
  <td><?php echo $row['course']?></td>
  <td><?php echo $row['subject']?></td>
  <td><?php echo $row['section']?></td>
  <td><button class="custom" onclick="edit_student('<?php echo $row['studentid']?>','<?php echo $row['id']?>','<?php echo $row['firstname']?>','<?php echo $row['middlename']?>','<?php echo $row['lastname']?>','<?php echo $row['branch']?>','<?php echo $row['course']?>','<?php echo $row['subject']?>','<?php echo $row['section']?>','<?php echo $row['username']?>','<?php echo $row['email']?>','<?php echo $row['contact']?>','<?php echo $row['gender']?>','<?php echo $row['sy']?>')"><i class="fa fa-pencil"></i></button></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
$('#tables').DataTable({
"paging": true, "lengthChange": true, "searching": true,
"ordering": false, "info": false, "autoWidth": true
});
</script>
