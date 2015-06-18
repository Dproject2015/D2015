$(document).ready(function() {
  			$(".animsition").animsition({
    			inClass               :   'fade-in-down',
    			outClass              :   'fade-out-up',
    			/* 全アニメーションの名前
      *  Fade: fade-in fade-out fade-in-up fade-out-up fade-in-down fade-out-down fade-in-left fade-out-left fade-in-right fade-out-right
      *  Rotate: rotate-in rotate-out
      *  Flip: flip-in-x flip-out-x flip-in-y flip-out-y
      *  Zoom: zoom-in zoom-out
      */
    			inDuration            :    1500,
    			outDuration           :    800,
    			linkElement           :   '.animsition-link', 
    			// e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    			touchSupport          :    true, 
    			loading               :    true,
    			loadingParentElement  :   'body', //animsition wrapper element
    			loadingClass          :   'animsition-loading',
    			unSupportCss          : [ 'animation-duration',
         			                     '-webkit-animation-duration',
         			                     '-o-animation-duration'
           				                 ]
  				});
			}); 