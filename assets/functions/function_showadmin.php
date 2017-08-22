<table id="show_administrator" class="table table-bordered table-striped">
<thead>
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Contact</th>
  <th></th>
</tr>
</thead>
<tbody>

<?php $i = 0; foreach($data->showadmin() as $row): ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']?></td>
  <td><?php echo $row['contact']?></td>
  <td style="text-align:center;width:10px"><?php echo '<a href="administrator_info.php?id='.$row['id'].'">View</a>';?></td>
  </tr>
<?php endforeach; ?>

</tbody>
</table>