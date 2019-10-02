$(document).ready(function () {

    $('.change-total').on('change', function () {
        $.ajax({
            url: route('excursion.total'),
            type: "post",
            data: $('.book-excursion').serialize(),
            success: function (data) {
                if (data.success) {
                    $('#excursion-total').html(data.total);
                    $('#per-person').html(data.per_person);
                }
            }
        })
    });

    $('#booking').on('click', function () {
        $.ajax({
            url: route('excursion.booking'),
            type: "post",
            beforeSend: function () {
                toastr.info($('#loading').val());
            },
            data: $('.book-excursion').serialize(),
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