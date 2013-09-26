/*
===============================================================
CommentPress Rollover Footnotes
===============================================================
AUTHOR			: Jeremy Boggs <jeremy@clioweb.org>
MODIFIED BY		: Christian Wach <needle@haystack.co.uk>
LAST MODIFIED	: 26/09/2013
DEPENDENCIES	: jquery.js, jquery.tooltip.js
---------------------------------------------------------------
NOTES

This script enables rollover footnotes in the content of a page or post. It is based on jQuery Tooltip, which is included in the plugin directory:
http://bassistance.de/jquery-plugins/jquery-plugin-tooltip/

Example footnote link:

<a class="note" href="#note1">[1]</a>

Example footnote structure:

<ol class="notes" start="0">
<li class="notes-header"><h3>Footnotes</h3></li>
<li id="note1">This is what the pop-up footnotes look like. If you find a note that runs off the top or the bottom of the page, scroll the main window a bit and you should be able to make the entire thing appear.</li>
</ol>

---------------------------------------------------------------
*/



/** 
 * Set up our elements
 */
function cp_rollover_notes_setup() {

	// define vars
	var styles;

	// wrap with js test
	if ( document.getElementById ) {

		// init styles
		styles = '';

		// open style declaration
		styles += '<style type="text/css" media="screen">';
	
		// avoid flash of hidden elements
		styles += '.notes { display: none; } ';

		// close style declaration
		styles += '</style>';

		// write to page now
		document.write( styles );

	}

}

// call setup function
cp_rollover_notes_setup();



/** 
 * @description: define what happens when the page is ready
 *
 */
jQuery(document).ready( function($) {

   /* 
	* Hide the ol
	*/
   $('.notes').hide();
   
   /* 
	* Hide the elements with IDs that match the hrefs for our notes. This
	* is Jeremy's code, not part of the tooltip plugin.
	*/
   $('.note').each(function() {
	   $($(this).attr('href')).hide();
   });
   
   /* 
	* Now we'll use the jquery-tooltip plugin to display the contents
	* of the elements with IDS that match the hrefs of each individual
	* note.
	*/
   $('.note').tooltip({
	  bodyHandler: function() { 
	  	  //console.log( $($(this).attr("href")).html() );
		  return $($(this).attr("href")).html(); 
	  }, 
	  showURL: false,
	  track: true, 
	  delay: 0
   });
   
});
