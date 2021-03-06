<?php
/**
 * Template Name: List the reviewers
 */

get_header();

?>

<article class="reviewers">
    <h2><a href="#">Evaluate Thy Hotel</a></h2>

    <div class="reviewer-profiles">

        <?php
        $loop = new WP_Query(array('post_type' => 'reviewer', 'orderby' => 'meta_value', 'meta_key' => 'relevance'));
        while ($loop->have_posts()) : $loop->the_post();
            $custom_fields = get_post_custom();
            ?>
            <div class="reviewer-profile">
                <?php if (has_post_thumbnail()) {
                    $str = get_the_post_thumbnail(get_the_ID(), 'full');
                    $str = preg_replace('/width=\"\d+\"/', '', $str);
                    $str = preg_replace('/height=\"\d+\"/', '', $str);
                    $str = preg_replace('/attachment-full /', '', $str);
                    echo $str;
                } ?>

                <div class="attributes">
                    <div class="name"><?php the_title() ?></div>
                    <div class="title"><?php echo $custom_fields['title'][0] ?></div>
                    <div class="role"><?php echo $custom_fields['role'][0] ?></div>
                    <div class="cite"><?php echo $custom_fields['cite'][0] ?></div>
                    <?php edit_post_link(); ?>
                </div>
            </div>
        <?php
        endwhile; ?>

    </div>

</article>

<article class="weekly">
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content() ?>
    <?php endwhile; ?>
</article>

<?php

get_sidebar();
get_footer();
