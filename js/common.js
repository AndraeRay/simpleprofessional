( function() {

	var header = document.getElementById("page-header");
	
	function toggleHeaderShadow() {

		var pageBodyScroll = (document.body.scrollTop || document.documentElement.scrollTop )
		
		if ( pageBodyScroll > 50 ){			
			header.className = "fixed";
		} else {
			header.className = "";
		}
	}

	 window.onscroll = function() {
	 	toggleHeaderShadow()
	 };
})();
