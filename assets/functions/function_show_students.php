<table id="tables" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Branch</th>
      <th>Course</th>
      <th>Section</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_students() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['firstname']. ' '.$row['middlename']. ' '.$row['lastname']?></td>
  <td><?php echo $row['branch']?></td>
  <td><?php echo $row['course']?></td>
  <td><?php echo $row['section']?></td>
  <td></td>
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
