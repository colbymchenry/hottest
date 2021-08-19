<?php $alerts = \App\Http\AlertHelper::getAlerts() ?>
@if(Session::has('alerts'))
    @if(array_key_exists('success', $alerts))
        <button type="button" id="success-alert" class="js-notify" style="display:none;" data-type="success" data-icon="fa fa-fw fa-check mr-1" data-message="{{ $alerts['success'] }}"></button>
    @endif
    @if(array_key_exists('danger', $alerts))
        <button type="button" id="error-alert" class="js-notify" style="display:none;" data-type="danger" data-icon="fa fa-fw fa-check mr-1" data-message="{{ $alerts['danger'] }}"></button>
    @endif
    @if(array_key_exists('warning', $alerts))
        <button type="button" id="warning-alert" class="js-notify" style="display:none;" data-type="warning" data-icon="fa fa-fw fa-check mr-1" data-message="{{ $alerts['warning'] }}"></button>
    @endif
    @if(array_key_exists('info', $alerts))
        <button type="button" id="info-alert" class="js-notify" style="display:none;" data-type="info" data-icon="fa fa-fw fa-check mr-1" data-message="{{ $alerts['info'] }}"></button>
    @endif
@endif

{{ \App\Http\AlertHelper::clearAlerts() }}

<!-- SweetAlert2 JS -->
<script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Used for alerts -->
<script>
    const Toast = swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000
    });
    $(document).ready(function() {
        if($('#success-alert').data('message'))
        {
            Toast.fire({
                type: 'success',
                title: $('#success-alert').data('message')
            });
        }
        if ($('#error-alert').data('message'))
        {
            Toast.fire({
                type: 'error',
                title: $('#error-alert').data('message')
            });
        }
        if ($('#warning-alert').data('message'))
        {
            Toast.fire({
                type: 'warning',
                title: $('#warning-alert').data('message')
            });
        }
        if ($('#info-alert').data('message'))
        {
            Toast.fire({
                type: 'info',
                title: $('#info-alert').data('message')
            });
        }
    });
</script>