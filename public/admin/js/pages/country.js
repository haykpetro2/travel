$(document).ready(function () {

    $('.country-delete').on('click', function () {
        $.ajax({
            url: "country/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function (data) {
                if (data.success) {
                    $('#country-' + data.id).remove();
                    $('.country-city-' + data.id).remove();
                    $('.country-city-photos-' + data.id).remove();
                    toastr.success('Country Delete')
                }
            }
        });
    });
    $('.city-delete').on('click', function () {
        $.ajax({
            url: "city/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function (data) {
                if (data.success) {
                    $('#city-' + data.id).remove();
                    $('.city-' + data.id).remove();
                    toastr.success('City Delete')
                }
            }, error: function () {
                toastr.error('Server Error')
            }
        });
    });
    $('.photo-delete').on('click', function () {
        $.ajax({
            url: route('photo.city'),
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