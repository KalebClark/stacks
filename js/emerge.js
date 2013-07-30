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
    //emerge.ajax_loader_on();
	  var retVal;
    jQuery.ajax({
      url: url,
      type: 'GET',
      async: false,
      success: function(data, stat, jqXHR) {
     	  jQuery('#' + outDiv).html(data);
			  retVal = data;
      }
    });
    //emerge.ajax_loader_off();
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
  ajax_loader_on: function() {
    emerge.logger('loader ON');
    //jQuery('.ajax-load').show();
  },
  ajax_loader_off: function() {
    emerge.logger('loader OFF');
    //jQuery('.ajax-load').hide();

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
