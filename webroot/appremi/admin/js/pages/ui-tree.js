var UITree = function () {

    var set_main_category = function () {

        $("#main_category").jstree({
            "core": {
                "themes": {"responsive": false},
                "check_callback": true,
                'data': {
                    'url': function (node) {
                        return '/categories/getlist/' ;
                    },
                    // 'dataType': "json",
                    'data': function (node) {
                        // alert(node.id);
                        return {'parent': node.id};
                    }
                }
            },
            "types": {
                "default": {"icon": "fa fa-folder icon-warning icon-lg"},
                "file": {"icon": "fa fa-file icon-warning icon-lg"},
            },
            "state": {"key": "books_category" + Math.random()},
            "plugins": []
        }).bind("select_node.jstree", function (e, data) {
            $('#ItemMainCatId').val(data.node.id);
            $('.submit_product_category').removeClass('disabled');
        });
    }
    var books_categories = function () {

        $("#books_category_nodes").jstree({
            "core": {
                "themes": {"responsive": false},
                "check_callback": true,
                'data': {
                    'url': function (node) {
                        return '/admin/categories/getlist/' ;
                    },
                    'data': function (node) {
                        return {'parent': node.id};
                    }
                }
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder icon-warning icon-lg"
                },
                "file": {
                    "icon": "fa fa-file icon-warning icon-lg"
                },
            },
            "state": {"key": "books_category" + Math.random()},
            "plugins": ["dnd", "state", "types", "json_data", "wholerow", "checkbox"]
        });
    }
    var ajaxTreeSample = function () {

        $("#category_nodes").jstree({
            "core": {
                "themes": {
                    "responsive": false
                },
                // so that create works
                "check_callback": true,
                'data': {
                    'url': function (node) {
                        return '/admin/categories/getlist';
                    },
                    'dataType': "json",
                    'data': function (node) {
                        // alert(node.id);
                        return {'parent': node.id};
                    }
                }
            },
            "types": {
                "default": {
                    "icon": "fa fa-folder icon-warning icon-lg"
                },
                "file": {
                    "icon": "fa fa-file icon-warning icon-lg"
                }
            },
            "state": {"key": "demo3"},
            "plugins": ["dnd", "state", "types"]
        }).bind("select_node.jstree", function (e, data) {
            $.ajax({
                type: "GET",
                cache: false,
                url: '/admin/categories/get_category_data/' + $('.main_page_content').attr('id') + '/' + data.node.id,
                success: function (res) {
                    $('#add_category').html(res);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }).bind("move_node.jstree", function (e, data) {
            $.ajax({
                type: "GET",
                cache: false,
                url: '/categories/reorder/' + data.node.id + '/' + data.parent,
                success: function (res) {
                    $('#add_category').html(res);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
            console.log(data);
            console.log(data.parent);
            console.log(data.node.id);
        });

    }


    return {
        //main function to initiate the module
        init: function () {

            // handleSample1();
            //  handleSample2();

            ajaxTreeSample();
            books_categories();
            set_main_category();

        }

    };

}();
