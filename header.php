<!DOCTYPE html>
<html <?php language_attributes(); ?> >

    <head>
        <script data-ad-client="ca-pub-6625473406539068" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169352200-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-169352200-1');
        </script>
        
        <?php wp_head(); ?>

        <meta name="facebook-domain-verification" content="tll2j85i5xkeu41pg1m9gtc5f5kgq4" />

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta property="og:locale" content="pt_BR">
        <meta property="og:url" content="<?php the_permalink(); ?>">
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php the_title(); ?>">
        <meta property="og:description" content="<?php the_excerpt(); ?>">
        <meta property="og:image" content="<?php the_post_thumbnail_url(); ?>">
        <meta property="fb:app_id" content="844815932679017">
        <meta property="og:image:alt" content="<?php the_title(); ?>">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@desportiva1963">
        <meta name="twitter:creator" content="@desportiva1963">
        <meta name="twitter:title" content="<?php the_title(); ?>">
        <meta name="twitter:description" content="<?php the_excerpt(); ?>">
        <meta name="twitter:image" content="<?php the_post_thumbnail_url(); ?>">

        <title><?php bloginfo('name'); ?> - O time do povo capixaba!</title>
        
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    </head>

    <body class="d-flex flex-column align-items-stretch">

        <a href="http://socioloucoportiva.com.br" target="_blank" id="sociotiva" class="btn btn-gold btn-lg">
            <i class="fas fa-id-card mr-2"></i> Seja Sócio
        </a>

        <?php
            if( is_front_page() ) {
                $bg = array( '01', '02', '03', '04', '05' );
                $i = rand(0, count($bg)-1);
                $selectedBg = "$bg[$i]";
        ?>
        <header class="front" style="background: url('<?php echo bloginfo('template_url').'/assets/img/backgrounds/back-'.$selectedBg.'.jpg' ?>') no-repeat bottom; ">
        <?php
            }
            else {
        ?>
        <header class="internal">
        <?php

            }
        ?>
        
            <nav class="navbar navbar-expand-lg" id="nav">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                    <div class="d-flex align-items-center">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/logo-small.png" alt="">
                        <div class="lh-100 text-white brand-title">
                            <span class="brand-title-line text-uppercase"><small>ASSOCIAÇÃO</small></span>
                            <span class="brand-title-line text-uppercase"><strong>DESPORTIVA</strong></span>
                            <span class="brand-title-line text-uppercase"><small>FERROVIÁRIA</small></span>
                        </div>
                    </div>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarCollapse">

                    <div class="ml-auto">

                        <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'primary',
                                'container'       => false,
                                'container_id'    => 'navbarCollapse',
                                'container_class' => 'collapse navbar-collapse',
                                'menu_id'         => false,
                                'menu_class'      => 'navbar-nav ml-auto',
                                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'          => new WP_Bootstrap_Navwalker(),
                            ) );
                        ?>

                    </div>
                </div>

            </nav>

            <?php if (is_front_page()) : ?>

                <section id="match">
                    <div class="container">

                        <div class="row">

                            <div class="col-md-6 match-times d-flex align-items-center pt-3 pb-3">

                                <h6 class="fw700 text-gold text-uppercase">CTE</h6>
                                <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/clubs/cte.png" class="pl-3 pr-3">
                                
                                <h6 class="fw200 text-white text-uppercase">X</h6>

                                <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/clubs/desportiva.png" class="pl-3 pr-3">
                                <h6 class="fw700 text-gold text-uppercase">DES</h6>

                            </div>

                            <div class="col-md-6 match-infos d-flex align-items-center">

                                <div class="d-flex flex-column">

                                    <span class="fw800 text-gold text-uppercase small">
                                        <strong>CAMPEONATO CAPIXABA 2022</strong>
                                    </span>

                                    <span class="text-white text-uppercase small">
                                        <strong>CTE Colatina x DESPORTIVA</strong>
                                    </span>

                                    <span class="text-white small text-uppercase">
                                        25.02.2022 &mdash; SEX &mdash; 18h00
                                    </span>

                                    <span class="text-white small">
                                        Estádio Justiniano Melo e Silva, Colatina/ES
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>
                </section>

            
            <?php else: ?>

                <section id="page-header">

                    <div class="d-flex justify-content-center align-items-center">

                        <h1 class="header-title text-wine text-uppercase fw100">
                            <?php 
                                if( is_home() ) {
                                    echo "Blog";
                                } 
                                elseif( is_single() && 'post' == get_post_type() ) {
                                    echo  "TivaPress";
                                }
                                elseif( is_single() && 'cronicas' == get_post_type() ) {
                                    echo  "TivaPress";
                                }
                                elseif( is_single() && 'elenco' == get_post_type() ) {
                                    echo  "Elenco";
                                }
                                elseif( is_category() ) {
                                    echo get_cat_name(get_query_var('cat'));
                                }
                                elseif( is_404() ) {
                                    echo "Ops!";
                                }
                                else {
                                    the_title();
                                }
                            ?>
                        </h1>

                    </div>

                </section>

            <?php endif; ?>

        </header>

        