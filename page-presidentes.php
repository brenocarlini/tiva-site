<?php get_header(); ?>

    <main>
        
        <section id="idols" class="pd-all">

            <div class="container">


                <div class="row">

                    <?php
                        $args = array(
                            'post_type'       => 'presidentes',
                            'posts_per_page'  => -1,
                            'orderby'         => array( 'meta_value_num' => 'DESC' ),
                            'meta_key'        => 'presidentes_periodo_fim',
                        );
                        $the_query = new WP_Query($args);
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>

                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                            <div class="col-md-3">   

                                <div class="card">
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail('thumb-star', array('class' => 'card-img-top'));
                                        }
                                        else { 
                                            echo '<img src="'.get_template_directory_uri().'/assets/img/no-chairman.png" class="card-img-top">';
                                        } 
                                    ?>
                                    <div class="card-img-overlay">
                                        <p class="card-name m-0 text-center">
                                            <strong>
                                                <?php echo get_post_meta( $post->ID , 'presidentes_periodo_inicio', true );?>
                                                -
                                                <?php echo get_post_meta( $post->ID , 'presidentes_periodo_fim', true );?>
                                            </strong>
                                        </p>
                                        <h5 class="card-title text-center"><?php echo get_the_title(); ?></h5>
                                    </div>
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

        </section>

    </main>

<?php get_footer(); ?>