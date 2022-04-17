<?php get_header(); ?>


<main>

    <section id="sticky">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="grid-container">
                        
                        <?php
                            $args = array(
                                'post_type'       => 'post',
                                'category_name'   => 'noticias',
                                'posts_per_page'  => '3',
                                // 'post__in' => get_option( 'sticky_posts' ),
                                // 'ignore_sticky_posts' => 1,
                                'orderby'         => 'date',
                                'order'           => 'DESC',
                            );

                            $query = new WP_Query($args); 

                            $i = 1;
                            while ( $query->have_posts() ) : $query->the_post();
                        ?>

                            <div class="<?php echo "high_0".$i; ?>">
                                <div class="card">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="card-overlay"></div>
                                        <?php
                                            if ( has_post_thumbnail() ) { 
                                                the_post_thumbnail('post-home', array('class' => 'card-img-top img-fluid')); 
                                            } else {
                                        ?>
                                            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/post-no-thumbnail.jpg" class="card-img-top img-fluid" alt="">
                                        <?php
                                            }
                                        ?>
                                        <div class="card-date">
                                            <small class="fw700 text-uppercase">
                                                <i class="far fa-clock"></i> <?php echo get_the_date('d M Y'); ?>
                                            </small>
                                        </div>
                                        <div class="card-img-overlay">
                                            <h6 class="card-title fw900 text-uppercase"><?php echo get_the_title(); ?></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php 
                            $i++; endwhile; wp_reset_postdata();
                        ?>
                        
                    </div>

                </div>

            </div>
            
        </div>

    </section>


    <section id="press" class="pd-all">

        <div class="container">

            <div class="row">

                <!-- BLOG -->
                <div class="col-md-6 blog">

                    <h4 class="text-uppercase text-wine fw200 mb-5 w-100">
                        <span>Blog</span>
                    </h4>

                    <?php 
                        $args_voice = array(
                            'post_type'           => 'post',
                            'category_name'       => 'blog',
                            'posts_per_page'      => 1,
                            'orderby'             => 'date',
                            'order'               => 'DESC',
                        );
                        $myvoices = new WP_Query($args_voice);

                    ?>

                    <?php if ( $myvoices->have_posts() ) : ?>

                        <?php while ( $myvoices->have_posts() ) : $myvoices->the_post(); ?>

                            <div class="card">
                                <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">

                                    <?php
                                        if ( has_post_thumbnail() ) { 
                                            the_post_thumbnail('post-home', array('class' => 'card-img-top img-fluid')); 
                                        } else {
                                    ?>
                                        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/post-no-thumbnail.jpg" class="card-img-top img-fluid" alt="">
                                    <?php
                                        }
                                    ?>

                                    <div class="card-img-overlay">

                                        <div class="card-date">
                                            <small class="fw700 text-uppercase">
                                                <i class="far fa-clock"></i> <?php echo get_the_date('d M Y'); ?>
                                            </small>
                                        </div>

                                        <div class="card-info">
                                            <span class="author">
                                                <?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?>
                                            </span>
                                            <h5 class="title fw800 text-white">
                                                "<?php echo get_the_title(); ?>"
                                            </h5>
                                        </div>            
                                        
                                    </div>

                                    <div class="overlay"></div>
                                    
                                </a>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>

                    <?php else : ?>
                        <div class="col-md-8">
                            <p class="text-center p- m-0"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- VOZ DA BANCADA -->
                <div class="col-md-6 voz">

                    <h4 class="text-uppercase text-wine fw200 mb-5 w-100">
                        <span>voz da bancada</span>
                    </h4>

                    <?php 
                            $args_voice = array(
                                'post_type'           => 'post',
                                'category_name'       => 'voz-da-bancada',
                                'posts_per_page'      => 1,
                                'orderby'             => 'date',
                                'order'               => 'DESC',
                            );
                            $myvoices = new WP_Query($args_voice);

                        ?>

                        <?php if ( $myvoices->have_posts() ) : ?>

                            <?php while ( $myvoices->have_posts() ) : $myvoices->the_post(); ?>

                                <div class="card">
                                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                        <?php
                                            if ( has_post_thumbnail() ) { 
                                                the_post_thumbnail('post-home', array('class' => 'card-img-top img-fluid')); 
                                            } else {
                                        ?>
                                            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/post-no-thumbnail.jpg" class="card-img-top img-fluid" alt="">
                                        <?php
                                            }
                                        ?>

                                        <div class="card-img-overlay">

                                            <div class="card-date">
                                                <small class="fw700 text-uppercase">
                                                    <i class="far fa-clock"></i> <?php echo get_the_date('d M Y'); ?>
                                                </small>
                                            </div>

                                            <div class="card-info">
                                                <span class="author">
                                                    <?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?>
                                                </span>
                                                <h5 class="title fw800 text-white">
                                                    "<?php echo get_the_title(); ?>"
                                                </h5>
                                            </div>  
                                            
                                        </div>

                                        <div class="overlay"></div> 
                                    </a>
                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>

                        <?php else : ?>
                            <div class="col-md-8">
                                <p class="text-center p- m-0"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>
                            </div>
                        <?php endif; ?>

                </div>            

            </div>

        </div>

    </section>


    <section id="tivacast">

        <div class="container">

            <div class="row">
                
                <div class="col-md-12">
                    <h4 class="text-uppercase text-white fw200 mb-5 w-100">
                        <span class="fw700">Tiva</span>Cast
                    </h4>
                </div>

                <?php 
                    $args_cast = array(
                        'post_type'           => 'post',
                        'category_name'       => 'tivacast',
                        'posts_per_page'      => 4,
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                    );
                    $mycasts = new WP_Query($args_cast);

                ?>

                <?php if ( $mycasts->have_posts() ) : ?>

                    <?php while ( $mycasts->have_posts() ) : $mycasts->the_post(); ?>

                        <div class="col-md-3 align-self-stretch">

                            <div class="card text-center">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tivacast.png" class="rounded-circle mb-2" alt="">
                                    <h6 class="title fw200"><?php echo get_the_title(); ?></h6>
                                </a>
                            </div>

                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                    <div class="col-md-12">
                        <p class="text-center text-white p- m-0"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </section>


    <section id="highlights" class="pd-all">

        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <h4 class="text-uppercase text-wine fw200 mb-5 w-100">
                        <span>últimas Notícias</span>
                    </h2>
                </div>

                <?php 
                    $args_posts = array(
                        'post_type'           => 'post',
                        'posts_per_page'      => 4,
                        'category_name'       => 'noticias',
                        'offset'              => 3,
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                    );
                    $myposts = new WP_Query($args_posts);
                ?>

                <?php if ( $myposts->have_posts() ) : ?>

                    <?php while ( $myposts->have_posts() ) : $myposts->the_post(); ?>

                        <div class="col-md-3 d-flex align-items-stretch">
                            <div class="card box-shadow">
                                <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                    
                                    <?php
                                        if ( has_post_thumbnail() ) { 
                                            the_post_thumbnail('post-home', array('class' => 'card-img-top img-fluid')); 
                                        } else {
                                    ?>
                                        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/post-no-thumbnail.jpg" class="card-img-top img-fluid" alt="">
                                    <?php
                                        }
                                    ?>

                                    <div class="card-body">
                                        
                                        <div class="card-text">
                                            <h6 class="card-title fw900">
                                                <?php title_limite(90); ?>
                                            </h6>
                                        </div>

                                        <div class="card-date">
                                            <small class="text-uppercase">
                                                <i class="far fa-clock"></i> <?php echo get_the_date('d M Y'); ?>
                                            </small>
                                        </div>

                                    </div>

                                </a>
                            </div>
                        </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                    <div class="col-md-12">
                        <p class="text-center p- m-0"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>
                    </div>
                <?php endif; ?>

            </div>
            
        </div>

    </section>


    <section id="history" class="pd-all">
        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/history-title.png" class="title">

                    <p>Não foi só a fusão de seis clubes que fez surgir a Desportiva Ferroviária. Foi da união de sonhos que nasceu o maior clube de futebol do Espírito Santo em 17 de junho de 1963. Os sonhos se tornaram realidade e já em 1964 se sagrava Campeã Estadual. Surgia aí a grande força do futebol capixaba.</p>

                    <p>Desde sua fundação, foi o clube que mais conquistou títulos estaduais; o que alcançou maior projeção nacional, disputando o maior número de campeonatos brasileiros , sendo disparado o capixaba mais conhecido no país. Foi o que mais revelou craques, alguns deles chegando a Seleção Brasileira e grandes clubes do Brasil e do exterior.</p> 

                    <p>O sucesso da Desportiva fez com que, ao longo desses 57 anos, crescesse uma imensa e apaixonada torcida, hoje a maior do estado e a mais presente nos estádios.</p>
                    
                </div>

            </div>

        </div>
    </section>


    <section id="chronic" class="pd-all">

        <div class="container">

            <div class="row">

                <!-- CRONICAS -->
                <div class="col-md-12">

                    <div class="row">
                        
                        <div class="col-md-12">
                            <h4 class="text-uppercase text-wine fw200 mb-5 w-100">
                                <span>Crônicas</span>
                            </h4>
                        </div>

                        <?php 
                            $args_chronic = array(
                                'post_type'           => 'cronicas',
                                'posts_per_page'      => 3,
                                'orderby'             => 'date',
                                'order'               => 'DESC',
                            );
                            $mychronicles = new WP_Query($args_chronic);

                        ?>

                        <?php if ( $mychronicles->have_posts() ) : ?>

                            <?php while ( $mychronicles->have_posts() ) : $mychronicles->the_post(); ?>

                                <div class="col-md-4 align-self-stretch">

                                    <div class="blockquote-wrapper">
                                        <div class="blockquote d-flex flex-column justify-content-center">
                                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                                <h4 class="title text-left fw800">
                                                    <?php title_limite(50); ?>
                                                </h4>
                                            </a>
                                            <div class="author">
                                                <p class="fw200 small">
                                                    &mdash; <?php echo get_post_meta( $post->ID , 'cronicas_autor', true ); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            <?php endwhile; wp_reset_postdata(); ?>

                        <?php else : ?>
                            <div class="col-md-8">
                                <p class="text-center p- m-0"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>              

            </div>

        </div>

    </section>


    <!-- <section id="links">

        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <h4 class="text-uppercase text-wine fw200 mb-5 w-100">
                        <span>Destaques</span>
                    </h2>
                </div>

                <div class="col-md-3 col-6">
                    <div class="card">
                        <a href="http://www.sociotiva.com.br" target="_blank">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/banner-socio-tiva.jpg" class="img-fluid" alt="">
                        </a>
                    </div> 
                </div>
                
                <div class="col-md-3 col-6">
                    <div class="card">
                        <a href="https://ead.multivix.edu.br/unidade-de-cariacica-desportiva" target="_blank">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/banner-ead.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="card">
                        <a href="https://www.loteriasonline.caixa.gov.br/silce-web/?utm_source=site_loterias&utm_medium=aplicativos#/timemania" target="_blank">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/banner-timemania.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-md-3 col-6"> 
                    <div class="card">
                        <a href="<?php echo esc_url( home_url( '/comercial' ) ); ?>#">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/banner-seja-parceiro.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </section> -->


    <section id="squad">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="d-flex justify-content-between align-items-center">

                        <div><a href="javascript:;" class="slick-left"></a></div>

                        <div><h1 class="title fw800 text-uppercase">elenco</h1></div>

                        <div><a href="javascript:;" class="slick-right"></a></div>

                    </div>

                </div>

            </div>

            <div class="row slider-players">
                
                <?php
                    $args = array(
                        'post_type'       => 'elenco',
                        'posts_per_page'  => -1,
                        'orderby'         => array( 'meta_value_num' => 'ASC' ),
                        'meta_key'        => 'elenco_ordem',
                        'meta_query'=> array(
                            array(
                                'key' => 'elenco_posicao',
                                'value' => array('goleiro', 'zagueiro', 'lateral-direito', 'lateral-esquerdo', 'volante', 'meio-campo', 'atacante'),
                            )
                        ),
                    );
                    $the_query = new WP_Query($args);
                ?>

                <?php if ( $the_query->have_posts() ) : ?>

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="col">
                            <div class="card">
                                <a href="<?php the_permalink(); ?>">
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('thumb-player', array('class' => 'card-img-top'));
                                        }
                                        else { 
                                            echo '<img src="'.get_template_directory_uri().'/assets/img/no-player.png" class="card-img-top">';
                                        } 
                                    ?> 
                                    <div class="card-img-overlay">
                                        <div class="card-body d-flex justify-content-end align-items-center flex-column">
                                            <h5 class="card-name text-uppercase"><?php echo get_the_title(); ?></h5>
                                            <span class="card-position text-uppercase"><?php echo elenco_posicao( $post->ID ); ?></span>                                              
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                    <div class="col-md-12">
                        <p class="text-center pt-5 pb-5"><?php _e( 'Em atualização.' ); ?></p>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </section>


    <section id="stadium" class="pd-all">
        <div class="stadium-over">
            <h5 class="stadium-title">
                Estádio Engenheiro Alencar de Araripe
            </h5>
        </div>   
    </section>


    <section id="debt-meter" class="pd-all">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2 class="text-uppercase text-center text-gold fw800 mb-4">
                        <span>Transparentiva</span>
                    </h2>

                    <div class="row">

                        <div class="col-md-12 text-center text-white">
                            <p>
                                Visando dar mais transparência nas ações do clube e inteirar os nossos sócios e torcedores sobre o nosso dia a dia, a Associação
                                Desportiva Ferroviária criou o Portal Transparentiva, uma plataforma contendo informações financeiras e organizacionais do clube. 
                            </p>
                            <p> 
                                Essa é marca dessa diretoria:
                                <br>
                                <strong>Responsabilidade, Transparência e Credibilidade!</strong>
                            </p>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <p class="text-center p-0 m-0">
                                <a href="http://transparentiva.desportiva.com.br" target="_blank" class="btn btn-white text-uppercase">Portal Transparentiva</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    
    <!-- <section id="map">

        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14964.731589978921!2d-40.3561167!3d-20.3340616!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x53ce7c09b003063a!2sEst%C3%A1dio%20Engenheiro%20Alencar%20Araripe!5e0!3m2!1spt-BR!2sbr!4v1590163771354!5m2!1spt-BR!2sbr" 
            frameborder="0" 
            allowfullscreen="" 
            marginwidth="0" 
            marginheight="0" 
            aria-hidden="true" 
            tabindex="0" 
        >
        </iframe>

    </section> -->

</main>

<?php get_footer(); ?>