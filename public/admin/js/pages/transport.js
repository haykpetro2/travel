$(document).ready(function () {

    $('.transport-type-create').on('click', function () {
        $.ajax({
            url: route('transport-type.store'),
            type: "post",
            data: {name_ru: $('#transport_type_name_ru').val(), name_en: $('#transport_type_name_en').val()},
            success: function () {
                location.reload();
            }
        });
    });
    $('.transport-type-update').on('click', function () {
        var id = $(this).data('id');
        var name_ru = $('#transport-type-name-ru-' + id).val();
        var name_en = $('#transport-type-name-en-' + id).val();
        $.ajax({
            url: "transport-type/" + id,
            type: "post",
            data: {name_ru: name_ru, name_en: name_en, _method: 'put'},
            success: function () {
                location.reload();
            }
        });
    });
    $('.transport-type-delete').on('click', function () {
        $.ajax({
            url: "transport-type/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.transport-model-create').on('click', function () {
        $.ajax({
            url: route('transport-model.store'),
            type: "post",
            data: {
                name_ru: $('#transport_model_name_ru').val(),
                name_en: $('#transport_model_name_en').val()
            },
            success: function () {
                location.reload();
            }
        });
    });
    $('.transport-model-update').on('click', function () {
        var id = $(this).data('id');
        var name_ru = $('#transport-model-name-ru-' + id).val();
        var name_en = $('#transport-model-name-en-' + id).val();
        $.ajax({
            url: "transport-model/" + id,
            type: "post",
            data: {name_ru: name_ru, name_en: name_en, _method: 'put'},
            success: function () {
                location.reload();
            }
        });
    });
    $('.transport-model-delete').on('click', function () {
        $.ajax({
            url: "transport-model/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });


    $('.transport-attribute-update').on('click', function () {
        var id = $(this).data('id');
        var name_ru = $('#transport-attribute-name-ru-' + id).val();
        var name_en = $('#transport-attribute-name-en-' + id).val();
        var price = $('#transport-attribute-price-' + id).val();
        var icon = $('#icon-' + id).find('input').val();

        $.ajax({
            url: "transport-attribute/" + id,
            type: "post",
            data: {
                name_ru: name_ru,
                name_en: name_en,
                price: price,
                icon: icon,
                _method: 'PUT'
            },
            success: function () {
                location.reload();
            }
        });

    });
    $('.transport-attribute-delete').on('click', function () {
        $.ajax({
            url: "transport-attribute/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });


    $('.transport-delete').on('click', function () {
        $.ajax({
            url: "transport/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });
    $('.photo-delete').on('click', function () {
        $.ajax({
            url: route('photo.transport'),
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

    $('.price-delete').on('click', function () {
        $.ajax({
            url: adminUrl + '/transport-price/' + $(this).data('id'),
            type: "post",
            data: {_method: 'DELETE'},
            success: function () {
                location.reload();
            }
        });
    });

});