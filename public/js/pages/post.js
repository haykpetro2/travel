$(document).ready(function () {
    $('.post-filter').on('click', function () {
        $('.post-filter').parent('li').removeClass('active');
        $(this).parent('li').addClass('active');
        $.ajax({
            url: route('post.filter'),
            type: 'post',
            data: {id: $(this).data('id')},
            success: function (data) {
                $('.blog-list').html(data);
            }
        });
    });
    $('.tag-filter').on('click', function () {
        $.ajax({
            url: route('tag.filter'),
            type: 'post',
            data: {id: $(this).data('id')},
            success: function (data) {
                $('.blog-list').html(data);
            }
        });
    });
});