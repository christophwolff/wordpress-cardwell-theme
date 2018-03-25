<div id="close-search">
	<button class="close-search">Suche schließen</button>
</div>
<h3>Wonach suchen Sie?</h3>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span> -->
        <input type="search" class="search-field"
            value="<?php echo get_search_query() ?>" name="s"
            placeholder="Suchbegriff"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>