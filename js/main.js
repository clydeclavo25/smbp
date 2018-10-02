jQuery(function ($) {'use strict',

	//#main-slider
	$(function(){
		$('#main-slider.carousel').carousel({
			interval: 5000
		});
	});


	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<center><div class="form_status"></div></center>');
		var data  = {
					name : $("#name").val(),
					email: $("#email").val(),
					contact_no:$("#phone").val(),
					subject: $("#subject").val(),
					message: $("#message").val()
			}; 
		$.ajax({
			url: $(this).attr('action'),
			data: data,
			type: "POST",
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
		});
	});

	
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	


	// Chart JS
		var ctx = $("#criteria_chart");
		var data = {
					 labels: [
			        'A.	Science Thought and Engineering Goals',
			        'B.	Creative, Resourcefulness and Inventiveness',
			        'C.	Thoroughness',
			        'D.	Research Skill',
			        'E.	Oral Presentation Skills'
			    ],
			 datasets: [{
        data: [30, 25, 15, 15, 15],
        backgroundColor: [
                '#F44336',
                '#03A9F4',
                '#009688',
                '#FF9800',
                '#8BC34A',
            ]
			    }],
		};
	var options = {
			legend : {
				display: false,
			},
			maintainAspectRatio: false,
	};
		var myPieChart = new Chart(ctx,{
			    type: 'pie',
			    data: data,
			    options: options
			});
	
});


  if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}