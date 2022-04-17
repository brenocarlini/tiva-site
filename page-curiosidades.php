<?php get_header(); ?>

    <main>
        
        <section id="curiosities" class="pd-all">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 col-md-12">

                        <div class="masonry">

                            <?php
                                $args = array(
                                    'post_type'       => 'curiosidades',
                                    'posts_per_page'  => -1,
                                    'orderby'         => 'date',
                                    'order'           => 'ASC',
                                );
                                $the_query = new WP_Query($args);
                            ?>

                            <?php if ( $the_query->have_posts() ) : ?>

                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                                <div class="card box-shadow">
                                    <div class="card-body">
                                        <h5 class="card-title text-center fw800">
                                            <?php echo get_the_title(); ?>
                                        </h5>
                                        <p class="card-text">
                                            <?php echo get_the_excerpt(); ?>
                                        </p>
                                    </div>
                                </div>

                                <?php endwhile; ?>

                                <?php wp_reset_postdata(); ?>

                            <?php else : ?>

                                <div class="col-md-12">
                                    <p class="text-center pt-5 pb-5"><?php _e( 'Em atualização!' ); ?></p>
                                </div>

                            <?php endif; ?>


                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

<?php get_footer(); ?>