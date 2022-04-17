<?php get_header(); ?>

    <main>
        
        <section id="stars" class="pd-all">

            <div class="container">

                <div class="row">

                    <div class="col-sm-12 col-md-12">

                        <div class="masonry">

                            <?php
                                $args = array(
                                    'post_type'       => 'craques',
                                    'posts_per_page'  => -1,
                                    'orderby'         => 'title',
                                    'order'           => 'ASC',
                                );
                                $the_query = new WP_Query($args);
                            ?>

                            <?php if ( $the_query->have_posts() ) : ?>

                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                                    <div class="card">
                                        <?php 
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('thumb-star', array('class' => 'card-img-top'));
                                            }
                                            else { 
                                                echo '<img src="'.get_template_directory_uri().'/assets/img/no-player.png" class="card-img-top">';
                                            } 
                                        ?>
                                        <div class="card-body">
                                            <h5 class="fw800"><?php echo get_the_title(); ?></h5>
                                            <p class="card-name"><strong><?php echo get_post_meta( $post->ID , 'craques_nome', true );?></strong></p>
                                            <p class="card-text">
                                                <?php echo get_post_meta( $post->ID , 'craques_descricao', true );?>
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