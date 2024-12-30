jQuery(function($) {
	$('#load-more').on('click', function() {
			var button = $(this);
			var page = button.data('page');
			var max_pages = button.data('max-pages');
			var nonce = loadmore.nonce;

			if (page < max_pages) {
					$.ajax({
							url: loadmore.ajaxurl,
							type: 'POST',
							data: {
									action: 'lmp_load_more_posts',
									page: page + 1,
									nonce: nonce
							},
							success: function(response) {
								console.log(response);
									$('.post_row').append(response); // Append new posts
									button.data('page', page + 1); // Update page data

									// If all posts are loaded, hide the button
									if (page + 1 === max_pages) {
											button.hide();
									}
							}
					});
			}
	});
});
