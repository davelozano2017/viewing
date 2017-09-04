<table id="professors" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th>#</th>
    <th>Name</th>
    <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_request_professors() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['name']?></td>
  <td style="text-align:center">
  <button style="background:transparent;border:none;outline:none" id="executerequest<?php echo $row['id']?>" onclick="request_professors('<?php echo $row['id']?>')"> Reset Password</button></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
$('#professors').DataTable({
"paging": true, "lengthChange": true, "searching": false, "autoWidth": true
});
</script>