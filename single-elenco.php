<?php get_header(); ?>

    <main>

        <section id="player">
        <?php global $post; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="player-big">
                <div class="container">
                    
                    <div class="row d-flex justify-content-center align-items-center">

                        <div class="col-md-6 col-lg-6 photo">

                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('thumb-player', array( 'class' => '' ));
                                }
                                else { 
                                    echo '<img src="'.get_template_directory_uri().'/assets/img/no-player.png" class="">';
                                } 
                            ?>

                        </div>

                        <div class="col-md-6 col-lg-6 info">

                            <h2 class="fw800 text-wine"><?php the_title(); ?></h2>

                            <h5 class="fw400 text-gold text-uppercase"><?php echo elenco_posicao( $post->ID );  ?></h5>

                            <h6 class="fw200"><?php echo calcularIdade( $post->ID );  ?> anos</h6>

                        </div>

                    </div>
                    
                </div>
            </div>

            <div class="player-info">

                <div class="container container-small">

                    <div class="row">

                        <div class="col-md-12">

                            <p>
                                <strong>Nome:</strong>
                                <br>
                                <?php echo get_post_meta( $post->ID , 'elenco_nome', true );?>
                            </p>

                            <p>
                                <strong>Nascimento:</strong>
                                <br>
                                <?php echo dataNascimento( $post->ID );  ?> (<?php echo calcularIdade( $post->ID );  ?> anos)
                            </p>


                            <p>
                                <strong>Altura:</strong>
                                <br>
                                <?php echo get_post_meta( $post->ID , 'elenco_altura', true );?> m
                            </p>


                            <p>
                                <strong>Peso:</strong>
                                <br>
                                <?php echo get_post_meta( $post->ID , 'elenco_peso', true );?> kg
                            </p>


                            <p>
                                <strong>Natural de:</strong>
                                <br>
                                <?php echo localNascimento( $post->ID );  ?>
                            </p>

                            <p>
                                <strong>Carreira:</strong>
                                <br>
                                <?php echo get_the_excerpt();  ?>
                            </p>

                        </div>

                    </div> 
                    
                </div>

            </div>

        <?php endwhile; else : ?>

        <p>Sorry, no post was found!</p>

        <?php endif; ?>
        </section>
    
    </main>

<?php get_footer(); ?>