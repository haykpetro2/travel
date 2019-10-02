$(document).ready(function () {
    $('#transport-total').hide();

    $('.transport-attributes').on('change', function () {
        total();
    });

    $('.checks').on('change', function () {
        total();
    });

    function total() {
        var attr = [];
        var check_in = $('input[name="check_in"]').val();
        var check_out = $('input[name="check_out"]').val();
        var id = $('#transport_id').val();
        $('.transport-attributes').each(function () {
            if ($(this).is(':checked')) {
                attr.push($(this).val())
            }
        });

        $.ajax({
            url: route('transport.total'),
            type: "post",
            data: {attr: attr, check_in: check_in, check_out: check_out, id: id},
            success: function (data) {
                if (data.success) {
                    $('#transport-total').show();
                    $('#transport-total span').html(data.total);
                }
            }
        });
    }

    $('#booking').on('click', function () {

        $.ajax({
            url: route('transport.booking'),
            type: "post",
            beforeSend: function () {
                toastr.info($('#loading').val());
            },
            data: $('.book-transport').serialize(),
            success: function (data) {
                if (data.success) {
                    if (data.success) {
                        toastr.remove();
                        toastr.success($('#success-back').val());
                    }
                    if (data.errors) {
                        toastr.remove();
                        toastr.warning($('#validator-error').val());
                    }
                }
            }, error: function () {
                toastr.remove();
                toastr.error($('#server-error').val());
            }
        })
    });
});
