/* ----------------------------
    Loadmore button ajax
---------------------------- */

jQuery(function ($) {
    $('.loadmore .load').click(function () {
        var button = $(this),
            data = {
                "action": "loadmore",
                "query": estateagency_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                "page": estateagency_loadmore_params.current_page
            };

        $.ajax({
            url: estateagency_loadmore_params.ajaxurl,
            data: data,
            type: "POST",
            beforeSend: function (xhr) {
                button.text("Loading posts..."); // change the button text, you can also add a preloader image
            },
            success: function (data) {
                if (data) {
                    console.log(button.text("More posts").parent().before(data));
                    button.text("More posts").prev().before(data); // insert new posts
                    estateagency_loadmore_params.current_page++;

                    if (estateagency_loadmore_params.current_page == estateagency_loadmore_params.max_page)
                        button.remove(); // if last page, remove the button
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});