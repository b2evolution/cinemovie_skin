<?php
/**
 * This is the BODY footer include template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * This is meant to be included in a page template.
 *
 * @package evoskins
 */
if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );
?>

<!-- =================================== START OF FOOTER =================================== -->
<div id="footer">
<div class="validate">
<a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML">Valid XHTML</a>&nbsp;|&nbsp;
<a href="http://jigsaw.w3.org/css-validator/check?uri=referer"  title="Validate CSS">Valid CSS</a>

</div>

<br />

<?php
// Display a link to contact the owner of this blog (if owner accepts messages):
$Blog->contact_link( array(
		'before'      => '',
		'after'       => ' &nbsp;|&nbsp; ',
		'text'   => T_('Contact'),
		'title'  => T_('Send a message to the owner of this blog...'),
	) );
?>

Powered by <a href="http://b2evolution.net/" title="b2evolution home" target="_blank">b2evolution</a>

&nbsp;|&nbsp;

Design by: <a href="http://www.tilqi.com/b2evo">Emin</a>&nbsp;<a href="http://www.prosoftwarez.com/">Ozlem</a> (tilqicom)

<?php
// Display additional credits:
// If you can add your own credits without removing the defaults, you'll be very cool :))
// Please leave this at the bottom of the page to make sure your blog gets listed on b2evolution.net
credits( array(
		'list_start'  => ' &nbsp;|&nbsp; ',
		'list_end'    => ' ',
		'separator'   => ' &nbsp;|&nbsp; ',
		'item_start'  => ' ',
		'item_end'    => ' ',
	) );
?></div>
