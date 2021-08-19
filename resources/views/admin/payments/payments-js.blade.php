<script>
$(document).ready(function() {
    $(document).ready(function() {
        $('#payments-ajax-datatable').DataTable( {
            "ajax": "{{ asset('dist/stats/payments.txt') }}"
        } );
    } );
} );
</script>