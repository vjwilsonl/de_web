<?php
    /**
     * The header for our theme
     *
     * This is the template that displays all of the <head> section and everything up until <div id="content">
     *
     * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package Difference_Engine
     */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= get_template_directory_uri() ?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= get_template_directory_uri() ?>/assets/favicon/safari-pinned-tab.svg" color="#0077c8">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS & JS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Archivo:400,600" rel="stylesheet">
    <link href="//cloud.typenetwork.com/projects/2596/fontface.css/" rel="stylesheet" type="text/css">

    <?php wp_head(); ?>
</head>

<?php
    if ( class_exists( 'acf' ) ) {
        $header_logo            = get_field( 'header_logo', 'option' );
        $header_logo_url        = ( isset( $header_logo['url'] ) ) ? $header_logo['url'] : get_template_directory_uri() . '/assets/images/DE_logo_horizontal.png';
        $sticky_header_logo     = get_field( 'sticky_header_logo', 'option' );
        $sticky_header_logo_url = ( isset( $sticky_header_logo['url'] ) ) ? $sticky_header_logo['url'] : get_template_directory_uri() . '/assets/images/DE_sticky_logo.svg';
    }
?>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <header class="main-header">
        <div class="row no-gutters px-3">
            <div class="col-sm-12 col-lg-4">
                <a class="navbar-brand" href="<?= get_home_url(); ?>"><img class="img-fluid" src="<?= $header_logo_url; ?>" alt="DE Logo"></a>
            </div>
            <div class="col-sm-12 col-lg-8">
                <!-- Secondary menu -->
                <ul class="list-inline subnav-links">
                    <?php get_template_part( 'template-parts/social-url' ) ?>
                    <li class="list-inline-item">
                        <form class="form-inline">
                          <input class="subnav-search form-control" type="search" placeholder="Search" aria-label="Search">
                          <button class="fa-button" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row no-gutters navbar-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Hamburger button -->
                <button class="hamburger hamburger--spin navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primenu" aria-controls="navbar-primenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
                <div class="col-sm-12 col-lg-12 collapse navbar-collapse" id="navbar-primenu">
                    <a href="<?= get_home_url(); ?>">
                        <div class="sticky-logo" style="display:none">
                            <img alt="Difference Engine Logo" src="<?= $sticky_header_logo_url; ?>">
                        </div>
                    </a>
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location'  => 'menu-1',
                                'container'       => FALSE,
                                'menu_class'      => 'navbar-nav',
                                'container_class' => 'nav-item',
                                'depth'           => 2,
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            )
                        );
                    ?>
                </div>
            </nav>
        </div>
    </header>

    <div id="content" class="site-content">
