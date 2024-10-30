jQuery(document).ready(function() {
	"use strict";
	jQuery('body').on( 'click', '.jm-post-like', function(event) {
		event.preventDefault();
		var heart = jQuery(this);
		var post_id = heart.data("post_id");
		jQuery.ajax({
			type: "post",
			url: ajax_var.url,
			data: "action=jm-post-like&nonce="+ajax_var.nonce+"&htevent_post_like=&post_id="+post_id,
			success: function(count){
				if( count.indexOf( "already" ) !== -1 )
				{
					var lecount = count.replace("already","");
					if (lecount === "0")
					{
						lecount = "0";
					}
					heart.prop('title', '');
					heart.removeClass("liked");
					heart.html("<span class='text'>Like :</span> <span>" + lecount + "&nbsp;</span>" );
				}
				else
				{
					heart.prop('title', '');
					heart.addClass("liked");
					heart.html("<span class='text'>Liked :</span> <span>" + count + "&nbsp;</span>" );
				}
			}
		});
	});
});