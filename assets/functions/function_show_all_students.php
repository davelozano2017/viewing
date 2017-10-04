<style>.custom{background:transparent;border:none;outline:none};</style>
<table id="tables" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Student ID</th>
      <th>Branch</th>
      <th>Course</th>
      <th>Subject</th>
      <th>Section</th>
      <th>School Year</th>
      <th style="width:1px"></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_students() as $row): ?>
  <tr>
  <td><?php echo $row['firstname']. ' '.$row['middlename']. ' '.$row['lastname']?></td>
  <td><?php echo $row['username']?></td>
  <td><?php echo $row['branch']?></td>
  <td><?php echo $row['course']?></td>
  <td><?php echo $row['subject']?></td>
  <td><?php echo $row['section']?></td>
  <td><?php echo $row['sy']?></td>
  <td><button class="btn btn-primary flat" id="add<?php echo $row['student_id']?>" onclick="add_student('<?php echo $row['student_id']?>','<?php echo $_SESSION['id']?>')">Add Student</button></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<script>

$('#tables').DataTable({
"paging": true, "lengthChange": true, "searching": true,
"ordering": false, "info": false, "autoWidth": true
});
  $.ajax({
      type : 'POST',
      url : '../' +url,
      data : { action : 'Students' },
      success:function(response){
        var array = response.split(",");
        for (var i in array){
            
            $('#add'+array[i]).html('Remove Student').removeClass('btn-primary').addClass('btn-danger');
        }
      }
});
</script>


