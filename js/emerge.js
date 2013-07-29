/* html request. My standard.
*   Emerge Framework
*/
var emerge = {
  // Define globals for emerge class
  debug: 1,

  /* == FUNCTIONS ========================================================== */

  /* AJAX GET
   * ======== */

  ajax_get: function(url, outDiv) {
    emerge.logger('AJAX->GET: '+url+' => '+outDiv);
    //$('#ajax-load').css('display', 'block');
	  var retVal;
    jQuery.ajax({
      url: url,
      type: 'GET',
      async: false,
      success: function(data, stat, jqXHR) {
     	  jQuery('#' + outDiv).html(data);
        jQuery('#ajax-load').css('display', 'none');
			  retVal = data;
      }
    });
	  return retVal;
  },

  /* AJAX POST
   * ========= */

  ajax_post: function(url, uri) {
    emerge.logger('AJAX->POST: '+url+'?'+uri);
    var retVal;
    jQuery.ajax({
      url: url,
      data: uri,
      type: 'POST',
      async: false,
      success: function(data, stat, jqXHR) {
        retVal = data;
      }
    });
    return retVal;
  },

  /* AJAX POST FORM
   * ============== */

  ajax_post_form: function(url, e) {
    var uri = encodeURI(jQuery('#'+e).serialize());
    emerge.logger('AJAX->FORM::POST: '+url+' - '+uri);
    var retVal;
    jQuery.ajax({
      url: url,
      data: uri,
      type: 'POST',
      async: false,
      success: function(data, stat, jqXHR) {
        retVal = data;
      }
    });
    return retVal;
  },

  logger: function(message) {
    if(emerge.debug == 1) {
      console.log(message);
    }
  }
} /* == END EMERGE ========================================================= */


// Utility Dialog
function genericDialog(title, url) {
	var formBody = jQuery('<div>', {
		title: title,
		id: 'utilDialog'
	});

  var data = htmlReq(url);
	formBody.html(data);
	formBody.dialog({
		height: 400,
		width: 750,
		show: 'fade',
		close: function() {
			jQuery(this).remove();
		},
		buttons: {
			'Close': function() {
				jQuery(this).effect('fade', function() {
					jQuery(this).remove();
				});
			}
		}
	});
}
