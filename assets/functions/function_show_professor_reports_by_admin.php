<style>.custom{background:transparent;border:none;outline:none};</style>
<table id="report_table" class="table table-striped dt-responsive responsive nowrap" style="width:100%">
<thead>
    <tr>
    <th>Name</th>
    <th>Employee ID</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Branch</th>
    </tr>
</thead>
<tbody>
  <?php foreach($data->show_professor_by_admin() as $row): ?>
  <tr>
  <td><?php echo $row['firstname']. ' '.$row['middlename']. ' '.$row['lastname']?></td>
  <td><?php echo $row['username']?></td>
  <td><?php echo $row['contact']?></td>
  <td><?php echo $row['email']?></td>
  <td><?php echo $row['branch']?></td>
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

