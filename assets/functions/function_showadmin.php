<table id="show_administrator" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
<thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Username</th>
  <th>Contact</th>
  <th>Branch</th>
  <th></th>
</tr>
</thead>
<tbody>

<?php $i = 0; foreach($data->showadmin() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']?></td>
  <td><?php echo $row['username']?></td>
  <td><?php echo $row['contact']?></td>
  <td><?php echo $row['branch']?></td>
  <td style="text-align:center;width:10px"><?php echo '<a href="administrator_info.php?id='.$row['id'].'">View</a>';?></td>
  </tr>
<?php endforeach; ?>

</tbody>
</table>
<script>
$('#show_administrator').DataTable({
"paging": true, "lengthChange": true, "searching": true,
"ordering": false, "info": true, "autoWidth": true
});
</script>