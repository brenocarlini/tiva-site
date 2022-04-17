<?php get_header(); ?>

    <main>

        <section id="blog" class="pd-all">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">

                        <?php 
                            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                            $posts_per_page = 12;
                            $argsNews = array(
                                'post_type'           => 'post',
                                'ignore_sticky_posts' => 1,
                                'posts_per_page'      => $posts_per_page,
                                'orderby'             => 'date',
                                'order'               => 'DESC',
                                'paged'               => $paged,
                            );
                            $allNews = new WP_Query($argsNews);
                        ?>

                        <?php if ( $allNews->have_posts() ) : ?>

                            <div class="row">

                                <?php while ( $allNews->have_posts() ) : $allNews->the_post(); ?>

                                    <div class="col-md-4">
                                        <div class="card">
                                            <a href="<?php the_permalink(); ?>">
                                                
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
                                                    <small class="fw700"><i class="far fa-clock"></i> <?php the_date('d M Y'); ?></small>
                                                </div>
                                                <div class="card-img-overlay">
                                                    <h6 class="card-title fw700"><?php the_title(); ?></h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center">
                                        <?php echo bootstrap_pagination($allNews); ?>
                                    </div>
                                </div>                              
                                
                            </div>

                        <?php else : ?>

                            <p class="text-center pt-5 pb-5"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>

                    </div>
                </div>

        </section>

    </main>

<?php get_footer(); ?>