$(document).ready(function () {
    $('.about-delete').on('click', function () {
        $.ajax({
            url: "about/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });
});