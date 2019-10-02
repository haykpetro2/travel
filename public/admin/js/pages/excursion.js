$(document).ready(function () {

    $('.excursion-delete').on('click', function () {
        $.ajax({
            url: "excursion/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function (data) {
                $('#excursion-' + data.id).remove();
                toastr.success('Excursion Delete')
            }
        });
    });

    $('.photo-delete').on('click', function () {
        $.ajax({
            url: route('photo.excursion'),
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