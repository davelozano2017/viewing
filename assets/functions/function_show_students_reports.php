<?php 
if (isset($_POST['branch']) && isset($_POST['course']) && isset($_POST['section'])) {
    $branch = $data->post($_POST['branch']);
    $course = $data->post($_POST['course']);
    $section = $data->post($_POST['section']);
    $result = $data->show_students_reports($branch,$course,$section);
} else {
  $result = $data->show_students();
}
?>
<table id="datatable-buttons" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
<thead>
    <tr>
    <th>Name</th>
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
    <td><?php echo $row['branch']?></td>
    <td><?php echo $row['course']?></td>
    <td><?php echo $row['subject']?></td>
    <td><?php echo $row['section']?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<script>
$(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
                "paging": true, "lengthChange": true, "searching": true,
                "ordering": false, "info": true, "autoWidth": true,
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm flat"
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

        $('#datatable').dataTable();

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