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
        $header_logo_url        = ( isset( $header_logo['url'] ) ) ? $header_logo['url'] : get_template_directory_uri() . '/assets/images/DifferenceEngineLogo.svg';
        $sticky_header_logo     = get_field( 'sticky_header_logo', 'option' );
        $sticky_header_logo_url = ( isset( $sticky_header_logo['url'] ) ) ? $sticky_header_logo['url'] : get_template_directory_uri() . '/assets/images/DifferenceEngine-StickyLogo.svg';
    }
?>
<body class="main" <?php body_class(); ?>>
<div id="page" class="site">

    <div class="container-fluid">

        <header class="main-header">

            <div class="container">
                <div class="col-sm-12 offset-lg-4 col-lg-8">
                    <!-- Secondary menu -->
                    <ul class="list-inline subnav-links">
                        <?php get_template_part( 'template-parts/social-url-icon' ) ?>
                        <li class="list-inline-item">
                            <?php get_search_form(); ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="navbar-wrapper">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <div class="col-sm-6 col-lg-3">
                            <a class="navbar-brand" href="<?= get_home_url(); ?>">
                                <img class="img-fluid main-logo" src="<?= $header_logo_url; ?>" alt="Difference Engine">
                                <img class="img-fluid sticky-logo" src="<?= $sticky_header_logo_url; ?>" alt="Difference Engine" style="display: none;">
                            </a>
                        </div>
                        <!-- Hamburger button -->
                        <button class="hamburger hamburger--spin navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primenu" aria-controls="navbar-primenu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        <div class="col-sm-12 col-lg-9 collapse navbar-collapse" id="navbar-primenu">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'menu-1',
                                        'container'       => FALSE,
                                        'menu_class'      => 'navbar-nav nav-fill w-100',
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
            </div>
        </header>

    </div>

    <div id="content" class="site-content">
