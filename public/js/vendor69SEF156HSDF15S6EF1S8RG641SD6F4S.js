$(document).ready(function() {
	// Enable bootstrap tooltips everywhere
	$('[data-toggle="tooltip"]').tooltip()

    // Custom modal dialog
    function dialog(btnType, title, message, confirmCallback, closeCallback) {
        $('#modalDialog').modal('show');
        
	    $('#modalLabel').html(title);
	    $('#modalBody').html(message);
	    $('#modalConfirm').removeClass();
	    $('#modalConfirm').addClass("btn btn-"+btnType);

	    $('#modalConfirm').click(function() {
	        confirmCallback();
	    });
	    $('#modalCancel').click(function() {
	        closeCallback();
	    });
	}

	// Toggle bootsraps 'd-block' to target element to show
	$('[data-toggle="long-url"]').click(function() {
		var target = $(this).data('target');
		$('[data-id="' + target + '"]').toggleClass('d-inline-block');
	});

	// Copy shortened url to clipboard
	$('#copyShortenedUrl').click(function(e) {
		e.preventDefault();
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

	// Confirms user before deleting shotened url
    $('.delete-shortened-url').click(function(e) {
        e.preventDefault();

        dialog('danger', 'Delete', 'Are you sure you want to delete this?', 
		    function() {
		        // Confirm
		        $(e.target).closest('form').submit();
		    },
		    function() {
		        // Close
		    }
		);
    });
});