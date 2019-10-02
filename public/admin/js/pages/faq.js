$(document).ready(function () {
    $('.faq-delete').on('click', function () {
        $.ajax({
            url: "faq/" + $(this).data('id'),
            type: "post",
            data: {_method: 'delete'},
            success: function () {
                location.reload();
            }
        });
    });
});