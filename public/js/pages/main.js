$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.datepicker').datepicker({
        format: 'Y-mm-dd',
        "setDate": new Date(),
    });

    $('#booking').attr('disabled', true).css('cursor', 'no-drop');

    $(document).on('change', '#term', function () {
        if ($(this).is(":checked")) {
            $('#booking').removeAttr('disabled').css('cursor', 'pointer');
        } else {
            $('#booking').attr('disabled', true).css('cursor', 'no-drop');
        }
    });

    $('#send_subscribe').on('click', function () {
        $.ajax({
            url: route('send.subscribe'),
            type: 'post',
            beforeSend: function () {
                toastr.info($('#loading-sub').val());
            },
            data: {email: $('#subscribe').val()},
            success: function (data) {
                if (data.success) {
                    toastr.remove();
                    toastr.success($('#success-back-sub').val());
                }
                if (data.errors) {
                    toastr.remove();
                    toastr.warning($('#validator-error-sub').val());
                }
            }, error: function () {
                toastr.remove();
                toastr.error($('#server-error-sub').val());
            }
        });
    });

});