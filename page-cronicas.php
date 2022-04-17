<?php get_header(); ?>

    <main>
        
        <section id="blog" class="pd-all">

            <div class="container">

                <div class="row">

                    <div class="col-md-12 -mb">

                        <?php
                            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                            $posts_per_page = 12;

                            $args = array(
                                'post_type'       => 'cronicas',
                                'posts_per_page'      => $posts_per_page,
                                'orderby'             => 'date',
                                'order'               => 'DESC',
                                'paged'               => $paged,
                            );

                            $the_query = new WP_Query($args);
                        ?>

                        <?php if ( $the_query->have_posts() ) : ?>

                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                <div class="card">
                                    
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('thumb-post', array('class' => 'card-thumb'));
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

                                            <p class="card-author">
                                                &mdash; <?php echo get_post_meta( $post->ID , 'cronicas_autor', true ); ?>
                                            </p>

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


            </div>

        </section>

    </main>

<?php get_footer(); ?>