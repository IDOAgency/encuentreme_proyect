(function($){ 

    $.fn.extend({
		
		contentsBuild: function() {
			
			//// vars
			var mainCont = jQuery('#contents');
			var h2Len = jQuery('h2').length;
			var sections = jQuery('h2, h3');
			var h2Sections = jQuery('h2');
			
			//// DEFINES THE WIDTH OF OUR COLUMNS
			var colWidth = (100 - ((6-1)*2)) / 6;
			
			//// GOE STHROUGH OUR SECTIONS AND ADD IT TO OUR TABLE OF CONTENS
			var ulI = 0;
			sections.each(function() {
				
				//// IF IS H2 CREATE A NEW UL
				if(jQuery(this).is('h2')) {
					
					//// IF MULTIPLE OF 6
					if(ulI % 6 == 0 && ulI != 0) { mainCont.append('<div class="contents-divider"></div>'); }
					
					//// APPEND UL	
					mainCont.append('<ul style="width: '+colWidth+'%;"></ul>');
					ulI++;
					
					//// ADDS AN ID TO OUR HEADER
					var theRandId = makeid();
					jQuery(this).attr('id', theRandId);
					
					console.log(ulI);
					
					//// APPEND IT TO OUR UL
					mainCont.find('ul:last').append('<li><a href="#'+theRandId+'">'+jQuery(this).text()+'</a></li>');
					
				} else {
					
					//// APPENDS OUR LI	
					
					//// ADDS AN ID TO OUR HEADER
					var theRandId = makeid();
					jQuery(this).attr('id', theRandId);
					
					//// APPEND IT TO OUR UL
					mainCont.children('ul:last').append('<li><a href="#'+theRandId+'">- '+jQuery(this).text()+'</a></li>');
					
				}
				
			});
			
			//// GOES SECTION BY SECTION AND LOOKS FOR H3s in OUR H2s
			jQuery('#content .wrapper h2').each(function() {
				
				//// IF IT HAS H3s under it
				if(jQuery(this).parent().children('div').children('h3').length > 0) {
					
					var thish2 = jQuery(this);
					var thish2Id = jQuery(this).attr('id');
					
					jQuery(this).after('<div class="under"><span>Under this section:</span><ul id="'+thish2Id+'_ul"></ul></div>');
					
					var thish2Section = jQuery('#'+thish2Id+'_ul');
					
					/// GOES THROUG HEACH h3 AND ADDS IT
					jQuery(this).parent().children('div').children('h3').each(function() {
						
						//// ADDS A NEW ID TO THIS h3
						var randId = jQuery(this).attr('id');
						
						var thisH3 = jQuery(this);
						
						//// ADDS AS A LI
						var thisTitle = jQuery(this).text();
						
						thish2Section.append('<li><a href="#'+randId+'">- '+thisTitle+'</a></li>');
						
						//// CHECKS IF THIS H3 HAS H4s
						if(thisH3.parent().children('h4').length > 0) {
							
							thisH3.after('<div class="under"><span>Under this section:</span><ul id="'+randId+'_ul"></ul></div>');
							var thisH3Section = jQuery('#'+randId+'_ul');
							
							thisH3.parent().children('h4').each(function() {
								
								var h3RandId = makeid();
								jQuery(this).attr('id', h3RandId);
								
								var thisH3Title = jQuery(this).text();
								
								thisH3Section.append('<li><a href="#'+h3RandId+'">- '+thisH3Title+'</a></li>');
								
							});
							
						}
						
					})
					
				}
				
			});
			
		},
		
		btoaVideo: function() {
			
			var mainCont = this;
			var videoCode = mainCont.attr('title');
			
			mainCont.click(function() {
				
				mainCont.children('span').remove();
				mainCont.append('<iframe width="970" height="728" src="http://www.youtube.com/embed/'+videoCode+'?rel=0" frameborder="0" allowfullscreen></iframe>');
				
			});
			
		}
		
	});
	
})(jQuery);



function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    for( var i=0; i < 8; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}