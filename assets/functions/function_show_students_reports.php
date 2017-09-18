<style>.custom{background:transparent;border:none;outline:none};</style>
<?php 
$i = 0;
if (isset($_POST['branch']) && isset($_POST['course']) && isset($_POST['section'])) {
    $branch = $data->post($_POST['branch']);
    $course = $data->post($_POST['course']);
    $section = $data->post($_POST['section']);
    $result = $data->search_student($branch,$course,$section);
} else {
  $result = $data->show_students();
}
?>
<table id="report_table" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
<thead>
    <tr>
    <th>Name</th>
    <th>School ID</th>
    <th>Branch</th>
    <th>Course</th>
    <th>Subject</th>
    <th>Section</th>
    </tr>
</thead>
<tbody>
<?php foreach($result as $row): ?>
<tr>
<td><?php echo $row['firstname']. ' '.$row['middlename']. ' '.$row['lastname']?></td>
<td><?php echo $row['username']?></td>
<td><?php echo $row['branch']?></td>
<td><?php echo $row['course']?></td>
<td><?php echo $row['subject']?></td>
<td><?php echo $row['section']?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
 $('#report_table').DataTable({
  "paging": true, "lengthChange": true, "searching": true,
  "ordering": false, "info": false, "autoWidth": true
});
</script>