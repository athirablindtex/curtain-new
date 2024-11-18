jQuery(document).ready(function($) {
    $('.category-btn').on('click', function() {
        var categorySlug = $(this).data('category');  // Get the category slug from the clicked button

        $.ajax({
            url: ajaxfilter.ajaxurl,  // Localized AJAX URL in WordPress
            type: 'POST',
            data: {
                action: 'filter_products',  // The action name in PHP
                category: categorySlug      // Send the selected category slug
            },
            success: function(response) {
                $('#products-area').html(response);  // Update the product area with the filtered products
            },
            error: function(error) {
                console.log(error);  // Log any errors
            }
        });
    });
});
