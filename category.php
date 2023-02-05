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
                                'cat'                 => get_query_var('cat'),
                                'posts_per_page'      => $posts_per_page,
                                'orderby'             => 'date',
                                'order'               => 'DESC',
                                'paged'               => $paged,
                            );

                            $allNews = new WP_Query($argsNews);
                        ?>

                        <?php if ( $allNews->have_posts() ) : ?>

                            <?php while ( $allNews->have_posts() ) : $allNews->the_post(); ?>

                                <div class="card"> 

                                        <?php
                                            if ( has_post_thumbnail() ) { 
                                                the_post_thumbnail('thumb-post', array('class' => 'card-thumb')); 
                                            } elseif (in_category( 'tivacast' )) {
                                        ?>
                                            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tivacast.png" class="card-thumb" alt="">
                                        <?php
                                            } else {
                                        ?>
                                            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/post-no-thumbnail.jpg" class="card-thumb" alt="">
                                        <?php
                                            }
                                        ?>

                                        <div class="card-body d-flex align-items-center">

                                            <a href="<?php echo the_permalink(); ?>">

                                                <p class="card-date">
                                                    <?php echo get_the_date('d/m/Y'); ?>
                                                </p>

                                                <h5 class="fw800">
                                                    <?php echo get_the_title(); ?>
                                                </h5>
                                                
                                                <?php
                                                    if (in_category( array( 'blog', 'voz-da-bancada') )) {
                                                ?>
                                                    <p class="card-author">
                                                        &mdash; <?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?>
                                                    </p>
                                                <?php
                                                    }
                                                ?>
                                                
                                            </a>

                                        </div>

                                </div>

                            <?php endwhile; ?>

                            <div class="col-md-12 paginacao">
                                <div class="d-flex justify-content-center">
                                    <?php echo bootstrap_pagination($allNews); ?>
                                </div>
                            </div>                              

                        <?php else : ?>

                            <div class="col-md-12">
                                <p class="text-center pt-5 pb-5"><?php _e( 'Desculpe, não há nenhum conteúdo disponível no momento.' ); ?></p>
                            </div>

                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>

                    </div>
                    
                </div>

        </section>

    </main>

<?php get_footer(); ?>