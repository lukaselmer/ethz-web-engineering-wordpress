<?php
/**
 * Template Name: Weekly Contest
 */


get_header();
$loop = new WP_Query(array('post_type' => 'panorama'));
?>
<?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <article class="weekly">

        <h3><a href="#">ETH suggests..</a></h3>
        <?php echo get_post_gallery($post, false)['ids'];  ?>
        <?php
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);        

            $image_url = $thumb_url[0];
            if (!isset($image_url)) $image_url = get_template_directory_uri() . '/images/sydney-harbour-panorama1bl.jpg';
        //$ids = get_post_gallery($post, false)['ids'];
        //$arr = explode(',', $ids);
        //$imageId = $arr[array_rand($arr)];
        //$image_url = wp_get_attachment_url($imageId);
        //if (!isset($image_url)) $image_url = get_template_directory_uri() . '/images/sydney-harbour-panorama1bl.jpg';
        ?>

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
            <div class="cropped"><img src="<?php echo $image_url ?>"/></div>
            <div class="thumbnail">
                <div class="thumbnail-inner">
                    <div class="rectangle"></div>
                    <img src="<?php echo $image_url ?>"/>
                </div>
            </div>
        </div>

        <?php
        function disable_auto_gallery($content, $atts) { return '&nbsp;'; }

        add_filter('post_gallery', 'disable_auto_gallery', 10, 2);

        $custom_fields = get_post_custom();
        $reviewer_id = intval($custom_fields['reviewer'][0]);
        $description = $custom_fields['description'][0];
        $cite = $custom_fields['cite'][0];
       // if (!isset($cite)) update_post_meta($reviewer_id, 'cite', '"A life without travel is a life unlived"');

        $author = get_the_title($reviewer_id);// $custom_fields['author'][0];
        //if (!isset($author)) update_post_meta($post->ID, 'author', 'Mr. Anderson');

        ?>
        <h3>This week's winner is... <?php echo the_title() ?></h3>
        <p><?php echo $description ?></p>
        <blockquote>
            "<?php echo $cite ?>"

            <div>
                <?php if (has_post_thumbnail($reviewer_id)) {
                    $str = get_the_post_thumbnail($reviewer_id, 'full');
                    $str = preg_replace('/width=\"\d+\"/', '', $str);
                    $str = preg_replace('/height=\"\d+\"/', '', $str);
                    $str = preg_replace('/attachment-full /', '', $str);
                    echo $str;
                } ?>

                <div><?php echo $author ?></div>
            </div>
        </blockquote>

    </article>
<?php 
break; 
endwhile;

get_sidebar();
get_footer();
