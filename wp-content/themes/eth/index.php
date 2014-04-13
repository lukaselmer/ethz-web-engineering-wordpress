<?php get_header();

while (have_posts()) : the_post(); ?>
    <article class="hotel-item">
        <div>
            <h3><?php the_title() ?></h3>
            <?php if (has_post_thumbnail()) {
                $str = get_the_post_thumbnail(get_the_ID(), 'full');
                $str = preg_replace('/width=\"\d+\"/', '', $str);
                $str = preg_replace('/height=\"\d+\"/', '', $str);
                $str = preg_replace('/attachment-full /', '', $str);
                echo $str;
            } ?>

            <p><?php the_content() ?></p>

            <div><a class="more" href="<?php the_permalink() ?>">Read more...</a></div>

        </div>
        <div class="author">
            <a href="#"><?php the_date() ?> by <?php the_author() ?></a>
            <!--<span>TODO views</span>-->
            <?php edit_post_link(); ?>
        </div>
    </article>
<?php endwhile;

get_sidebar();
get_footer();
