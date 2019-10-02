$(document).ready(function () {
    $('.currency').on('click', function () {
        $.ajax({
            url: route('change'),
            type: 'post',
            data: {name: $(this).data('name')},
            success: function (data) {
                if (data)
                    location.reload();
            }
        })
    })
});