<script>
$(document).ready(function() {
    $(document).ready(function() {
        $('#users-ajax-datatable').DataTable( {
            "ajax": "{{ asset('dist/stats/users.txt') }}"
        } );
    } );
} );
</script>