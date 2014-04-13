<?php
/**
 * Template Name: Weekly Contest
 */

get_header();

?>
    <article class="weekly">
        <h3><a href="#">ETH suggests..</a></h3>

        <div class="image-slider">
            <div class="controls">
                <a href="#play">▶</a>
                <a href="#stop">◼</a>
                <a href="#slower">◀◀</a>
                <a href="#faster">▶▶</a>
                <a href="#random" class="big">⚀</a>
                <a href="#zoomIn" class="big">+</a>
                <a href="#zoomOut" class="big">-</a>
            </div>
            <div class="cropped"><img src="<?php echo get_template_directory_uri(); ?>/images/sydney-harbour-panorama1bl.jpg"/></div>
            <div class="thumbnail">
                <div class="thumbnail-inner">
                    <div class="rectangle"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/sydney-harbour-panorama1bl-thumbnail.jpg"/>
                </div>
            </div>
        </div>


        <?php while (have_posts()) : the_post();
            the_content();
            edit_post_link();
            $custom_fields = get_post_custom();

            $cite = $custom_fields['cite'][0];
            if(!isset($cite)) update_post_meta($post->ID, 'cite', '"A life without travel is a life unlived"');

            $author = $custom_fields['author'][0];
            if(!isset($author)) update_post_meta($post->ID, 'author', 'Mr. Anderson');
            ?>

            <blockquote>
                <?php echo $cite ?>

                <div>
                    <?php if (has_post_thumbnail()) {
                        $str = get_the_post_thumbnail(get_the_ID(), 'full');
                        $str = preg_replace('/width=\"\d+\"/', '', $str);
                        $str = preg_replace('/height=\"\d+\"/', '', $str);
                        $str = preg_replace('/attachment-full /', '', $str);
                        echo $str;
                    } ?>

                    <div><?php echo $author ?></div>
                </div>
            </blockquote>
        <?php endwhile; ?>


    </article>

<?php

get_sidebar();
get_footer();
