  <div style="">
    <div class="wp-notes-widget-bootstrap" >
      <div class="modal fade" id="wp-notes-widget__shortcode-editor-modal"  tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php esc_html_e('Notes Shortcode Editor','wp-notes-widget'); ?></h4>
	            <button type="button" class="close" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              
              <div class="alert alert-info" role="alert">
                <i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo sprintf('This is a preview of the shortcode editor available in %s. Shortcodes allows for notes to be placed in posts and pages. Shortcodes will not be rendered in this free version.', '<a href="'. WP_NOTES_WIDGET_PRO_LINK .'?utm_source=wp-notes-widget-plugin&utm_medium=shortcode-editor-modal-header">WP Notes Widget PRO</a>'); ?>  
              </div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item"><a class="active nav-link" href="#visual" aria-controls="visual" role="tab" data-toggle="tab"><?php esc_html_e('Visual Settings','wp-notes-widget'); ?></a></li>
                <li role="presentation" class="nav-item" ><a class="nav-link"  href="#display" aria-controls="display" role="tab" data-toggle="tab"><?php esc_html_e('Display Notes','wp-notes-widget'); ?></a></li>
                <li role="presentation" class="nav-item" ><a class="nav-link" href="#general" aria-controls="general" role="tab" data-toggle="tab"><?php esc_html_e('General Settings','wp-notes-widget'); ?></a></li>
                <li role="presentation" class="nav-item" ><a class="nav-link" href="#font-style" aria-controls="font-style" role="tab" data-toggle="tab"><?php esc_html_e('Font Style','wp-notes-widget'); ?></a></li>
                <li role="presentation" class="nav-item" ><a class="nav-link" href="#shortcode" aria-controls="shortcode" role="tab" data-toggle="tab"><?php esc_html_e('Shortcode Settings','wp-notes-widget'); ?></a></li>
              </ul>

              <!-- Tab panes -->
              <div class="wp-notes-widget--tab-content-container">
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="visual">
                    <a href='#' class="wp-notes-widget__scroll-to-bottom hidden" ><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
                    <header>
                      <h4><?php esc_html_e('Visual Settings','wp-notes-widget'); ?></h4>
                    </header>
                    <div class="form-group" >
                      <label for="wp-notes-widget__settings__title" ><?php esc_html_e('Title', 'wp-notes-widget' ); ?></label>
                      <input type="text" id="wp-notes-widget__settings__title" name="wp-notes-widget__settings__title" />
                    </div>
                    <div class="wp-notes-widget__settings__select-container" >
                      <label for="wp-notes-widget__settings__thumb-tack-color" ><?php esc_html_e('Thumb Tack Color', 'wp-notes-widget' ) ?></label>
                      <select id="wp-notes-widget__settings__thumb-tack-color" name='wp-notes-widget__settings__thumb-tack-color' >
                        <option value="red"     <?php selected( $default_val['thumb_tack_colour'], 'red' ); ?> >     <?php esc_html_e('Red', 'wp-notes-widget' ) ?></option>
                        <option value="blue"    <?php selected( $default_val['thumb_tack_colour'], 'blue' ); ?> >    <?php esc_html_e('Blue', 'wp-notes-widget' ) ?></option>
                        <option value="green"   <?php selected( $default_val['thumb_tack_colour'], 'green' ); ?> >   <?php esc_html_e('Green', 'wp-notes-widget' ) ?></option>
                        <option value="gray"    <?php selected( $default_val['thumb_tack_colour'], 'gray' ); ?> >    <?php esc_html_e('Gray', 'wp-notes-widget' ) ?></option>
                        <option value="orange"  <?php selected( $default_val['thumb_tack_colour'], 'orange' ); ?> >  <?php esc_html_e('Orange', 'wp-notes-widget' ) ?></option>
                        <option value="pink"    <?php selected( $default_val['thumb_tack_colour'], 'pink' ); ?> >     <?php esc_html_e('Pink', 'wp-notes-widget' ) ?></option>
                        <option value="teal"    <?php selected( $default_val['thumb_tack_colour'], 'teal' ); ?> >    <?php esc_html_e('Teal', 'wp-notes-widget' ) ?></option>
                        <option value="yellow"  <?php selected( $default_val['thumb_tack_colour'], 'yellow' ); ?> >  <?php esc_html_e('Yellow', 'wp-notes-widget' ) ?></option>
                      </select>                    
                    </div>
                    
                    <div class="wp-notes-widget__settings__select-container" >
                      <label for="wp-notes-widget__settings__background-color" ><?php esc_html_e('Background Color', 'wp-notes-widget' ) ?></label>
                      <select id="wp-notes-widget__settings__background-color" name='wp-notes-widget__settings__background-color' >
                        <option value="yellow"      <?php selected( $default_val['background_colour'], 'yellow' ); ?> >    <?php esc_html_e('Yellow', 'wp-notes-widget' ) ?>      </option>
                        <option value="blue"        <?php selected( $default_val['background_colour'], 'blue' ); ?> >      <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>        </option>
                        <option value="green"       <?php selected( $default_val['background_colour'], 'green' ); ?> >     <?php esc_html_e('Green', 'wp-notes-widget' ) ?>      </option>
                        <option value="pink"        <?php selected( $default_val['background_colour'], 'pink' ); ?> >      <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>        </option>
                        <option value="orange"      <?php selected( $default_val['background_colour'], 'orange' ); ?> >    <?php esc_html_e('Orange', 'wp-notes-widget' ) ?>      </option>
                        <option value="white"       <?php selected( $default_val['background_colour'], 'white' ); ?> >     <?php esc_html_e('White', 'wp-notes-widget' ) ?>      </option>
                        <option value="dark-grey"   <?php selected( $default_val['background_colour'], 'dark-grey' ); ?> > <?php esc_html_e('Dark Grey', 'wp-notes-widget' ) ?>  </option>
                        <option value="light-grey"  <?php selected( $default_val['background_colour'], 'light-grey' ); ?> ><?php esc_html_e('Light Grey', 'wp-notes-widget' ) ?>  </option>
                      </select>                    
                    </div>
                    
                    <div class="wp-notes-widget__settings__select-container" >
                      <label for="wp-notes-widget__settings__text-color" ><?php esc_html_e('Text Color', 'wp-notes-widget' ) ?></label>
                      <select id="wp-notes-widget__settings__text-color" name='wp-notes-widget__settings__text-color' >
                        <option value="red"         <?php selected( $default_val['text_colour'], 'red' ); ?> >  <?php esc_html_e('Red', 'wp-notes-widget' ) ?>        </option>
                        <option value="blue"        <?php selected( $default_val['text_colour'], 'blue' ); ?> >  <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>        </option>
                        <option value="black"       <?php selected( $default_val['text_colour'], 'black' ); ?> >  <?php esc_html_e('Black', 'wp-notes-widget' ) ?>      </option>
                        <option value="pink"        <?php selected( $default_val['text_colour'], 'pink' ); ?> >  <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>        </option>
                        <option value="white"       <?php selected( $default_val['text_colour'], 'white' ); ?> >  <?php esc_html_e('White', 'wp-notes-widget' ) ?>      </option>
                        <option value="dark-grey"   <?php selected( $default_val['text_colour'], 'dark-grey' ); ?> >  <?php esc_html_e('Dark Grey', 'wp-notes-widget' ) ?>  </option>
                        <option value="light-grey"  <?php selected( $default_val['text_colour'], 'light-grey' ); ?> >  <?php esc_html_e('Light Grey', 'wp-notes-widget' ) ?>  </option>
                      </select>                    
                    </div>

                    <div class="wp-notes-widget__settings__select-container" >
                      <label for="wp-notes-widget__settings__font-size" ><?php esc_html_e('Font Size', 'wp-notes-widget' ) ?></label>
                      <select id="wp-notes-widget__settings__font-size" name='wp-notes-widget__settings__font-size' >
                        <option value="minus-50" <?php selected( $default_val['font_size'], 'minus-50' ); ?> > <?php esc_html_e('50% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-45" <?php selected( $default_val['font_size'], 'minus-45' ); ?> > <?php esc_html_e('45% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-40" <?php selected( $default_val['font_size'], 'minus-40' ); ?> > <?php esc_html_e('40% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-35" <?php selected( $default_val['font_size'], 'minus-35' ); ?> > <?php esc_html_e('35% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-30" <?php selected( $default_val['font_size'], 'minus-30' ); ?> > <?php esc_html_e('30% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-25" <?php selected( $default_val['font_size'], 'minus-25' ); ?> > <?php esc_html_e('25% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-20" <?php selected( $default_val['font_size'], 'minus-20' ); ?> > <?php esc_html_e('20% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-15" <?php selected( $default_val['font_size'], 'minus-15' ); ?> > <?php esc_html_e('15% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-10" <?php selected( $default_val['font_size'], 'minus-10' ); ?> > <?php esc_html_e('10% smaller', 'wp-notes-widget' ) ?>  </option>
                        <option value="minus-5"  <?php selected( $default_val['font_size'], 'minus-5' ); ?> > <?php esc_html_e('5% smaller', 'wp-notes-widget' ) ?>  </option>
                        
                        <option value="normal" <?php selected( $default_val['font_size'], 'normal' ); ?> >    <?php esc_html_e('Normal', 'wp-notes-widget' ) ?></option>
                        
                        <option value="plus-5"  <?php selected( $default_val['font_size'], 'plus-5' ); ?> >   <?php esc_html_e('5% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-10" <?php selected( $default_val['font_size'], 'plus-10' ); ?> >  <?php esc_html_e('10% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-15" <?php selected( $default_val['font_size'], 'plus-15' ); ?> >  <?php esc_html_e('15% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-20" <?php selected( $default_val['font_size'], 'plus-20' ); ?> >  <?php esc_html_e('20% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-25" <?php selected( $default_val['font_size'], 'plus-25' ); ?> >  <?php esc_html_e('25% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-30" <?php selected( $default_val['font_size'], 'plus-30' ); ?> >  <?php esc_html_e('30% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-35" <?php selected( $default_val['font_size'], 'plus-35' ); ?> >  <?php esc_html_e('35% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-40" <?php selected( $default_val['font_size'], 'plus-40' ); ?> >  <?php esc_html_e('40% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-45" <?php selected( $default_val['font_size'], 'plus-45' ); ?> >  <?php esc_html_e('45% larger', 'wp-notes-widget' ) ?>  </option>
                        <option value="plus-50" <?php selected( $default_val['font_size'], 'plus-50' ); ?> >  <?php esc_html_e('50% larger', 'wp-notes-widget' ) ?>  </option>
                      </select>                    
                    </div>

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="display">
                    <a href='#' class="wp-notes-widget__scroll-to-bottom hidden" ><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
                    <header>
                      <h4><?php esc_html_e('Show/Hide Notes', 'wp-notes-widget' ) ?></h4>
                      <p>
                      <?php
                        $edit_link = '<a href="/wp-admin/edit.php?post_type=nw-item">'. esc_html__('Edit Notes','wp-notes-widget') . '</a>';
                      ?>

                      <?php echo sprintf(esc_html__('You can either display a selection of individual notes or all the notes from a category. Notes can be managed on the %s page.'), $edit_link );?>
                        
                      </p>
                    </header>
                    
                    <p class="wp-notes-widget__settings__adjustment-options" >
                      <label>
                        <input type="radio" checked data-content-id="wp-notes-widget__settings__show-individual" id="wp-notes-widget__settings__show-type--individual" name="wp-notes-widget__settings__show-type" value="notes" />
                        <?php esc_html_e('Select individual notes to show', 'wp-notes-widget'); ?>
                      </label>
                      <label>
                        <input type="radio" data-content-id="wp-notes-widget__settings__show-category"  id="wp-notes-widget__settings__show-type--category"  name="wp-notes-widget__settings__show-type" value="category" />
                        <?php esc_html_e('Show all notes from a category', 'wp-notes-widget'); ?>
                      </label>
                    </p>

                    <div id="wp-notes-widget__settings__show-individual" class="wp-notes-widget__settings__show-notes-container" >
                      <ul class="wp-notes-widget__settings__show-notes-list" >
                        <?php
                          $note_query_args =   array (  
                            'post_type'         => 'nw-item', 
                            'posts_per_page'    => -1,
                            'order'             => 'ASC',
                            'orderby'           => 'menu_order date',
                            'post_status'       => 'publish'
                          );

                          $note_query = new WP_Query( $note_query_args );
                          //global $post;
                          if ( $note_query->have_posts()) {
                            foreach ($note_query->get_posts() as $p) {
                              ?>
                                <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                                  
                                    <input type="checkbox" class="" id="wp-notes-widget__settings__select-post-<?php echo $p->ID; ?>" name="wp-notes-widget__settings__select-post[]" value="<?php echo $p->ID; ?>" />
                                    <label class="normal-font-weight" for="wp-notes-widget__settings__select-post-<?php echo $p->ID; ?>" ><?php echo get_the_title($p->ID); ?> </label>
                                </li>

                              <?php
                            }
                            
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
                    <div id="wp-notes-widget__settings__show-category" class="hidden wp-notes-widget__settings__show-notes-container" >
                      <p><i class="fa fa-info-circle" aria-hidden="true"></i> <?php esc_html_e('Note categories are available in', 'wp-notes-widget'); ?> <a href='<?php echo WP_NOTES_WIDGET_PRO_LINK ?>?utm_source=wp-notes-widget-plugin&utm_medium=shortcode-settings-modal-categories'>WP Notes Widget PRO</a>.</p>
                    </div>                  
                  </div>
                  <div role="tabpanel" class="tab-pane fade " id="general">
                    <a href='#' class="wp-notes-widget__scroll-to-bottom hidden" ><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
                    <header>
                      <h4><?php esc_html_e('General Settings', 'wp-notes-widget'); ?></h4> 
                    </header>
                    
                    <ul>
                      <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                        <input type="checkbox" <?php checked((bool)$default_val['show_date']); ?> value="true" name="wp-notes-widget__settings__display-date" id="wp-notes-widget__settings__display-date" />
                        <label for="wp-notes-widget__settings__display-date"><?php esc_html_e('Display date when note was published', 'wp-notes-widget'); ?></label>
                          
                      </li class="wp-notes-widget__settings__radio-checkbox-input-item" >

                      <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                        <input type="checkbox" <?php checked((bool)$default_val['use_custom_style']); ?> value="true" name="wp-notes-widget__settings__use-own-css" id="wp-notes-widget__settings__use-own-css" />
                        <label for="wp-notes-widget__settings__use-own-css"><?php esc_html_e('I will use my own CSS styles for WP Notes Widget', 'wp-notes-widget'); ?></label>
                          
                      </li>

                      <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                        <input type="checkbox" <?php checked((bool)$default_val['hide_if_empty']); ?> value="true" name="wp-notes-widget__settings__hide-if-empty" id="wp-notes-widget__settings__hide-if-empty" />
                        <label for="wp-notes-widget__settings__hide-if-empty"><?php esc_html_e('Hide WP Notes Widget if there are no published notes available', 'wp-notes-widget'); ?></label>
                          
                      </li>

                      <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                        <input type="checkbox" <?php checked((bool)$default_val['multiple_notes']); ?> value="true" name="wp-notes-widget__settings__display-single-notes" id="wp-notes-widget__settings__display-single-notes" />
                        <label for="wp-notes-widget__settings__display-single-notes"><?php esc_html_e('Use individual "sticky notes" for each note', 'wp-notes-widget'); ?></label>
                          
                      </li>

                      <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                        <input type="checkbox" <?php checked((bool)$default_val['enable_social_share']); ?> value="true" name="wp-notes-widget__settings__enable-social-sharing" id="wp-notes-widget__settings__enable-social-sharing" />
                        <label for="wp-notes-widget__settings__enable-social-sharing"><?php esc_html_e('Enable social sharing of notes', 'wp-notes-widget'); ?></label>
                      </li>

                      <li class="wp-notes-widget__settings__radio-checkbox-input-item" >
                        <input type="checkbox" <?php checked((bool)$default_val['do_not_force_uppercase']); ?> value="true" name="wp-notes-widget__settings__no-uppercase" id="wp-notes-widget__settings__no-uppercase" />
                        <label for="wp-notes-widget__settings__no-uppercase"><?php esc_html_e('Do not force uppercase letters', 'wp-notes-widget'); ?></label>
                      </li>
                    </ul>                  
                  </div>
                  <section role="tabpanel" class="tab-pane fade" id="font-style">
                    <a href='#' class="wp-notes-widget__scroll-to-bottom hidden" ><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
                    <header>
                      <h4><?php esc_html_e('Font Style', 'wp-notes-widget'); ?></h4>
                    </header>
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
                            <li class="wp-notes-widget__settings__radio-checkbox-input-item font-style-item font-<?php echo $key ?>" >
                              <input type="radio" id="<?php echo  $key ; ?>" <?php checked($default_val['font_style'], $key); ?> name="wp-notes-widget__settings__font" value="<?php echo $key ?>" />          
                              <label for="<?php echo $key ; ?>" id="font-selection-<?php echo $key ?>-label"  ><?php esc_html_e('Font Style','wp-notes-widget'); ?> - <?php echo $font_mapping_item ?></label>
                            </li>
                            <?php
                          }
                        ?>
                      </ul>
                    </div>                   
                  </section>
                  <section role="tabpanel" class="tab-pane fade" id="shortcode">
                    <a href='#' class="wp-notes-widget__scroll-to-bottom hidden" ><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a>
                    <header>
                      <h4><?php esc_html_e('Shortcode Settings', 'wp-notes-widget'); ?></h4>
                    </header>
                    
                    <div class="form-group">
                      <label for="wp-notes-widget__settings__max-width"><?php esc_html_e('Max Width of Note Container:', 'wp-notes-widget'); ?></label>
                      <label for="wp-notes-widget__settings__max-width-units" class="sr-only" ><?php esc_html_e('Units:', 'wp-notes-widget'); ?></label>
                      <div class="wp-notes-widget__flex-container">
                        <input type="number" min="1" class="form-control wp-notes-widget__settings--small" id="wp-notes-widget__settings__max-width" name="wp-notes-widget__settings__max-width" value="<?php echo $default_setting_val['max_width']; ?>" >
                        <select id="wp-notes-widget__settings__max-width-units" name="wp-notes-widget__settings__max-width-units" >
                          <option value="px" <?php selected($default_setting_val['max_width_units'], 'px'); ?> >px</option>
                          <option value="percent" <?php selected($default_setting_val['max_width_units'], 'percent'); ?> >%</option>
                          <option value="rem" <?php selected($default_setting_val['max_width_units'], 'rem'); ?> >rem</option>
                          <option value="em" <?php selected($default_setting_val['max_width_units'], 'em'); ?> >em</option>
                        </select>
                      </div>
                    
                    </div>
                    
                    <div class="form-group">
                      <label for="wp-notes-widget__settings__alignment-options" ><?php esc_html_e('Alignment', 'wp-notes-widget'); ?></label>
                      <div id="wp-notes-widget__settings__alignment-options" >
                        <label class="radio-inline"><input type="radio" name="wp-notes-widget__settings__alignment" value="left" <?php checked($default_setting_val['alignment'], 'left'); ?> ><?php esc_html_e('Left', 'wp-notes-widget'); ?></label>
                        <label class="radio-inline"><input type="radio" name="wp-notes-widget__settings__alignment" value="center" <?php checked($default_setting_val['alignment'], 'center'); ?> ><?php esc_html_e('Center', 'wp-notes-widget'); ?></label>
                        <label class="radio-inline"><input type="radio" name="wp-notes-widget__settings__alignment" value="right" <?php checked($default_setting_val['alignment'], 'right'); ?> ><?php esc_html_e('Right', 'wp-notes-widget'); ?></label>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="wp-notes-widget__settings__direction-options" ><?php esc_html_e('Direction', 'wp-notes-widget'); ?></label>
                      <div class="wp-notes-widget__settings__direction-options">
                        <label class="radio-inline"><input type="radio" name="wp-notes-widget__settings__direction" value="vertical" <?php checked($default_setting_val['direction'], 'vertical'); ?> ><?php esc_html_e('Vertical', 'wp-notes-widget'); ?></label>
                        <label class="radio-inline"><input type="radio" name="wp-notes-widget__settings__direction" value="horizontal" <?php checked($default_setting_val['direction'], 'horizontal'); ?> ><?php esc_html_e('Horizontal', 'wp-notes-widget'); ?></label>
                      </div>
                    </div>

                  </section>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="well">
                    <h5 id="wp-notes-widget__rendered-shortcode" ><?php esc_html_e('Your Shortcode', 'wp-notes-widget'); ?></h5>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button"  class="btn btn-secondary" data-dismiss="modal"><?php esc_html_e('Close', 'wp-notes-widget'); ?></button>
              <!--
                <button type="button" id="wp-notes-widget--insert-shortcode"  class="btn btn-primary"><?php esc_html_e('Insert and Close', 'wp-notes-widget'); ?></button>
              -->
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>
  </div>