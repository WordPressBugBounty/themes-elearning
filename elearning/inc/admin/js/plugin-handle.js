jQuery( document ).ready( function( $ ) {
	$( '.btn-get-started' ).on( 'click', function( e ) {
		e.preventDefault();
		$( this ).addClass( 'updating-message' ).text( elearningRedirectDemoPage.btnText );
		$.ajax( {
			type : "POST",
			url : ajaxurl, // URL to "wp-admin/admin-ajax.php"
			data : {
				action : 'elearning-install-tdi-plugin',
				security : elearningRedirectDemoPage.installNonce,
			},
			success : function( response ) {
				window.location.href = response.redirect;
			},
			error : function( xhr, ajaxOptions, thrownError ){
				console.log( thrownError );
			}
		} );
	} );
} );
