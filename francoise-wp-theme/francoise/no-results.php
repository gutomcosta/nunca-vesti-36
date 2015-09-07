<?php if ( is_search() ) : ?>
			<div class="noResultsWrap">
        		<h1 class="noResultsTitle"><?php printf( __( 'Search results for: "%s"', 'francoise' ), get_search_query() ); ?></h1>
        		<p><?php _e('Nothing Found', 'francoise') ?><br><?php _e( 'Sorry, but nothing matched your search terms. <br> Please try again with some different keywords.', 'francoise' ); ?></p>
				<a class="homePageLink" href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>" class="homePage"><?php _e('Homepage', 'francoise') ?></a>
			</div>
<?php else : ?>
			<div class="noResultsWrap">
				<h1 class="noResultsTitle"><?php _e( 'Nothing Found', 'francoise' ); ?></h1>
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'francoise' ); ?></p>
				<!--
				<a class="homePageLink" href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>" class="homePage"><?php _e('Homepage', 'francoise') ?></a>
				-->
			</div>
<?php endif; ?>