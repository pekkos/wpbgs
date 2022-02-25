//jQuery.noConflict();

	// install flowplayer into container
	var songs = getElementsByClass("audio", document.getElementById("page"), "a");
	for (i=0; i<songs.length; i++) {
		jQuery(songs[i]).html("");
		jQuery(songs[i]).parent().append("Ladda ned: <a href='" + songs[i] + "'>" + songs[i] + "</a>");
		$f(songs[i], "/js/flowplayer/flowplayer-3.1.5.swf", { 

	    	// fullscreen button not needed here 
	    	plugins: { 
	        	controls: { 
	            	fullscreen: false, 
	            	height: 30 
	        	} 
	    	}, 

	    	clip: { 
	        	autoPlay: false, 

	        	// optional: when playback starts close the first audio playback 
	        	onBeforeBegin: function() { 
	            	$f(songs[i]).close(); 
	        	} 
	    	} 

		});
	}

	function getElementsByClass(searchClass,node,tag) {
	        var classElements = new Array();
	        if ( node == null )
	                node = document;
	        if ( tag == null )
	                tag = '*';
	        var els = node.getElementsByTagName(tag);
	        var elsLen = els.length;
	        var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	        for (i = 0, j = 0; i < elsLen; i++) {
	                if ( pattern.test(els[i].className) ) {
	                        classElements[j] = els[i];
	                        j++;
	                }
	        }
	        return classElements;
	}
