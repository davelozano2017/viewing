<style>.custom{background:transparent;border:none;outline:none};</style>
<?php 
$i = 0;
if (isset($_POST['branch']) && isset($_POST['course']) && isset($_POST['subject']) && isset($_POST['section'])) {
    $branch = $data->post($_POST['branch']);
    $course = $data->post($_POST['course']);
    $subject = $data->post($_POST['subject']);
    $section = $data->post($_POST['section']);
    $result = $data->search_student($branch,$course,$subject,$section);
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




<style>
    .whitemoto { color: #fff; };
</style>
<script>
$(document).ready(function() {
    var handleDataTableButtons = function() {
        if ($("#report_table").length) {
          $("#report_table").DataTable({
            dom: "Bfrtip",
            buttons: [
              {
                extend: "print",
                className: "btn-sm flat whitemoto btn-primary"
              },
            ],
            responsive: true
          });
        }
      };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();


        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();


        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });

</script>

