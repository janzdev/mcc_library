<script src="assets/js/validate.js"></script>



<!-- Alertify JS link -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>




<!-- Bootstrap JS  -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- JQuery JS -->
<script src="assets/js/jquery-3.6.1.min.js"></script>
<!-- JQuery Datatables -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<!-- Boostrap 5 Datatables -->
<script src="assets/js/dataTables.bootstrap5.min.js"></script>


<script type="text/javascript">
// JQuery DataTable 
$(document).ready(function() {
     $('#myDataTable').DataTable({
          'pagingType': 'full_numbers',
          'lengthMenu': [
               [10, 25, 50, -1],
               [10, 25, 50, 'All']
          ],
          'responsive': 'true',
          'language': {
               search: "_INPUT_",
               searchPlaceholder: "Search",

          }

     });
});
// $(document).ready(function() {
//      $('#myDataTable').DataTable({
//           "fnCreatedRow": function(nRow, aData, iDataIndex) {
//                $(nRow).attr('book_id', aData[0]);
//           },
//           'serverSide': 'true',
//           'processing': 'true',
//           'paging': 'true',
//           'order': [],
//           'ajax': {
//                'url': 'admin_code.php',
//                'type': 'POST',
//           },
//           "aoColumnDefs": [{
//                     "bSortable": false,
//                     "aTargets": [7]
//                },

//           ]
//      });
// });
</script>

<!-- Tooltip link -->
<script src="assets/js/tooltip.js"></script>

<script src="assets/js/main.js"></script>

</body>

</html>