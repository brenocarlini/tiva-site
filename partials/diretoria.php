<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mb-4">

    <div class="card">
        <a>
            <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('thumb-player', array('class' => 'card-img-top'));
                }
                else { 
                    echo '<img src="'.get_template_directory_uri().'/assets/img/no-professional.png" class="card-img-top">';
                } 
            ?>
            <div class="card-img-overlay">
                <div class="card-body d-flex justify-content-end align-items-center flex-column">
                        <h5 class="card-name"><?php echo get_the_title(); ?></h5>
                        <span class="card-position"><?php echo diretoria_funcao( $post->ID )  ?></span>
                </div>
            </div>
        </a>
    </div>

</div>