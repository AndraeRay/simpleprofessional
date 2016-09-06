( function() {

	var header = document.getElementById("page-header");
	
	function applyHeaderShadow() {

		var pageBodyScroll = (document.body.scrollTop || document.documentElement.scrollTop )
		
		if ( pageBodyScroll > 50 ){			
			console.log(pageBodyScroll);
			header.className = "fixed";
		} else {
			header.className = "";
		}
	}

	 window.onscroll = function() {
	 	applyHeaderShadow()
	 };
})();
