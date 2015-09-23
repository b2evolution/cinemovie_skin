<?php
/**
 * This is the main/default page template.
 *
 * For a quick explanation of b2evo 2.0 skins, please start here:
 * {@link http://manual.b2evolution.net/Skins_2.0}
 *
 * It is used to display the blog when no specific page template is available to handle the request.
 *
 * @package evoskins
 * @subpackage cine_movie 0.1
 *
 * @version $Id: index.main.php,v 1.9.2.2 2008/04/26 22:28:53 fplanque Exp $
 */
if( !defined('EVO_MAIN_INIT') ) dxie( 'Please, do not access this page directly.' );

if( version_compare( $app_version, '2.4.1' ) < 0 )
{ // Older 2.x skins work on newer 2.x b2evo versions, but newer 2.x skins may not work on older 2.x b2evo versions.
	die( 'This skin is designed for b2evolution 2.4.1 and above. Please <a href="http://b2evolution.net/downloads/index.html">upgrade your b2evolution</a>.' );
}

// This is the main template; it may be used to display very different things.
// Do inits depending on current $disp:
skin_init( $disp );


// -------------------------- HTML HEADER INCLUDED HERE --------------------------
skin_include( '_html_header.inc.php' );
// Note: You can customize the default HTML header by copying the
// _html_header.inc.php file into the current skin folder.
// -------------------------------- END OF HEADER --------------------------------
?>


<div id="page_wrapper">

<?php
// ------------------------- BODY FOOTER INCLUDED HERE --------------------------
skin_include( '_body_header.inc.php' );
// Note: You can customize the default BODY footer by copying the
// _body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>

<?php

if( $disp != 'single' ) {
// ------------------------- BODY FOOTER INCLUDED HERE --------------------------
skin_include( '_sidebar.inc.php' );
// Note: You can customize the default BODY footer by copying the
// _body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
};
?>

	<?php
		// ------------------------- MESSAGES GENERATED FROM ACTIONS -------------------------
		messages( array(
			'block_start' => '<div class="action_messages">',
			'block_end'   => '</div>',
		) );
		// --------------------------------- END OF MESSAGES ---------------------------------
	?>
<div id="outside_wrapper">
	<?php
		// ------------------- PREV/NEXT POST LINKS (SINGLE POST MODE) -------------------
		item_prevnext_links( array(
				'block_start' => '<table class="prevnext_post"><tr>',
				'prev_start'  => '<td>',
				'prev_end'    => '</td>',
				'next_start'  => '<td class="right">',
				'next_end'    => '</td>',
				'block_end'   => '</tr></table>',
			) );
		// ------------------------- END OF PREV/NEXT POST LINKS -------------------------
	?>

	<?php
		// ------------------------- TITLE FOR THE CURRENT REQUEST -------------------------
		request_title( array(
				'title_before'=> '<h2 class="evo_req_title">',
				'title_after' => '</h2>',
				'title_none'  => '',
				'glue'        => ' - ',
				'title_single_disp' => false,
				'format'      => 'htmlbody',
			) );
		// ------------------------------ END OF REQUEST TITLE -----------------------------
	?>
    



	<!-- =================================== START OF Post LOOP =================================== -->

	<?php // ------------------------------------ START OF POSTS ----------------------------------------
		// Display message if no post:
		display_if_empty();

		while( $Item = & mainlist_get_item() )
		{	// For each blog post, do everything below up to the closing curly brace "}"
		?>
		<div id="<?php $Item->anchor_id() ?>" class="b2_post b2_post<?php $Item->status_raw() ?>" lang="<?php $Item->lang() ?>">

			<?php
				$Item->locale_temp_switch(); // Temporarily switch to post locale (useful for multilingual blogs)
			?>

              <div class="content_wrapper">   
   

<div class="infoo">
         <span class="clapper_title">   			
<?php
 $short_title = $Item->title; 
 if( strlen($short_title) > 25 )
 {
	$short_title = substr($short_title, 0, 22).'...';
 }
 echo $short_title;
 ?></span>
                        
<div class="cat_wrapper">
		<div class="maincat"><?php
		
				$Item->categories( array(
						'before'          => ' '.T_(''),
						'after'           => ' ',
						'include_main'    => true,
						'include_other'   => false,
						'include_external'=> false,
						'link_categories' => true,
					) );
			?></div>
            
            		<div class="subcat"><?php
				$Item->categories( array(
						'before'          => ' '.T_(''),
						'after'           => ' ',
						'include_main'    => false,
						'include_other'   => true,
						'include_external'=> false,
						'link_categories' => true,
					) );
			?>                    </div>
            
    </div>        
    
    <div class="word_count">
    <?php 
          		   $Item->wordcount();
					echo ' '.T_('words long'); ?></div>
                    

            
          <div class="view_count">     <?php         
                    $Item->views(); echo '. ';  ?> </div>
                    
                             <div class="aut_hor">             
                    			<?php
      	$Item->author( array(
				) );
			?>    </div>
                    
                    
                      	<div class="time_stamp"><?php $Item->issue_time( array(
						'before'    => '',
						'after'     => '&nbsp;',
						'date_format' => 'd/M/Y/D','H:i:s'
					)); ?>
                    
                    <?php $Item->issue_time( array(
						'before'    => '',
						'after'     => '',
						'date_format' => 'H:i:s'
					)); ?>
                    </div>
                    
                    

                    <div class="feed_back">
                                				<?php
					// Link to comments, trackbacks, etc.:
					$Item->feedback_link( array(
									'type' => 'comments',
									'link_before' => '',
									'link_after' => '',
									'link_text_zero' => '#',
									'link_text_one' => '#',
									'link_text_more' => '#',
									'link_title' => '#',
									'use_popup' => false,
								) );
				 ?></div>
            
</div>
             

            <div class="post_content">
                   <h2> <?php $my_post_title = $Item->title(); ?>   </h2>

			<?php
				// ------------------ POST CONTENT  INCLUDED HERE ------------------
				skin_include( '_item_content.inc.php', array(
						'image_size'	=>	'fit-400x320',
					) );
				// Note: You can customize the default item feedback by copying the generic
				// /skins/_item_feedback.inc.php file into the current skin folder.
				// ---------------------- END OF POST CONTENT  ---------------------
			?>
            
            
            			<?php
						
						
echo '<a href="'.$Item->get_permanent_url().'">
<img src="img/roll.gif" style="padding-right: 1px" 
alt="permalink to full entry" align="left" title="permalink to full entry" border="0" width="33" height="25" /></a>'; 	
						
					
				// List all tags attached to this post:
				$Item->tags( array(
						'before' =>         ' '.T_('Tags').': ',
						'after' =>          ' ,',
						'separator' =>      ', ',
					) );


				$Item->categories( array(
					'before'          => ' '.T_('Categories').': ',
					'after'           => ' ',
					'include_main'    => true,
					'include_other'   => true,
					'include_external'=> true,
					'link_categories' => true,
				) );
				


				$Item->edit_link( array( // Link to backoffice for editing
						'before'    => ' ',
						'after'     => ' ',
					) );



			?></div>

</div>
	
			<?php
				// ------------------ FEEDBACK (COMMENTS/TRACKBACKS) INCLUDED HERE ------------------
				skin_include( '_item_feedback.inc.php', array(
						'before_section_title' => '<h4>',
						'after_section_title'  => '</h4>',
					) );
				// Note: You can customize the default item feedback by copying the generic
				// /skins/_item_feedback.inc.php file into the current skin folder.
				// ---------------------- END OF FEEDBACK (COMMENTS/TRACKBACKS) ---------------------
			?>
</div>
			<?php
				locale_restore_previous();	// Restore previous locale (Blog locale)
			?>
		

	<?php } // ---------------------------------- END OF POSTS ------------------------------------ ?>
</div>

<div id="pagelinks">
	<?php
		// -------------------- PREV/NEXT PAGE LINKS (POST LIST MODE) --------------------
		mainlist_page_links( array(
				'block_start' => '<p class="center"><strong>',
				'block_end' => '</strong></p>',
				'links_format' => '$prev$ :: $next$',
   			'prev_text' => '&lt;&lt; '.T_('Previous'),
   			'next_text' => T_('Next').' &gt;&gt;',
			) );
		// ------------------------- END OF PREV/NEXT PAGE LINKS -------------------------
	?></div>

	<?php
		// -------------- MAIN CONTENT TEMPLATE INCLUDED HERE (Based on $disp) --------------
		skin_include( '$disp$', array(
				'disp_posts'  => '',		// We already handled this case above
				'disp_single' => '',		// We already handled this case above
				'disp_page'   => '',		// We already handled this case above
			) );
		// Note: you can customize any of the sub templates included here by
		// copying the matching php file into your skin directory.
		// ------------------------- END OF MAIN CONTENT TEMPLATE ---------------------------
	?>


</div>

<?php
// ------------------------- BODY FOOTER INCLUDED HERE --------------------------
skin_include( '_body_footer.inc.php' );
// Note: You can customize the default BODY footer by copying the
// _body_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>

<?php
// ------------------------- HTML FOOTER INCLUDED HERE --------------------------
skin_include( '_html_footer.inc.php' );
// Note: You can customize the default HTML footer by copying the
// _html_footer.inc.php file into the current skin folder.
// ------------------------------- END OF FOOTER --------------------------------
?>

