<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ) ; ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php esc_html_e('Search for:','pappaya'); ?></label>
		<input type="text" value="" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" />
		<input type="hidden"  value="post" name="post_type[]" />
	</div>
</form>