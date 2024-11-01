<?php 

/*
* Basado en los Estatus de Transicion de los POST
* Transition Post status Docs
* https://developer.wordpress.org/reference/hooks/transition_post_status/
*/

if(!defined('ABSPATH')) exit;


function mc_notifyme_send_email($new_status, $old_status, $post)  {
   
    $title = "";
    $content = "";
    $permalink = "";
    $title = "";
    $content = "";
    $meta_data = "";
    $headers = array('Content-type: text/html; charset=UTF-8');
    $email_to = esc_attr( get_option('mc_notifyme_options_email_to') );    
    $email_title = esc_attr( get_option('mc_notifyme_options_email_title') );
    
    $author = $post->post_author; /* Post author ID. */
    $name = get_the_author_meta( 'display_name', $author );
    $email = get_the_author_meta( 'user_email', $author );
    $permalink = get_permalink(  $post->ID  );
    $usersarray = array( $email_to );
    $users = implode( ",", $usersarray );
    $email_message =  esc_attr( get_option('mc_notifyme_options_email_message') );
    // labels tags replace on title
    $email_title = str_replace('{post-title}', $post->post_title, $email_title);
    $email_title = str_replace('{post-author}', $name, $email_title );
    $email_title = str_replace('{post-author-email}', $email, $email_title );
    $email_title = str_replace('{post-status}', $new_status, $email_title );
    $email_title = str_replace('{post-permalink}', $permalink, $email_title );
    // labels tags replace on message
    $email_message = str_replace('{post-title}', $post->post_title, $email_message );
    $email_message = str_replace('{post-author}', $name, $email_message );
    $email_message = str_replace('{post-author-email}', $email, $email_message );
    $email_message = str_replace('{post-status}', $new_status, $email_message );
    $email_message = str_replace('{post-permalink}', $permalink, $email_message );
    //*** Include Metadata (message made with labels tags) *//
    if( "1" === get_option( 'mc_notifyme_options_include_meta_data' ) ){
        $meta_data = sprintf( "\n" );
        $meta_data .= sprintf( "\n" . __( 'Title', 'notify-me' ) . ': %s', $post->post_title );
        $meta_data .=  sprintf( "\n" . __( 'Status', 'notify-me' ) . ': %s', $new_status );
        $meta_data .=  sprintf( "\n" . __( 'Author', 'notify-me' ) . ': %s', $name ); 
        $meta_data .=  sprintf( "\n" . __( 'Email', 'notify-me' ) . ': %s', $email );
        $email_message .=  $meta_data;
    }
    if( "1" === get_option( 'mc_notifyme_options_include_title' ) ){
        $title = $post->post_title;
        $email_title .=  $title ;
    }    
    if( "1" === get_option('mc_notifyme_options_include_permalink' ) ){
        
        $email_message .=  sprintf( "\n\n" .  __( 'View Post', 'notify-me' ) . ': %s', $permalink );
    }
   
    //------------ Post Status  ----------------------//
    // published
    if( "1" === get_option( 'mc_notifyme_options_post_published' ) ){
        if ( ( 'publish' === $new_status && 'publish' !== $old_status )
            && 'post' === $post->post_type ) {
                wp_mail( $users,  __( '(Published) ', 'notify-me' ) . $email_title, $email_message, '' );           
        }
    }
    // update
    if( "1" === get_option( 'mc_notifyme_options_post_update' ) ){    
        if ( ( 'publish' === $new_status && 'publish' === $old_status )
            && 'post' === $post->post_type ) {
                wp_mail( $users, __( '(Updated) ', 'notify-me' ) . $email_title, $email_message, '' );
        }
    }

    // Scheduler
    if( "1" === get_option( 'mc_notifyme_options_post_future' ) ){ 
        if ( ( 'future' === $new_status && 'publish' !== $old_status )
            && 'post' === $post->post_type ) {
                wp_mail( $users, __( '(Schedulered) ', 'notify-me' ) . $email_title, $email_message, '');           
        }
    }

    // Draft
    if( "1" === get_option( 'mc_notifyme_options_post_draft' ) ){ 
        if ( ( 'draft' === $new_status && 'draft' !== $old_status ) 
            && 'post' === $post->post_type ) {
                wp_mail( $users, __( '(Drafted) ', 'notify-me' ) . $email_title, $email_message, '');           
        }
    }

    // Delete
    if( "1" === get_option( 'mc_notifyme_options_post_trash' ) ){ 
        if ( ( 'trash' === $new_status && 'trash' !== $old_status )
            && 'post' === $post->post_type ) {
                wp_mail( $users, __( '(Deleted)', 'notify-me' ) . $email_title, $email_message, '');           
        }
    }

    // Private
    if( "1" === get_option( 'mc_notifyme_options_post_private' ) ){ 
        if ( ( 'private' === $new_status && 'private' !== $old_status )
            && 'post' === $post->post_type ) {
                wp_mail( $users, __( '(Private)', 'notify-me' ) . $email_title, $email_message, '');           
        }
    }

    // Pending Review
    if( "1" === get_option( 'mc_notifyme_options_post_pending' ) ){ 
        if ( ( 'pending' === $new_status && 'pending' !== $old_status )
            && 'post' === $post->post_type ) {
                wp_mail( $users, __( '(Pending Review)', 'notify-me' ) . $email_title, $email_message, '');           
        }
    }
 
    
    return $post->ID;
    
} 
add_action( 'transition_post_status', 'mc_notifyme_send_email', 10, 3 );

