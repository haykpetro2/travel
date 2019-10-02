$(document).ready(function () {

    $('#country').on('change', function () {
        $.ajax({
            url: route('country.change'),
            type: "post",
            data: {id: $(this).val()},
            success: function (data) {
                $('#city').removeAttr('disabled').html('');
                for (var i = 0; i < data.cities.length; i++) {
                    $('#city').append('<option value="' + data.cities[i].id + '">' + data.cities[i].name_en + '</option>');
                }
            }
        });
    });

    $('.hotel-delete').on('click', function () {
        $.ajax({
            url: "hotel/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function (data) {
                if (data.success) {
                    $('#hotel-' + data.id).remove();
                    toastr.success('Hotel Delete')
                }
            }, error: function () {
                toastr.error('Server Error')
            }
        });
    });

    $('.photo-delete').on('click', function () {
        $.ajax({
            url: route('photo.room'),
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