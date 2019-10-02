$(document).ready(function () {

    $(document).on('change', '.checks', function () {
        $('input[name="check_in"]').addClass('checks');
        var check_in = $('input[name="check_in"]').val();
        var check_out = $('input[name="check_out"]').val();
        var room_id = $('#room_id').val();

        $.ajax({
            url: route('hotel.total'),
            type: 'post',
            data: {check_in: check_in, check_out: check_out, room_id: room_id},
            success: function (data) {
                if (data.success) {

                    $('#total').html('<span>' + data.total + '</span>');
                }
                if (data.error) {
                    $('#total').html('<span>' + data.total + '</span>');
                    alert('Hi');
                }
            }
        });

    });

    $('#booking').on('click', function () {
        $.ajax({
            url: route('hotel.booking'),
            type: "post",
            beforeSend: function () {
                toastr.info($('#loading').val());
            },
            data: $('.book-hotel').serialize(),
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