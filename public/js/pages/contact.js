$(document).ready(function () {

    $('#send-contact').on('click', function () {
        $.ajax({
            url: route('send'),
            type: "post",
            beforeSend: function () {
                toastr.info($('#loading').val());
            },
            data: $('.contact-form').serialize(),
            success: function (data) {
                if (data.success) {
                    toastr.remove();
                    toastr.success($('#success-back').val());
                }
                if (data.errors) {
                    toastr.remove();
                    toastr.warning($('#validator-error').val());
                }
            }, error: function () {
                toastr.remove();
                toastr.error($('#server-error').val());
            }
        });
    });
});