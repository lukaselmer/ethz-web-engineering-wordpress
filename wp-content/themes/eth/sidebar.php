</div>
</section>

<?php

  $custom_fields = get_post_custom();
  $sidebar_flag_field = $custom_fields['sidebar'];
?>
<?php if (($sidebar_flag_field['0'] == 'reviewers' or mt_rand(0, 1) == 0) and $sidebar_flag_field['0'] <> 'reviews') { ?>

    <aside class="col-md-content-right">
        <div class="right-content">
            <section class="content-box reviewers-right-box">
                <div>
                    <h3>Meet our reviewers!</h3>
                </div>
                <div class="reviewers-right">

                    <?php
                    $loop = new WP_Query(array('post_type' => 'reviewer', 'orderby' => 'meta_value', 'meta_key' => 'relevance', 'posts_per_page' => 2));
                    while ($loop->have_posts()) : $loop->the_post();
                        $custom_fields = get_post_custom();
                        ?>

                        <div class="reviewer-right">
                            <div>
                                <?php if (has_post_thumbnail()) {
                                    $str = get_the_post_thumbnail(get_the_ID(), 'full');
                                    $str = preg_replace('/width=\"\d+\"/', '', $str);
                                    $str = preg_replace('/height=\"\d+\"/', '', $str);
                                    $str = preg_replace('/attachment-full /', '', $str);
                                    echo $str;
                                } ?>
                            </div>

                            <div>
                                <div class="name"><?php the_title() ?></div>
                                <div class="title"><?php
                                    $t = $custom_fields['title'][0];
                                    $r = $custom_fields['role'][0];
                                    echo $t . ($t ? ', ' : '') . $r;
                                    ?></div>
                                <?php edit_post_link(); ?>
                            </div>
                        </div>
                    <?php
                    endwhile; ?>

                </div>
                <div>
                    <a class="more" href="/reviewers">Meet them all!</a>
                </div>

            </section>
            <section class="contest-box content-box">
                <div>
                    <h3>Weekly Location Contest</h3>
                </div>
                <?php $weekloop = new WP_Query(array('post_type' => 'panorama')); 
                        while ($weekloop->have_posts()) : $weekloop->the_post(); 

                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id,array(254,54), true);        

                    $image_url = $thumb_url[0];
                    if (!isset($image_url)) $image_url = get_template_directory_uri() . '/images/sydney-harbour-panorama1bl-thumbnail.jpg.jpg';
                ?>
                <img src="<?php echo $image_url; ?>" alt=""/>

                <div>
                    This week's location is:<br>
                    <span><?php echo get_the_title(); ?></span>
                </div>
                <?php break; endwhile ?>
                <div>
                    <a class="more" href="/weekly">Have a look!</a>
                </div>
            </section>
            <section class="social-box">
                <a href="http://facebook.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/social_media/facebook-icon.png"/></a>
                <a href="http://twitter.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/social_media/twitter-icon.png"/></a>
            </section>
        </div>
    </aside>

<?php } else { ?>
    <aside class="col-md-content-right">
        <div class="right-content">
            <section class="content-box reviews-right-box">
                <h3>Our last reviews!</h3>

                <div class="reviews-right">

                    <?php
                    $loop = new WP_Query(array('posts_per_page' => 3));
                    while ($loop->have_posts()) : $loop->the_post();
                        $custom_fields = get_post_custom();
                        ?>

                        <div class="review-right">
                            <?php edit_post_link(); ?>
                            <?php if (has_post_thumbnail()) {
                                $str = get_the_post_thumbnail(get_the_ID(), 'full');
                                $str = preg_replace('/width=\"\d+\"/', '', $str);
                                $str = preg_replace('/height=\"\d+\"/', '', $str);
                                $str = preg_replace('/attachment-full /', '', $str);
                                echo $str;
                            } ?>

                            <?php
                            $title = get_the_title();
                            $title = explode('*', $title)[0];
                            $title = str_replace("Hotel ", "", $title);
                            ?>
                            <span><?php echo $title ?></span>
                        </div>

                    <?php
                    endwhile; ?>
                </div>
            </section>

            <section class="content-box contest-box">
                <div>
                    <h3>Weekly Location Contest</h3>
                </div>
                <?php $weekloop = new WP_Query(array('post_type' => 'panorama')); 
                        while ($weekloop->have_posts()) : $weekloop->the_post(); 

                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id,array(254,54), true);        

                    $image_url = $thumb_url[0];
                    if (!isset($image_url)) $image_url = get_template_directory_uri() . '/images/sydney-harbour-panorama1bl-thumbnail.jpg.jpg';
                ?>
                <img src="<?php echo $image_url; ?>" alt=""/>

                <div>
                    This week's location is:<br>
                    <span><?php echo get_the_title(); ?></span>
                </div>
                <?php break; endwhile ?>
                <div>
                    <a href="/weekly">Have a look!</a>
                </div>
            </section>
            <section class="social-box">
                <a href="http://facebook.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/social_media/facebook-icon.png"/></a>
                <a href="http://twitter.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/social_media/twitter-icon.png"/></a>
            </section>
        </div>
    </aside>
<?php } ?>
