$(document).ready(function () {

    $('.apartment-delete').on('click', function () {
        $.ajax({
            url: "apartment/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.photo-delete').on('click', function () {
        $.ajax({
            url: route('photo.apartment'),
            type: "post",
            data: {id: $(this).data('id')},
            success: function (data) {
                if (data.success) {
                    $('#photo-' + data.id).remove();
                    toastr.success('Photo Delete')
                }
            }, error: function () {
                toastr.error('Server Error')
            }
        });
    });

});