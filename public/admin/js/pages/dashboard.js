$(document).ready(function () {
    $('.orders').on('click', function () {
        var model = $(this).data('name');
        $.ajax({
            url: route('orders'),
            type: "post",
            data: {model: model},
            success: function (data) {
                if (data) {
                    $('.match-height').css('visibility', 'visible');
                    $('.table-responsive').html(data);
                } else {
                    $('.match-height').css('visibility', 'hidden');
                    alert('Nothing To Show')
                }
            }
        })
    });

    $(document).on('click', '.order-delete', function () {
        $.ajax({
            url: route('order.delete'),
            type: 'post',
            data: {id: $(this).data('id'), name: $(this).data('name')},
            success: function (data) {
                if (data.success) {
                    $('#order-' + data.id).remove();
                    toastr.success('Order Delete');
                }
            }, error: function () {
                toastr.error('Server Error');
            }
        });
    });
});