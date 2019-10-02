$(document).ready(function () {

    $('.condition-delete').on('click', function () {
        $.ajax({
            url: adminUrl + '/condition/' + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        })
    });
    $('.currency-update').on('click', function () {
        $.ajax({
            url: route('currency.store'),
            type: "post",
            data: {
                amd: $('#amd').val(),
                rub: $('#rub').val(),
                usd: $('#usd').val(),
                euro: $('#euro').val(),
            },
            success: function () {
                location.reload();
            }
        })
    });
    $('.background-delete').on('click', function () {
        $.ajax({
            url: adminUrl + '/background/' + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        })
    });

    $('#page').on('change', function () {

        if ($(this).val() == 'video') {
            $('#image').attr('type', 'text').attr('name', 'video');
            $("label[for='image']").html('Video Url');

        } else {
            $('#image').attr('type', 'file').attr('name', 'image');
            $("label[for='image']").html('Image');
        }
    });

});