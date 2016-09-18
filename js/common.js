( function() {

	var header = document.getElementById("page-header");
	
	function toggleFixedHeader() {

		var pageBodyScroll = (document.body.scrollTop || document.documentElement.scrollTop )
		
		if ( pageBodyScroll > 100 ){			
			header.className = "fixed";
		} else {
			header.className = "";
		}
	}

	 window.onscroll = function() {
	 	toggleFixedHeader()
	 };
})();


(function($) {

	function adjustColumnHeights(){
		var $equalParent = $(".equalH-parent")
		// console.log("equal par", $equalParent);
		$equalParent.each(function() {
	  		
	  		var maxHeight = 0;
	  		
	  		var $freeChild = $(this).find(".equalH-free")
	  		var $dependentChild = $(this).find(".equalH-dependent")
	  		$dependentChild.height($freeChild.height());

	  	});	
	}

	adjustColumnHeights();
	
	$(window).resize(function() {
		adjustColumnHeights();
	});
	
  
}(jQuery));