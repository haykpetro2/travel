$(document).ready(function () {

    $('.tour-type-create').on('click', function () {
        $.ajax({
            url: route('tour-type.store'),
            type: "post",
            data: {name_ru: $('#tour_type_name_ru').val(), name_en: $('#tour_type_name_en').val()},
            success: function () {
                location.reload();
            }
        });
    });
    $('.tour-type-update').on('click', function () {
        var id = $(this).data('id');
        var name_ru = $('#tour-type-name-ru-' + id).val();
        var name_en = $('#tour-type-name-en-' + id).val();
        $.ajax({
            url: "tour-type/" + id,
            type: "post",
            data: {name_ru: name_ru, name_en: name_en, _method: 'put'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.tour-type-delete').on('click', function () {
        $.ajax({
            url: "tour-type/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function (data) {
                location.reload();
            }
        });
    });
    $('.expert-delete').on('click', function () {
        $.ajax({
            url: "expert/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });
    $('.tour-delete').on('click', function () {
        $.ajax({
            url: "tour/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.destination-delete').on('click', function () {
        $.ajax({
            url: adminUrl + '/tour-destination/' + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.tour-hotel-delete').on('click', function () {
        $.ajax({
            url: adminUrl + '/tour-hotel/' + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.promo-code-update').on('click', function () {
        var tour_id = "{{$tour->id}}";
        var percent = $('#percent').val();
        var code = $('#code').val();

        $.ajax({
            url: route('promo.code'),
            type: "post",
            data: {tour_id: tour_id, percent: percent, code: code},
            success: function () {
                location.reload();
            }
        });
    });

});