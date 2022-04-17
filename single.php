<?php get_header(); ?>

    <main>

        <section id="single" class="pd-all">

            <div class="container container-small">
                <div class="row">

                    <div class="col-md-12">

                        <article>

                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="fw700">
                                            <?php the_title(); ?>
                                        </h2>
                                    </div>
                                </div>

                                <div class="row mt-4 mb-4">

                                    <div class="col-md-6">
                                        <div class="info-box">
                                            <span class="date text-uppercase">
                                                Em <strong><?php the_time( 'l, j F' ); ?> de <?php the_time( 'Y' ); ?></strong>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex align-items-center">
                                        <script>
                                            function abrirPop(URL) {
                                                window.open(URL, 'janela', 'width=795, height=590, top=100, left=699, scrollbars=no, status=no, toolbar=no, location=no, menubar=no, resizable=no, fullscreen=no')
                                            }
                                        </script>
                                        <div class="icons-box">
                                            <a href="javascript:abrirPop('https://www.facebook.com/dialog/share?href=<?php the_permalink(); ?>&app_id=844815932679017');" class="mr-4"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/icon-facebook.png" class="icons"></a>
                                            <a href="javascript:abrirPop('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>');" class="mr-4"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/icon-twitter.png" class="icons"></a>
                                            <a href="javascript:abrirPop('https://api.whatsapp.com/send?text=<?php the_title(); ?> - <?php the_permalink(); ?>');" class="mr-0"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/icon-whatsapp.png" class="icons"></a>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="single-container">

                                    <?php
                                        if( is_single() && 'cronicas' == get_post_type() ) :
                                    ?>
                                        <div class="card box-shadow mb-5 mt-2">
                                            <div class="card-body">
                                                <blockquote class="blockquote mt-0 mb-0">
                                                    <?php echo get_post_meta( $post->ID , 'cronicas_autor', true );?>
                                                    <div class="blockquote-footer">
                                                        <?php echo get_post_meta( $post->ID , 'cronicas_descricao', true );?>
                                                    </div>
                                                </blockquote>
                                            </div>
                                        </div>
                                    <?php endif;?>

                                    <?php
                                        if ( has_post_thumbnail() ) { 
                                            echo "<figure>";
                                            the_post_thumbnail('large', array( 'class' => 'img-fluid' ));
                                            echo "</figure>";
                                        }
                                    ?>

                                    <p><?php the_content(); ?></p>

                                    <?php if ( has_category( array( 'blog', 'voz-da-bancada' ) ) ) : ?>
                                        <div class="card box-shadow mt-5 mb-5">
                                            <div class="card-body avatar">
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-md-2">
                                                        <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <strong>
                                                            <?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?>
                                                        </strong>
                                                        <p>
                                                            <?php echo get_the_author_meta('description'); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;?>
                                    
                                </div>

                            <?php endwhile; else : ?>

                                <p>Sorry, no post was found!</p>
                            
                            <?php endif; ?>

                        </article>

                    </div>

                </div>
            </div>

        </section>
    
    </main>

<?php get_footer(); ?>