$(function() {
	// Copy shortened url to clipboard
	$('#copyShortenedUrl').click(function(event) {
		event.preventDefault();
		$(this).addClass('disabled');
		$(this).text('').append('<i class="fa fa-check-square-o mr-1"></i>Copied to clipboard');

		var el = document.getElementById('shortenedUrl');
		var range = document.createRange();
		range.selectNodeContents(el);
		var sel = window.getSelection();
		sel.removeAllRanges();
		sel.addRange(range);
		document.execCommand('copy');
    });
});