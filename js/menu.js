jQuery(function( $ ){

	$(".main-menu").addClass("header-menu-hidden").before('<div id="header-menu-icon" class="closed"></div>');

	$("#header-menu-icon").click(function(){
		$("#header-menu-icon").toggleClass("closed open");
		$(".main-menu").toggleClass("header-menu-hidden header-menu-display");
	});

});