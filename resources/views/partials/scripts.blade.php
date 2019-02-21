<!-- REQUIRED JS SCRIPTS -->
<!-- <script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->

<script>

    $(document).ready(function(){
        $('#myTable').DataTable();
        $('select[name="myTable_length"] option').click(function (){
          $('input[data-toggle="toggle"]').bootstrapToggle();
        });
        $('#myTable_next').click(function () {
            $('input[data-toggle="toggle"]').bootstrapToggle();
        });
        $('#myTable_previous').click(function() {
          $('input[data-toggle="toggle"]').bootstrapToggle();
        });
        $('.paginate_button').click(function(){
          $('input[data-toggle="toggle"]').bootstrapToggle();
        });
    });
    //console.log("items: " + window.Items);
</script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('js/ajaxDelete.js') }}"></script>
<!-- script para cambiar el status del banner producto y etc -->
<script src="{{ asset('js/ajaxStatus.js') }}"></script>
<!-- DataTables.js -->
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/datatables.min.js') }}"></script>

<script src="{{ asset('/js/common.js') }}"></script>