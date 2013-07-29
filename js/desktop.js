jQuery(document).ready(function(){

 		 // desktop thumbnail hover
        jQuery(document).on('mouseenter', '.thumbnails-wrapper img', function(e){
            var target = jQuery(this).closest('li'),
            parent = target.parent(),
            thumbsPerRow = Math.floor( parent.innerWidth() / 133 ),
            info = target.find('.book-info'),
            lastChild = target.is(':nth-child('+thumbsPerRow+'n+'+thumbsPerRow+')'),
            isInfoPane = jQuery(e.target).closest('div').is('.book-info')
            

            // if (lastChild){
            //     info.css({'position':'absolute','top':'8px','left':'-148px'}).addClass('arrow-right').show()
            // } else {
            //     info.css({'position':'absolute','top':'8px','left':'144px'}).addClass('arrow-left').show()
            // }   
                            info.css({'position':'absolute','top':'8px','left':'144px'}).addClass('arrow-left').show()


            
         });
         jQuery(document).on('mouseleave', '.thumbnails-wrapper img', function(e){
            
            //if (jQuery(e.toElement).hasClass('book-info') == false)
                jQuery(this).parent().find('.book-info').css({'position':'absolute'}).fadeOut(100)
        });

		// show/hide search bar
 		jQuery(document).on('click', '.show-hide', function(){
            if (jQuery(this).hasClass('search-open')==false){
                jQuery('.search-box').show().animate({'width':'250px'}, 100)
                jQuery('.show-hide').addClass('search-open')
                jQuery('nav#menu #menu-nav li a').not('.search').fadeOut(100)
            } else {
                jQuery('.search-box').animate({'width':'0px'}, 100).hide()
                jQuery('.show-hide').removeClass('search-open')
                jQuery('nav#menu #menu-nav li a').fadeIn(100)
            }   
        });
    /* Submit search form
    *  ================== */
    

    jQuery('#search-box').on('keydown', function(e) {
      if(e.which == 13) {
        var search_term = jQuery('#search-box').val();
        emerge.ajax_get('ajax/book_search.php?search_term='+search_term, 'slider');
      }
    });

    /* Menu Click Events
    *  ================= */
    jQuery('#menu-stacks').on('click', function() {
      emerge.ajax_get('ajax/book_result_map.php', 'slider');
    });

    jQuery('#menu-genres').on('click', function() {
      emerge.ajax_get('ajax/list_genres.php', 'slider');
    });

        // filter through genres
        var genreSlides;
        var count = 0;
        

		genreSlides = function()
		{
  			//var dom = jQuery('#title-genres .genre-img')
            var active = jQuery('.active-genre-img')
            
            if (count == 3)
            count = 0

            jQuery('.genre-img img').not('.genre-img img:eq('+count+')').fadeOut(400).removeClass('active-genre-img');
            jQuery('.genre-img img:eq('+count+')').fadeIn(400).addClass('active-genre-img')
            
            count++
		}
		setInterval(genreSlides, 3000);
    
})
