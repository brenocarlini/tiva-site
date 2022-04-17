<?php
// METABOX POSTS


function posts_metabox()
{
    $screens = ['post', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box('autor_box_id','Crônicas', 'posts_metabox_html', $screen);
    }
}
add_action('add_meta_boxes', 'posts_metabox', 'side');


function posts_metabox_html($post)
{
    $valueAutor = get_post_meta($post->ID, 'autor', true);
    $valueDescricao = get_post_meta($post->ID, 'descricao', true);
?>
<style>
    .postbox-container {
        margin-bottom:25px;
    }
    .postbox {
        border:1px solid #ccc !important;
    }
</style>
<fieldset style="margin:40px 0px;">
    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" value="<?php echo $valueAutor; ?>" class="postbox">
    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" id="descricao" value="<?php echo $valueDescricao; ?>" class="postbox">
</fieldset>
<?php
}

function posts_metabox_save_postdata($post_id)
{
    if (array_key_exists('autor', $_POST)) {
        update_post_meta($post_id, 'autor', $_POST['autor']);
    }
    if (array_key_exists('descricao', $_POST)) {
        update_post_meta($post_id, 'descricao', $_POST['descricao']);
    }
}
add_action('save_post', 'posts_metabox_save_postdata');