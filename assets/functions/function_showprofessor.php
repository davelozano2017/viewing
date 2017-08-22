
<table id="show_professors" class="table table-bordered table-striped">
<thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Contact</th>
  <th></th>
</tr>
</thead>
<tbody>

<?php $i = 0; foreach($data->showprofessor() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']?></td>
  <td><?php echo $row['contact']?></td>
  <td style="text-align:center;width:10px"><?php echo '<a href="professor_info.php?id='.$row['id'].'">View</a>';?></td>
  </tr>
<?php endforeach; ?>

</tbody>

<script>
$('#show_professors').DataTable({
"paging": true, "lengthChange": true, "searching": true,
"ordering": false, "info": true, "autoWidth": true
});
</script>
</table>