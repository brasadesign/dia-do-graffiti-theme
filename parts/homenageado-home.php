<?php
/* Template: Homenageado Home */

if ( $hid = kirki_get_option( 'homenageado_id' ) ) : ?>
	<section id="homenageado-home" class="col-sm-12">

		<div class="container-fluid">

			<div class="col-sm-4 left">

				<?php
					if ( has_post_thumbnail( $hid ) ) {
						echo '<div class="thumb">';
						echo '<a rel="gallery" class="fancybox more bg-cor" href="' . wp_get_attachment_url( get_post_thumbnail_id( $hid ) ) . '">';
						echo '<div class="bg">';
						echo '</div><!-- bg -->';
						echo '</a>';
						echo get_the_post_thumbnail( $hid, 'full', array() );
						echo '</div><!-- thumb -->';
					}

					echo '<h2>' . __( 'Photo gallery', 'odin' ) . '</h2>';

					echo '<div class="galeria">';

					$fotos = get_field( 'galeria_fotos_plupload', $hid );
					foreach ( explode( ',', $fotos ) as $foto_id ) {
					    $img = wp_get_attachment_image_src( $foto_id, 'thumbnail' );
					    $img_full = wp_get_attachment_image_src( $foto_id, 'full' );
					    if ( !empty( $img ) ) {
					    	echo '<a rel="gallery" class="fancybox" href="' . $img_full[0] . '">';
						    echo '<img class="col-sm-4" src="' . esc_url( $img[0] ) . '" width="'. $img[1] . '" height="' . $img[2] . '">';
						    echo '</a>';
					    }
					}

					echo '</div><!-- galeria -->';

					$links = get_field( 'links_externos', $hid );

					if ( !empty( $links ) ) {
						echo '<h2>' . __( 'External links', 'odin' ) . '</h2>';
						echo '<div class="links">';
						foreach ( explode( '<br />', $links ) as $link ) {
							$link = trim( $link );
							echo '<a class="external-link" href="' . esc_url( $link ) . '" target="_blank">';
							echo esc_url( $link );
							echo '</a>';
						}
						echo '</div><!-- links -->';	
					}
					
				?>
				
			</div><!-- left -->

			<div class="col-sm-8">

				<?php
					$homenageado = get_post( $hid );
					echo '<h2>' . apply_filters( 'the_title', $homenageado->post_title ) . '</h2>';
					echo apply_filters( 'the_content', $homenageado->post_content );
				?>
				
			</div>

		</div><!-- container-fluid -->

	</section><!-- #homenageado-home -->
		
<?php endif; ?>