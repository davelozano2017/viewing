<?php date_default_timezone_set('Asia/Manila');?>
<style>.custom{background:transparent;border:none;outline:none};</style>
<table id="tables" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Branch</th>
      <th>Course</th>
      <th>Name</th>
      <th>Subject</th>
      <th>Section</th>
      <th>Date</th>
      <th></th>
    </tr>
  </thead>
<tbody>
<?php $i = 0; foreach($data->show_grades() as $row): ?>
  <?php 
    $query = $data->filter_professor($row['professor_id']);
    $r = $query->fetch_object();
    $gender = $r->gender;
    if($gender == 'Male') {
      $name = 'Mr. '. $r->firstname. ' '.$r->middlename.' '.$r->lastname;
    } else {
      $name = 'Ms. '. $r->firstname. ' '.$r->middlename.' '.$r->lastname;
    }

    if(date('Y-m-d') == $row['date']){
      $date = 'Today';
    } else {
      $date = date('M d, Y');
    }

    $role = $_SESSION['role'];
    if($role == 0 && $row['status'] == 0 || $role == 1 || $role == 2 && $row['status'] == 0 ) {
        $modify = 'Approved';
    } elseif($role == 0) {
        $modify = '<button onclick="approveuploadedgrades('.$row['code'].')" class="custom"><i class="fa fa-check"></i></button>';
    } elseif($role == 2) {
        $modify = '<button onclick="removeuploadedgrades('.$row['code'].')" class="custom"><i class="fa fa-remove"></i></button>';
    }
  
  ?>
  <tr>
  <td style="width:1px"><?php echo ++$i?></td>
  <td><?php echo $row['branch']?></td>
  <td><?php echo $row['course']?></td>
  <td><?php echo $name?></td>
  <td><?php echo $row['subject']?></td>
  <td><?php echo $row['section']?></td>
  <td><?php echo $date?></td>
  <td><?php echo $modify?></td>
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
