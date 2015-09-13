<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
        
<header id="main-header">
    <nav class="navbar-default navbar-static-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#rd-collapse">
                    <span class="fa fa-bars"></span>
                    <span class="sr-only screen-reader-text">Toggle navigation</span>
                </button>
                <?php
                    $options = get_option( 'deluxe_theme_options' );
                    if( !empty( $options['logo'] ) ) {
                        echo '<a class="navbar-logo" href=" ' . esc_url( home_url( '/' ) ) .  '"><img src="' . esc_url( $options['logo'] ) . '"></a>' ;
                    } else {
                        echo '<a class="navbar-brand" href=" ' . esc_url( home_url( '/' ) ) .  '">' . get_bloginfo('name') . '</a>' ;
                    }
                ?>
            </div>
            
            <div id="rd-collapse" class="collapse navbar-collapse">
            
            <?php
            if ( has_nav_menu( 'primary' )) {
                $menu = wp_nav_menu( array(
                    'echo' => 0,
                    'menu_id' => 'main-menu',
                    'theme_location' => 'primary',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class' => 'navbar-nav nav',
                ) );
            } else {
                $menu = wp_nav_menu( array(
                    'echo' => 0,
                    'menu_id' => 'main-menu',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'menu_class' => 'navbar-nav nav',
                ) );
            }
            $dom = new DOMDocument();
            $dom->loadHTML($menu);
            $xpath = new DOMXPath($dom);
            $lis = $xpath->evaluate('//div/ul/li');
            for ( $i=0; $i < $lis->length-1; $i++ ) {
                $li = $lis->item($i);
                $class = $li->getAttribute('class');
                if(strstr($class, 'menu-item-has-children')) {
                    $li->removeAttribute('class');
                    $li->setAttribute('class', 'dropdown');
                    $li->firstChild->setAttribute('class', 'dropdown-toggle');
                    $li->firstChild->setAttribute('data-toggle', 'dropdown');
                    $li->lastChild->setAttribute('class', 'dropdown-menu');
                }
            }
            $menu = $dom->saveHTML( $dom );
            echo( $menu );
            ?>
        </div>

        </div>
    </nav>
</header>

<div class="container">

    <div class="row">