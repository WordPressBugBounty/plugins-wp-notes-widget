
  <div class="wp-notes-widget-admin-container">
    <div id="wp-notes-widget-visual-settings-column" class="wp-notes-widget-admin-third">

      <h3><?php esc_html_e('Visual Settings', 'wp-notes-widget'); ?></h3>

      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title', 'wp-notes-widget' ); ?> <span class="wp-notes-secondary-text" >(<?php esc_html_e('optional','wp-notes-widget'); ?>)</span></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
      </p>
      
      <p>
        <label for="<?php echo $this->get_field_id('thumb_tack_colour'); ?>"> <?php esc_html_e('Thumb Tack Color', 'wp-notes-widget'); ?></label>
          
          <select name="<?php echo $this->get_field_name( 'thumb_tack_colour' ); ?>" id="<?php echo $this->get_field_id( 'thumb_tack_colour' ); ?>">
            <option value="red" <?php     echo ( $thumb_tack_colour == 'red' )     ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Red', 'wp-notes-widget' ) ?>     </option>
            <option value="blue" <?php     echo ( $thumb_tack_colour == 'blue' )   ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>     </option>
            <option value="green" <?php   echo ( $thumb_tack_colour == 'green' )   ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Green', 'wp-notes-widget' ) ?>   </option>
            <option value="gray" <?php     echo ( $thumb_tack_colour == 'gray' )   ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Gray', 'wp-notes-widget' ) ?>    </option>
            <option value="orange" <?php   echo ( $thumb_tack_colour == 'orange' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Orange', 'wp-notes-widget' ) ?>   </option>
            <option value="pink" <?php     echo ( $thumb_tack_colour == 'pink' )   ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>     </option>
            <option value="teal" <?php     echo ( $thumb_tack_colour == 'teal' )   ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Teal', 'wp-notes-widget' ) ?>     </option>
            <option value="yellow" <?php   echo ( $thumb_tack_colour == 'yellow' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('Yellow', 'wp-notes-widget' ) ?>   </option>
          </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('background_colour'); ?>"><?php esc_html_e('Background Color', 'wp-notes-widget'); ?></label>
          
          <select name="<?php echo $this->get_field_name( 'background_colour' ); ?>" id="<?php echo $this->get_field_id( 'background_colour' ); ?>">
            <option value="yellow" <?php       echo ( $background_colour == 'yellow' )     ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Yellow', 'wp-notes-widget' ) ?>      </option>
            <option value="blue" <?php         echo ( $background_colour == 'blue' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>        </option>
            <option value="green" <?php       echo ( $background_colour == 'green' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Green', 'wp-notes-widget' ) ?>      </option>
            <option value="pink" <?php         echo ( $background_colour == 'pink' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>        </option>
            <option value="orange" <?php       echo ( $background_colour == 'orange' )     ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Orange', 'wp-notes-widget' ) ?>      </option>
            <option value="white" <?php       echo ( $background_colour == 'white' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('White', 'wp-notes-widget' ) ?>      </option>
            <option value="dark-grey" <?php   echo ( $background_colour == 'dark-grey' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Dark Grey', 'wp-notes-widget' ) ?>  </option>
            <option value="light-grey" <?php   echo ( $background_colour == 'light-grey' ) ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Light Grey', 'wp-notes-widget' ) ?>  </option>
          </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('text_colour'); ?>"><?php esc_html_e('Text Color', 'wp-notes-widget'); ?></label>
          
          <select name="<?php echo $this->get_field_name( 'text_colour' ); ?>" id="<?php echo $this->get_field_id( 'text_colour' ); ?>">
            <option value="red" <?php         echo ( $text_colour == 'red' )         ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Red', 'wp-notes-widget' ) ?>        </option>
            <option value="blue" <?php         echo ( $text_colour == 'blue' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>        </option>
            <option value="black" <?php       echo ( $text_colour == 'black' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Black', 'wp-notes-widget' ) ?>      </option>
            <option value="pink" <?php         echo ( $text_colour == 'pink' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>        </option>
            <option value="white" <?php       echo ( $text_colour == 'white' )       ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('White', 'wp-notes-widget' ) ?>      </option>
            <option value="dark-grey" <?php   echo ( $text_colour == 'dark-grey' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Dark Grey', 'wp-notes-widget' ) ?>  </option>
            <option value="light-grey" <?php   echo ( $text_colour == 'light-grey' ) ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('Light Grey', 'wp-notes-widget' ) ?>  </option>
          </select>
      </p>

      <p>
        <label for="<?php echo $this->get_field_id('font_size'); ?>"><?php esc_html_e('Font Size', 'wp-notes-widget'); ?></label>
        
        <select name="<?php echo $this->get_field_name( 'font_size' ); ?>" id="<?php echo $this->get_field_id( 'font_size' ); ?>">
          <option value="minus-50" <?php   echo ( $font_size == 'minus-50' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('50% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-45" <?php   echo ( $font_size == 'minus-45' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('45% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-40" <?php   echo ( $font_size == 'minus-40' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('40% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-35" <?php   echo ( $font_size == 'minus-35' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('35% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-30" <?php   echo ( $font_size == 'minus-30' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('30% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-25" <?php   echo ( $font_size == 'minus-25' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('25% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-20" <?php   echo ( $font_size == 'minus-20' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('20% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-15" <?php   echo ( $font_size == 'minus-15' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('15% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-10" <?php   echo ( $font_size == 'minus-10' ) ? 'selected="selected"' : ''; ?> > <?php esc_html_e('10% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-5" <?php   echo ( $font_size == 'minus-5' )   ? 'selected="selected"' : ''; ?> > <?php esc_html_e('5% smaller', 'wp-notes-widget' ) ?>  </option>
          
          <option value="normal" <?php   echo ( $font_size == 'normal' || empty($font_size) ) ? 'selected="selected"' : ''; ?> >    <?php esc_html_e('Normal', 'wp-notes-widget' ) ?></option>
          
          <option value="plus-5" <?php   echo ( $font_size == 'plus-5' )   ? 'selected="selected"' : ''; ?> >   <?php esc_html_e('5% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-10" <?php echo ( $font_size == 'plus-10' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('10% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-15" <?php echo ( $font_size == 'plus-15' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('15% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-20" <?php echo ( $font_size == 'plus-20' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('20% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-25" <?php echo ( $font_size == 'plus-25' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('25% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-30" <?php echo ( $font_size == 'plus-30' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('30% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-35" <?php echo ( $font_size == 'plus-35' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('35% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-40" <?php echo ( $font_size == 'plus-40' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('40% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-45" <?php echo ( $font_size == 'plus-45' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('45% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-50" <?php echo ( $font_size == 'plus-50' )   ? 'selected="selected"' : ''; ?> >  <?php esc_html_e('50% larger', 'wp-notes-widget' ) ?>  </option>

        </select>

      </p>

    </div>
    <div  id="wp-notes-widget-show-hide-settings-column"  class="wp-notes-widget-admin-third">
      <h3><?php esc_html_e('Show/Hide Notes', 'wp-notes-widget'); ?></h3>
      
      <?php
        $edit_link = '<a href="/wp-admin/edit.php?post_type=nw-item">'. __('Edit Notes','wp-notes-widget') . '</a>';
      ?>

      <p><?php echo sprintf(__('Notes can be managed on the %s page.'), $edit_link );?></p>
      
      <p class="wp-notes-widget-adjustment-options" >
        <label>
          <input type="radio" class="wp-notes-widget-post-adjustment-radio" <?php checked($post_adjustment_type, 'none'); ?> name="<?php echo $this->get_field_name( 'post_adjustment_type' ); ?>" value="none" />
          <?php esc_html_e('Show all published notes.', 'wp-notes-widget'); ?>
        </label>
        <label>
          <input type="radio" class="wp-notes-widget-post-adjustment-radio" <?php checked($post_adjustment_type, 'hide'); ?>  name="<?php echo $this->get_field_name( 'post_adjustment_type' ); ?>" value="hide" />
          <?php esc_html_e('Hide the following notes:', 'wp-notes-widget'); ?>
        </label>
        <label>
          <input type="radio" class="wp-notes-widget-post-adjustment-radio" <?php checked($post_adjustment_type, 'show'); ?>  name="<?php echo $this->get_field_name( 'post_adjustment_type' ); ?>" value="show" />
          <?php esc_html_e('Only show the following notes:', 'wp-notes-widget'); ?>
        </label>
        <label>
          <input type="radio" class="wp-notes-widget-post-adjustment-radio" <?php checked($post_adjustment_type, 'category'); ?>  name="<?php echo $this->get_field_name( 'post_adjustment_type' ); ?>" value="category" />
          <?php esc_html_e('Show notes from category:', 'wp-notes-widget'); ?>
        </label>
      </p>

      <div class="wp-notes-widget-adjustment-list-container--notes wp-notes-widget-adjustment-list-container <?php echo ($post_adjustment_type == 'none') ? 'disabled' : ''; ?> <?php if ($post_adjustment_type == 'category') echo 'hidden';  ?>">
        <ul class="wp-notes-widget-adjustment-list" >
          <?php
            $note_query_args =   array (  
              'post_type'         => 'nw-item', 
              'posts_per_page'    => -1,
              'order'             => 'ASC',
              'orderby'           => 'menu_order date',
              'post_status'       => 'publish'
            );

            $note_query = new WP_Query( $note_query_args );
            global $post;
            if ( $note_query->have_posts()  ) {
              while ( $note_query->have_posts() ) : $note_query->the_post();
                ?>
                <li>
                  <label>
                    <input type="checkbox" name="<?php echo $this->get_field_name( 'post_adjustment_list' ); ?>[]" <?php  echo (in_array(get_the_ID(), $post_adjustment_list) ) ? 'checked' : ''; ?> value="<?php the_ID(); ?>" />
                    <?php the_title(); ?> 
                  </label>
                </li>

                <?php
              endwhile;
            } else {
              ?>
              <li>
                <?php esc_html_e('No published notes to display.', 'wp-notes-widget'); ?>
              </li>
              <?php
            }
            wp_reset_postdata(); wp_reset_query();
          ?>
        </ul>

      </div>
      <div class="wp-notes-widget-adjustment-list-container--category wp-notes-widget-adjustment-list-container <?php if ($post_adjustment_type != 'category') echo 'hidden';  ?>">
        <p><?php printf( esc_html__( 'Categories available in %1$s.', 'wp-notes-widget' ), '<a href="'. WP_NOTES_WIDGET_PRO_LINK .'?utm_source=wp-notes-widget-plugin&utm_medium=widget-category-setting" target="_blank" >WP Notes Widget PRO</a>'); ?></p>
      </div>
    </div>
    <div  id="wp-notes-widget-general-settings-column"  class="wp-notes-widget-admin-third">  
      <h3><?php esc_html_e('General Settings', 'wp-notes-widget'); ?></h3>

      <p>
        <input type="checkbox" <?php if((bool)$show_date) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'show_date' ); ?>" id="<?php echo $this->get_field_id('show_date'); ?>" />
        <label for="<?php echo $this->get_field_id('show_date'); ?>"><?php esc_html_e('Display date when note was published', 'wp-notes-widget'); ?></label>
          
      </p>

      <p>
        <input type="checkbox" <?php if((bool)$use_custom_style) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'use_custom_style' ); ?>" id="<?php echo $this->get_field_id('use_custom_style'); ?>" />
        <label for="<?php echo $this->get_field_id('use_custom_style'); ?>"><?php esc_html_e('I will use my own CSS styles for WP Notes Widget', 'wp-notes-widget'); ?></label>
          
      </p>

      <p>
        <input type="checkbox" <?php if((bool)$wrap_widget) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'wrap_widget' ); ?>" id="<?php echo $this->get_field_id('wrap_widget'); ?>" />
        <label for="<?php echo $this->get_field_id('wrap_widget'); ?>"><?php esc_html_e("Use my theme's widget wrapper for WP Notes Widget", 'wp-notes-widget'); ?></label>
          
      </p>

      <p>
        <input type="checkbox" <?php if((bool)$hide_if_empty) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'hide_if_empty' ); ?>" id="<?php echo $this->get_field_id('hide_if_empty'); ?>" />
        <label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php esc_html_e('Hide WP Notes Widget if there are no published notes available', 'wp-notes-widget'); ?></label>
          
      </p>

      <p>
        <input type="checkbox" <?php if((bool)$multiple_notes) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'multiple_notes' ); ?>" id="<?php echo $this->get_field_id('multiple_notes'); ?>" />
        <label for="<?php echo $this->get_field_id('multiple_notes'); ?>"><?php esc_html_e('Use individual "sticky notes" for each note', 'wp-notes-widget'); ?></label>
          
      </p>

      <p>
        <input type="checkbox" <?php if((bool)$enable_social_share) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'enable_social_share' ); ?>" id="<?php echo $this->get_field_id('enable_social_share'); ?>" />
        <label for="<?php echo $this->get_field_id('enable_social_share'); ?>"><?php esc_html_e('Enable social sharing of notes', 'wp-notes-widget'); ?></label>
      </p>

      <p>
        <input type="checkbox" <?php if((bool)$do_not_force_uppercase) echo 'checked="checked"' ?> value="checked" name="<?php echo $this->get_field_name( 'do_not_force_uppercase' ); ?>" id="<?php echo $this->get_field_id('do_not_force_uppercase'); ?>" />
        <label for="<?php echo $this->get_field_id('do_not_force_uppercase'); ?>"><?php esc_html_e('Do not force uppercase letters', 'wp-notes-widget'); ?></label>
      </p>

    </div>

  </div>
  <section  id="wp-notes-widget-font-settings-column"  class="wp-notes-widget-admin-container" >
    <h3>
      <?php esc_html_e('Font Style', 'wp-notes-widget'); ?>
    </h3>
      
    <div class="font-style-selection-container" >
    <?php

      $font_mapping = array(
        'kalam'                   => 'Kalam',
        'dancing-script'          => 'Dancing Script',
        'kaushan-script'          => 'Kaushan Script',
        'gloria-hallelujah'       => 'Gloria Hallelujah',
        'covered-by-your-grace'   => 'Covered By Your Grace',
        'courgette'               => 'Courgette',
        'coming-soon'             => 'Coming Soon',
        'satisfy'                 => 'Satisfy',
        'permanent-marker'        => 'Permanent Marker',
        'shadows-into-light-two'  => 'Shadows Into Light Two',
        'rock-salt'               => 'Rock Salt',
        'cookie'                  => 'Cookie',
        'handlee'                 => 'Handlee',
        'tangerine'               => 'Tangerine',
        'great-vibes'             => 'Great Vibes'
      );
    ?>
    <ul class="wp-notes-widget-font-list" >
      <?php
        foreach ($font_mapping as $key => $font_mapping_item) {
          ?>
          <li class="font-style-item font-<?php echo $key ?>" >
            <input type="radio" id="<?php echo $this->get_field_id('font-style-'. $key ); ?>" <?php checked( $key, $font_style ); ?> name="<?php echo $this->get_field_name( 'font_style' ); ?>" value="<?php echo $key ?>" />          
            <label for="<?php echo $this->get_field_id('font-style-'. $key ); ?>" id="font-selection-<?php echo $key ?>-label"  ><?php esc_html_e('Font Style','wp-notes-widget'); ?> - <?php echo $font_mapping_item ?></label>
          </li>
          <?php
        }
      ?>
    </ul>
    <div class="wp-notes-widget-footer-credits">
      <p>WP Notes Widget is developed by <a href='http://webrockstar.net?utm_source=wp-notes-widget-plugin&utm_medium=widget-footer'>Web Rockstar</a>. <br />
      Looking for notes in posts &amp; pages, categories, no ads, and more? Check out <a href='<?php echo WP_NOTES_WIDGET_PRO_LINK ?>?utm_source=wp-notes-widget-plugin&utm_medium=widget-footer' target="_blank" >WP Notes Widget PRO</a>.</p>
    </div>
  </div>
  </section>
