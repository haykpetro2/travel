$(document).ready(function () {

    $('#apartment-total').css('visibility', 'hidden');

    $('.checks').on('change', function () {
        var check_in = $('input[name="check_in"]').val();
        var check_out = $('input[name="check_out"]').val();
        var id = $('#apartment_id').val();
        $.ajax({
            url: route('apartment.total'),
            type: "post",
            data: {check_in: check_in, check_out: check_out, id: id},
            success: function (data) {
                if (data.success) {
                    $('#apartment-total').css('visibility', 'visible');
                    $('#apartment-total span').html(data.total)
                }
            }
        });
    });

    $('#booking').on('click', function () {
        $.ajax({
            url: route('apartment.booking'),
            type: "post",
            beforeSend: function () {
                toastr.info($('#loading').val());
            },
            data: $('.book-apartment').serialize(),
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