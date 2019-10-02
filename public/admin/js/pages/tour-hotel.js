$(document).ready(function () {

    $('#create').on('click', function () {
        $.ajax({
            url: route('table'),
            type: "post",
            data: {row: $('#row').val(), column: $('#column').val()},
            success: function (data) {
                $('#table').html(data);
            }
        });
    });

    $(document).on('click', '.js-confirm_tours', function (e) {
        let form = $('#tour-form');
        let requestObj = {};
        let counts = [];
        let eachRow = form.find("tr:not('#tour-form tr:first')");
        $.each(form.find('tr:first').find('input'), function (key, value) {
            counts.push($(value).val())
        });
        $.each(eachRow, function (key, value) {
            let hotelRow = {};
            $.each(counts, function (key, count) {
                Object.defineProperty(hotelRow, count, {
                    value: `"${$(value).find('input').eq(key).val()}"`,
                    writable: true,
                    enumerable: true,
                    configurable: true
                });
            });
            Object.defineProperty(requestObj, `"${$(value).find('select').val()}"`, {
                value: hotelRow, writable: true, enumerable: true, configurable: true
            });
        });

        $.ajax({
            url: route('tour-hotel.store'),
            type: "post",
            data: {requestObj: requestObj, tour_id: $('#tour_id').val()},
            success: function () {
                location.href = adminUrl + '/tour/' + $('#tour_id').val();
            }
        });

    });

});