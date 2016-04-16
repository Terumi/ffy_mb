$(function () {

    //select2
    $('.userSearch').select2({
        width: '100%',
        multiple: true,
        minimumInputLength: 2,
        minimumResultsForSearch: 10,
        ajax: {
            url: 'api/users/get',
            dataType: "json",
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                }
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (key, item) {
                        return {
                            text: item,
                            id: key
                        }
                    })
                };
            }
        }
    });

    //new message
    $('#mailbox-new-mail').on('submit', function () {

        var data = $('#mailbox-new-mail').serializeArray();
        event.preventDefault();

        $('#mailModal #errors').hide();
        $('#mailModal #to-error').hide();
        $('#mailModal #title-error').hide();
        $('#mailModal #body-error').hide();

        $.ajax({
            type: "POST",
            url: "mailbox/send",
            data: data,
            dataType: "json",
            success: function (data) {
                $('#mailModal').on('hidden.bs.modal', function () {
                    location.reload();
                });
                $('#mailModal').modal('hide');
            },
            error: function (data) {
                $('#mailModal #errors').show();
                var json = data.responseJSON;
                if (json.to) {
                    $('#mailModal #to-error').show();
                }
                if (json.title) {
                    $('#mailModal #title-error').show();
                }
                if (json.body) {
                    $('#mailModal #body-error').show();
                }


                //alert('error handing here');
            }
        });
    });
});