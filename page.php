<?php get_header(); ?>

    <main>
        
        <section id="page" class="pd-all">
            <div class="container container-small">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php the_content(); ?>

                <?php endwhile; else : ?>

                    <p>Em atualização!</p>
                    
                <?php endif; ?>

            </div>
        </section>

    </main>

<?php get_footer(); ?>