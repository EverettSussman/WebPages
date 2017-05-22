$(document).ready(function(){
	
    $("p").click(function(){
        $(this).hide();
    });
    $(".button").click(function(){

    	// toggle .buttonshow class on click
    	var elt = $(".buttonshow");
    	elt.toggle();

    	// update radio
    	$('input[type="radio"]').not(':checked').prop("checked", true);
    })
    
    // =================================
    // Dropdown menu implementation
    $(".dropdown-content").hide();
    var menuTimer;

	$(".dropbtn").hover(function() {
	    //Slide down the submenu
	    $(".dropdown-content").slideDown();
	}, function() {
	    //Create a 200ms timer, after which it will close the sub_menu
	    menuTimer = setTimeout(function() {
	                        $(".dropdown-content").slideUp();
	                    },200);
	});

	$(".dropdown-content").mouseenter(function() {
	    //The user entered the submenu, so cancel the timer (don't close the submenu)
	    clearTimeout(menuTimer);
	});
	// ===================================

});