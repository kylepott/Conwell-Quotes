<?php
/**
 * @package Conwell_Quotes
 * @version 1.1
 */
/*
Plugin Name: Conwell Quotes
Plugin URI: https://technicalagain.com/2019/05/07/conwell-quotes-v1-1/
Description: Russell Conwell was an American minister, orator, philanthropist, lawyer, and writer.  When activated you will randomly see a quote from <cite>Acres of Diamonds</cite>, Conwell's seminal work, in the upper right of your admin screen on every page.
Author: Kyle Pott
Version: 1.1
Author URI: https://technicalagain.com
*/

function Conwell_Quotes_get_lyric() {
	/** These are quotes from Acres of Diamonds  */
	$lyrics = "Begin where you are and what you are
Your diamonds are not in far distant mountains or in yonder seas 
they are in your own backyard, if you but dig for them.
You cannot trust a man with your money who cannot take care of his own.
True greatness is often unrecognized.
Whatsoever he had to do at all, he put his whole mind into it and held it all there until that was all done.";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function Conwell_Quotes() {
	$chosen = Conwell_Quotes_get_lyric();
	echo "<p id='Conwell'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'Conwell_Quotes' );

// We need some CSS to position the paragraph
function Conwell_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#Conwell {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	.block-editor-page #Conwell {
		display: none;
	}
	</style>
	";
}

add_action( 'admin_head', 'Conwell_css' );


