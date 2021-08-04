<?php

$args = array(
    'custom_color' => '',
    'align' => 'left'
);

extract(shortcode_atts($args, $atts));

$extra_css = '';
if( $custom_color != '' ){
    $extra_css = 'style="color:'.$custom_color.'"';
}

?>
<div class="cl-element cl-social-icons cl-social-icons--align-<?php echo esc_attr( $align ) ?>">
<?php

    echo '<ul class="social-icons-widget">';

            $facebook = codeless_get_mod( 'facebook_link', '' );
            $dribbble = codeless_get_mod( 'dribbble_link', '' );
            $google = codeless_get_mod( 'google_link', '' );
            $twitter = codeless_get_mod( 'twitter_link', '' );
            $foursquare = codeless_get_mod( 'foursquare_link', '' );
            $pinterest = codeless_get_mod( 'pinterest_link', '' );
            $linkedin = codeless_get_mod( 'linkedin_link', '' );
            $youtube = codeless_get_mod( 'youtube_link', '' );
            $email = codeless_get_mod( 'email_link', '' );
            $instagram = codeless_get_mod( 'instagram_link', '' );
            $github = codeless_get_mod( 'github_link', '' );
            $skype = codeless_get_mod( 'skype_link', '' );
            $soundcloud = codeless_get_mod( 'soundcloud_link', '' );
            $slack = codeless_get_mod( 'slack_link', '' );
            $behance = codeless_get_mod( 'behance_link', '' );
            
            if( !empty($facebook) )
               echo '<li class="facebook"><a href="'.esc_url($facebook).'"><i class="cl-icon-facebook" '.$extra_css.'></i></a></li>';
            if( !empty($twitter) )
                echo '<li class="twitter"><a href="'.esc_url($twitter).'"><i class="cl-icon-twitter" '.$extra_css.'></i></a></li>';
            if( !empty($google) )
                echo '<li class="google"><a href="'.esc_url($google).'"><i class="cl-icon-google-plus" '.$extra_css.'></i></a></li>';
            if( !empty($dribbble) )
                echo '<li class="dribbble"><a href="'.esc_url($dribbble).'"><i class="cl-icon-dribbble" '.$extra_css.'></i></a></li>';
            if( !empty($linkedin) )
                echo '<li class="linkedin"><a href="'.esc_url($linkedin).'"><i class="cl-icon-linkedin" '.$extra_css.'></i></a></li>';
            if( !empty($pinterest) )
                echo '<li class="pinterest"><a href="'.esc_url($pinterest).'"><i class="cl-icon-pinterest" '.$extra_css.'></i></a></li>';
            if( !empty($youtube) )
                echo '<li class="youtube"><a href="'.esc_url($youtube).'"><i class="cl-icon-youtube-play" '.$extra_css.'></i></a></li>';
            if( !empty($email) )
                echo '<li class="email"><a href="'.esc_url($email).'"><i class="cl-icon-email" '.$extra_css.'></i></a></li>';
            if( !empty($instagram) )
                echo '<li class="instagram"><a href="'.esc_url($instagram).'"><i class="cl-icon-instagram" '.$extra_css.'></i></a></li>';
            if( !empty($github) )
                echo '<li class="github"><a href="'.esc_url($github).'"><i class="cl-icon-github-box" '.$extra_css.'></i></a></li>';
            if( !empty($skype) )
                echo '<li class="skype"><a href="'.esc_url($skype).'"><i class="cl-icon-skype" '.$extra_css.'></i></a></li>';
            if( !empty($soundcloud) )
                echo '<li class="soundcloud"><a href="'.esc_url($soundcloud).'"><i class="cl-icon-soundcloud" '.$extra_css.'></i></a></li>';
            if( !empty($slack) )
                echo '<li class="slack"><a href="'.esc_url($slack).'"><i class="cl-icon-slack" '.$extra_css.'></i></a></li>';
            if( !empty($behance) )
                echo '<li class="behance"><a href="'.esc_url($behance).'"><i class="cl-icon-behance" '.$extra_css.'></i></a></li>';

            if( !empty($foursquare) )
                echo '<li class="foursquare"><a href="'.esc_url($foursquare).'"><i class="cl-icon-foursquare" '.$extra_css.'></i></a></li>';

        echo '</ul>';
?>
</div>