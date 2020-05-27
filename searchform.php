<form class="form-inline" role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="form-group mb-2 mr-2">
    <label class="screen-reader-text" for="s"><?php _x('Search for:', 'label');?></label>
    <input class="form-control" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search" />
  </div>
    <button type="submit" id="searchsubmit" class="btn btn-primary mb-2" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" >Search</button>
</form>