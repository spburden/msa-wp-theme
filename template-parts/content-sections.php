<!-- Sections -->
<?php
	// check if the flexible content field has rows of data
	if( have_rows('sections') ):

    // loop through the rows of data
    while ( have_rows('sections') ) : the_row();

	    if( get_row_layout() == 'full_section' ):
				get_template_part( 'template-parts/section-parts/section', 'full');

			elseif( get_row_layout() == 'three_col_section' ):
				get_template_part( 'template-parts/section-parts/section', 'three-col');

			endif;

		endwhile;

	else :

	    // no section layouts found

	endif;
?>
<!-- /Sections -->
