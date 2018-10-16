<?php if( get_sub_field('include_buttons') == 'yes' ): ?>

  <?php if( have_rows('buttons') ): ?>
  <div class="buttons">
    <?php while( have_rows('buttons') ): the_row();
      $buttonText = get_sub_field('button_text');
      $linkType = get_sub_field('link_type');
      $url = get_sub_field('url');
      $pageUrl = get_sub_field('page_url');
      $buttonStyle = get_sub_field('button_style');
      ?>

      <a href="<?php if($linkType == 'page'):  echo $pageUrl; endif; ?><?php if($linkType == 'url'):  echo $url; endif; ?>" class="btn btn--<?php echo $buttonStyle; ?>"><?php echo $buttonText; ?> </a>

    <?php endwhile; ?>
  </div>
  <?php endif; ?>
<?php endif; ?>