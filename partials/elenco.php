<div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 mb-4">

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
            
            <div class="card-body">
                <h6 class="card-name"><?php echo get_the_title(); ?></h6>
            </div>
            
        </a>
    </div>

</div>