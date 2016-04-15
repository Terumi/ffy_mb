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