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
		
		<!-- Meta Pixel Code -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			 if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			 n.queue=[];t=b.createElement(e);t.async=!0;
			 t.src=v;s=b.getElementsByTagName(e)[0];
			 s.parentNode.insertBefore(t,s)}(window, document,'script',
											 'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '638814091369546');
			fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
					   src="https://www.facebook.com/tr?id=638814091369546&ev=PageView&noscript=1"
					   /></noscript>
		<!-- End Meta Pixel Code -->
        
        <?php wp_head(); ?>

		<meta name="facebook-domain-verification" content="tto0xcet3s8qcwhom3b8murvtp1bw6" />

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

        <a href="https://tiva63.com.br" target="_blank" id="sociotiva" class="btn btn-gold btn-lg">
            <i class="fas fa-shopping-cart"></i> Nossa Loja
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

                <div class="container-fluid">

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

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'primary',
                                'container'       => false,
                                'container_id'    => 'navbarSupportedContent',
                                'container_class' => 'collapse navbar-collapse',
                                'menu_id'         => false,
                                'menu_class'      => 'navbar-nav ms-auto',
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

                                <h6 class="fw700 text-gold text-uppercase">DES</h6>
                                <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/clubs/desportiva.png" class="ps-3 pe-3">
                                
                                <h6 class="fw200 text-white text-uppercase">X</h6>

                                <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/clubs/cai.png" class="ps-3 pe-3">
                                <h6 class="fw700 text-gold text-uppercase">CAI</h6>

                            </div>

                            <div class="col-md-6 match-infos d-flex align-items-center">

                                <div class="d-flex flex-column">

                                    <span class="fw800 text-gold text-uppercase small">
                                        <strong>Capixabão 2023</strong>
                                    </span>

                                    <span class="text-white text-uppercase small">
                                        <strong>DESPORTIVA x Atl. Itapemirim</strong>
                                    </span>

                                    <span class="text-white small text-uppercase">
                                        29.01.2023 &mdash; dom &mdash; 10h
                                    </span>

                                    <span class="text-white small">
										Engenheiro Araripe, Cariacica/ES
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

        