<?php if( get_sub_field('include_buttons') == 'yes' ): ?>

  <?php if( have_rows('buttons') ): ?>
  <div class="buttons">
    <?php while( have_rows('buttons') ): the_row();
      $buttonText = get_sub_field('button_text');
      $linkType = get_sub_field('link_type');
      $url = get_sub_field('url');
      $pageUrl = get_sub_field('page_url');
      $anchor = get_sub_field('anchor');
      $buttonStyle = get_sub_field('button_style');
      $newTab = get_sub_field('new_tab');
      ?>

      <a href="<?php if($linkType == 'page'):  echo $pageUrl; endif; ?><?php if($linkType == 'url'):  echo $url; endif; ?><?php if($linkType == 'anchor'):  echo '#' . $anchor; endif; ?>" <?php if($newTab):echo 'target="_blank"'; endif; ?> class="btn btn--<?php echo $buttonStyle; ?>"><?php echo $buttonText; ?> </a>

    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endif; ?>