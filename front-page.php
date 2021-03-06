<?php
/* Template name: Home */
get_header( 'home' );

get_template_part( '/parts/infos-home' );
get_template_part( '/parts/slider-home' );

echo '<div class="curadores-links-home">';
	echo '<div class="container">';
		get_template_part( '/parts/curadores-home' );
		get_template_part( '/parts/links-home' );
	echo '</div><!-- .container -->';
echo '</div><!-- .curadores-links-home -->';

get_template_part( '/parts/homenageado-home' );

get_footer();
