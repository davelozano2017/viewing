<table id="students" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_request_students() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['name']?></td>
  <td style="text-align:center"><a style="cursor:pointer" onclick="request_students('<?php echo $row['id']?>')"> Reset Password</a></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>