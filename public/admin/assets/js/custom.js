function initAjaxSelect2($selector,$source_url){
    $selector.select2({

        placeholder: "--Select Option-- ",
        selectOnClose: true,
        width:"100%",
        allowClear: true,
        minimumInputLength: 0,
//                tags: true,
        ajax: {
            url: $source_url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data,params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 5)
                    }
                };
            },
            cache: true
        },
        templateSelection: function (data, container) {
            // Add custom attributes to the <option> tag for the selected option
            $(data.element).attr('partname', data.attr1);
            $(data.element).attr('customer', data.attr2);
            $(data.element).attr('batch_qty', data.attr4);
            return data.text;
            }
    });
}

function part_n_selector($selector,$source_url){
    $selector.select2({

        placeholder: "--Select Option-- ",
        selectOnClose: true,
        width:"100%",
        allowClear: true,
        minimumInputLength: 0,
//                tags: true,
        ajax: {
            url: $source_url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data,params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 5)
                    }
                };
            },
            cache: true
        },
        templateSelection: function (data, container) {
            // Add custom attributes to the <option> tag for the selected option
            // $(data.element).attr('partname', data.attr1);
            $(data.element).attr('batch_no', data.attr1);
            $(data.element).attr('customer', data.attr2);
            return data.text;
            }
    });
}

function customer_n_selector($selector,$source_url){
    $selector.select2({

        placeholder: "--Select Option-- ",
        selectOnClose: true,
        width:"100%",
        allowClear: true,
        minimumInputLength: 0,
//                tags: true,
        ajax: {
            url: $source_url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data,params) {
                params.page = params.page || 1;
                return {
                    results: data.results,
                    pagination: {
                        more: (params.page * 5)
                    }
                };
            },
            cache: true
        },
        templateSelection: function (data, container) {
            // Add custom attributes to the <option> tag for the selected option
            $(data.element).attr('partname', data.attr1);
            $(data.element).attr('batch_no', data.attr2);
            $(data.element).attr('batch_qty', data.attr4);
            // $(data.element).attr('batch_no', data.attr5);
            return data.text;
            }
    });
}

 