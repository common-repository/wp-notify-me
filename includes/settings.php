<?php
if(!defined('ABSPATH')) exit;

function mc_notifyme_settings() {
    add_menu_page('Notify Me', 'WP Notify Me', 'administrator', 'notifyme_settings', 'mc_notifyme_options', 'dashicons-megaphone', 90);

    //llamar al registro de opciones de nuestro plugin
   add_action('admin_init', 'mc_notifyme_register_options');
}
 add_action('admin_menu', 'mc_notifyme_settings');


 function mc_notifyme_register_options() {
    //registrar opciones, una por campo
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_email_to');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_email_title');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_email_message');

    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_include_meta_data');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_include_title');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_include_permalink');

    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_published');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_update');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_future');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_draft');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_trash');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_private');
    register_setting('mc_notifyme_options_group', 'mc_notifyme_options_post_pending');
    
}


function mc_notifyme_options() {
    ?>

        <div class="wrap">
            <h1> <?php echo __( 'WP Notify Me Settings', 'wp-notify-me' ); ?> </h1>

            <div class="notice notice-info is-dismissible">
                <p> <span class="dashicons dashicons-info" style="color:#00a0d2"></span> <?php echo __( 'You can use the meta-tags: {post-title}, {post-author}, {post-author-email}, {post-status}, {post-permalink} in the Title or Message fields', 'wp-notify-me' ); ?></p>
            </div>
            
            <form action="options.php" method="post">
                <?php settings_fields('mc_notifyme_options_group');  ?>
                <?php do_settings_sections('mc_notifyme_options_group'); ?>
                <table class="form-table">

                     <tr valign="top">
                        <th scope="row" class="titledesc"><h2> <?php echo __( 'Email Settings', 'wp-notify-me' ); ?> </h2></th>
                        <td class="forminp forminp-text"><hr/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Emails To', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text"><input class="regular-text" type="text" name="mc_notifyme_options_email_to" value="<?php echo esc_attr( get_option('mc_notifyme_options_email_to') ); ?>"></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Title', 'wp-notify-me' ); ?>  </th>
                            <td class="forminp forminp-text"><input class="regular-text" type="text" name="mc_notifyme_options_email_title" value="<?php echo esc_attr( get_option('mc_notifyme_options_email_title') ); ?>"><br/>
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Message', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">                        
                             <textarea class="regular-text" name="mc_notifyme_options_email_message" cols="100%" rows="7"><?php echo esc_attr( get_option('mc_notifyme_options_email_message') ); ?></textarea><br/>
                        </td>
                    </tr>


                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Metadata', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">                        
                             <input type="checkbox" name="mc_notifyme_options_include_meta_data" value="1" <?php checked(1, get_option('mc_notifyme_options_include_meta_data'), true); ?> />  <?php echo __( 'Include Post Metadata', 'wp-notify-me' ); ?> 
                        </td>
                    </tr>
                    
                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Permalink', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">                        
                        <input type="checkbox" name="mc_notifyme_options_include_permalink" value="1" <?php checked(1, get_option('mc_notifyme_options_include_permalink'), true); ?> /> <?php echo __( 'Include Post Permalink', 'wp-notify-me' ); ?> 
                        </td>
                    </tr>
                  
                    <tr valign="top">
                        <th scope="row" class="titledesc"><h2> <?php echo __( 'Actions', 'wp-notify-me' ); ?>  </h2></th>
                        <td class="forminp forminp-text"><hr/></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Published Post', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_published" value="1" <?php checked(1, get_option('mc_notifyme_options_post_published'), true); ?> />
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Update Post', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_update" value="1" <?php checked(1, get_option('mc_notifyme_options_post_update'), true); ?> />
                        </td>
                    </tr>


                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Schedule Post', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_future" value="1" <?php checked(1, get_option('mc_notifyme_options_post_future'), true); ?> />
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Draft Post', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_draft" value="1" <?php checked(1, get_option('mc_notifyme_options_post_draft'), true); ?> />
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Delete Post', 'wp-notify-me' ); ?> </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_trash" value="1" <?php checked(1, get_option('mc_notifyme_options_post_trash'), true); ?> />
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Private Post', 'wp-notify-me' ); ?> </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_private" value="1" <?php checked(1, get_option('mc_notifyme_options_post_private'), true); ?> />
                        </td>
                    </tr>

                    <tr valign="top">
                        <th scope="row" class="titledesc"> <?php echo __( 'Pending Review', 'wp-notify-me' ); ?>  </th>
                        <td class="forminp forminp-text">
                            <input type="checkbox" name="mc_notifyme_options_post_pending" value="1" <?php checked(1, get_option('mc_notifyme_options_post_pending'), true); ?> />
                        </td>
                    </tr>

                </table>


                <?php  submit_button(); ?>
            
            </form>
        
        </div>

    <?php

 }