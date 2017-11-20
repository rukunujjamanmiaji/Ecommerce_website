var B2Custom = {};
jQuery(document).ready(function () {
    var id = jQuery(".main_page_content").attr("id");
    if (id && id.length > 0)
        B2Custom[id]();
});

B2Custom.admin_users_index = function () {
    B2.initDatePicker();
}
B2Custom.admin_users_add = function () {
    $('.summernote').summernote({
        'height': 200
    });
}

B2Custom.admin_categories_index = function () {
    UITree.init();
    jQuery("#btn_add_parent_category").click(function (evt) {
        evt.preventDefault();
        $("#category_nodes").jstree('close_all');
        $.ajax({
            type: "GET",
            cache: false,
            url: '/admin/categories/get_category_data/',
            success: function (res) {
                $('#add_category').html(res);

            },
        });
    });
    jQuery("#btn_add_child_category").click(function (evt) {
        evt.preventDefault();
        text = "<input type='hidden' value='" + $('#id').val() + "' name='parent_id' />";
        $('#CategoryParentId').html(text)
        // $('#parent_id').val($('#id').val());
        $('#id').val('');
        $('#name').val('');
        $('#url-name').val('');
    });
}

B2Custom.select2 = function (url) {
    $(".ajax_select2").select2({
        ajax: {
            url: url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term,
                    page: params.page
                };
            },
            processResults: function (data, page) {
                return {
                    results: $.map(data, function (item) {
                        return {text: item.name, id: item.id}
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 1
    });
}