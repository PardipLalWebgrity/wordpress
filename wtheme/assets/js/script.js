jQuery(document).ready(function ($) {
	// Event listener for "Load More" button click
	$('#load-more-posts').on('click', function () {
			var button = $(this); // Get the button
			var page = button.data('page'); // Get the current page number
			var maxPages = button.data('max'); // Get the max number of pages

			// Disable the button while AJAX request is in progress
			button.text('Loading...').prop('disabled', true);

			// Perform the AJAX request to load more posts
			$.ajax({
					url: ajaxParams.ajaxUrl, // AJAX URL passed from PHP
					type: 'POST',
					data: {
							action: 'load_more_posts', // The action hook
							page: page, // Current page
					},
					success: function (response) {
							if (response) {
									// Append the new posts to the existing posts container
									$('.post_row').append(response);

									// Increment the current page data for the next load
									button.data('page', page + 1);

									// Check if there are more pages, if not, hide the button
									if (page + 1 > maxPages) {
											button.hide(); // Hide the "Load More" button
									} else {
											button.text('Load More').prop('disabled', false); // Re-enable button and reset text
									}
							} else {
									// If no response (no more posts), hide the button
									button.hide();
							}
					},
					error: function () {
							// If an error occurs during the AJAX request
							button.text('Load More').prop('disabled', false); // Re-enable the button
							alert('Failed to load more posts. Please try again.');
					},
			});
	});
});
