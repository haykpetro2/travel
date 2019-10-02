$(document).ready(function () {

    $('#promo_code').keyup(function () {
        total();
    });

    $('.send-total').on('change', function () {
        total();
    });

    function total() {
        $.ajax({
            url: route('tour.total'),
            type: 'post',
            data: $('.book-tour').serialize(),
            success: function (data) {
                if (data.success) {
                    $('#total').html('<span>' + data.total + '</span>');
                }
            }
        });
    }

    $('#booking').on('click', function () {
        $.ajax({
            url: route('tour.booking'),
            type: "post",
            beforeSend: function () {
                toastr.info($('#loading').val());
            },
            data: $('.book-tour').serialize(),
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
        })
    });

});