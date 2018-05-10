		var previousPage;

			menu = {};		
			// ready event
			menu.ready = function() {

			var isBlurred = false;	
		  	// selector cache
		  	var
		    $menuItem = $('.menu a.item'),
		    // alias
		    handler = {
		      activate: function() {
		        $(this)
		        .addClass('active')
		        .closest('.ui.menu')
		        .find('.item')
		        .not($(this))
		        .removeClass('active');
		      }
		    };

		    $menuItem.on('click', handler.activate);
		};

	
			
		// attach ready event
		$(document).ready(function(){
			previousPage = $('#home-page-container');
			menu.ready();

			$('#about-button').on('click',function(){
				setPreviousPage($('.about-container'));
				$('.about-container').show();
			});

			$('#home-button').on('click',function(){
				setPreviousPage($('#home-page-container'));
				$('#home-page-container').show();
				
			});

			$('#contact-button').on('click',function(){
				setPreviousPage($('.form-container'));
				$('.form-container').show();
			});
		});


		function setPreviousPage(id){
			previousPage.hide();
			previousPage = id;
		}
	
