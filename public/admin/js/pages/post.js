$(document).ready(function () {

    $('.category-create').on('click', function () {
        $.ajax({
            url: route('category.store'),
            type: "post",
            data: {name_ru: $('#category_name_ru').val(), name_en: $('#category_name_en').val()},
            success: function () {
                location.reload();
            }
        });
    });
    $('.category-update').on('click', function () {
        var id = $(this).data('id');
        var name_ru = $('#category-name-ru-' + id).val();
        var name_en = $('#category-name-en-' + id).val();
        $.ajax({
            url: "category/" + id,
            type: "post",
            data: {name_ru: name_ru, name_en: name_en, _method: 'put'},
            success: function () {
                location.reload();
            }
        });
    });
    $('.category-delete').on('click', function () {
        $.ajax({
            url: "category/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.tag-create').on('click', function () {
        $.ajax({
            url: route('tag.store'),
            type: "post",
            data: {name: $('#tag_name').val()},
            success: function () {
                location.reload();
            }
        });
    });
    $('.tag-update').on('click', function () {
        var id = $(this).data('id');
        var name = $('#tag-name-' + id).val();
        $.ajax({
            url: "tag/" + id,
            type: "post",
            data: {name: name, _method: 'put'},
            success: function () {
                location.reload();
            }
        });
    });
    $('.tag-delete').on('click', function () {
        $.ajax({
            url: "tag/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

    $('.photo-delete').on('click', function () {
        $.ajax({
            url: route('photo.post'),
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
    $('.post-delete').on('click', function () {
        $.ajax({
            url: "post/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });

});
