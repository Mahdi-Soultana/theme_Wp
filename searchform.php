<form role="search" action="<?php echo esc_url(home_url("/")) ?>" method="get" style=" display:flex; float:right ">
<label class="c-search-form__label">
    <span class="screen-reader-text" ><?php echo esc_html_x("Search for:",'label',"_themeName")?></span>
    <input type="search" class="c-search-form__field" value="<?php echo esc_attr(get_search_query()) ?>" name="s" placeholder="search ...">
</label>
<button type="submit"  style="font-size: 17px; height:41px">
    <span class="u-screen-reader-text">
        <?php echo esc_html_x("Search","submit button","_themeName")?>
    </span>
    search</button>
</form>