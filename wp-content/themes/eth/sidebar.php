</div>
</section>


<?php if (mt_rand(0, 1) == 0) { ?>

    <aside class="col-md-content-right">
        <div class="right-content">
            <section class="content-box reviewers-right-box">
                <div>
                    <h3>Meet our reviewers!</h3>
                </div>
                <div class="reviewers-right">
                    <div class="reviewer-right">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/reviewers/1.png" alt=""/></div>

                        <div>
                            <div class="name">Mr Anderson</div>
                            <div class="title">CEO, Main Reviewer</div>
                        </div>
                    </div>
                    <div class="reviewer-right">
                        <div><img src="<?php echo get_template_directory_uri(); ?>/images/reviewers/2.png" alt=""/></div>

                        <div>
                            <div class="name">Ms Trinity</div>
                            <div class="title">Assistant, Reviewer, Board Member</div>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="more" href="reviewers.html">Meet them all!</a>
                </div>

            </section>
            <section class="contest-box content-box">
                <div>
                    <h3>Weekly Location Contest</h3>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/sydney-harbour-panorama1bl-thumbnail.jpg" alt=""/>

                <div>
                    This week's location is:<br>
                    <span>Sydney, Australia</span>
                </div>
                <div>
                    <a class="more" href="weekly.html">Have a look!</a>
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
                    <div class="review-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/reviews/1.png" alt=""/><br>
                        <span>Mec Paestum Hotel</span>
                    </div>
                    <div class="review-right">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/reviews/2.png" alt=""/><br>
                        <span>Bellevue Palace Bern</span>
                    </div>
                </div>
            </section>

            <section class="content-box contest-box">
                <div>
                    <h3>Weekly Location Contest</h3>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/sydney-harbour-panorama1bl-thumbnail.jpg" alt=""/>

                <div>
                    This week's location is:<br>
                    <span>Sydney, Australia</span>
                </div>
                <div>
                    <a href="weekly.html">Have a look!</a>
                </div>
            </section>
            <section class="social-box">
                <a href="http://facebook.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/social_media/facebook-icon.png"/></a>
                <a href="http://twitter.com/"><img src="<?php echo get_template_directory_uri(); ?>/images/social_media/twitter-icon.png"/></a>
            </section>
        </div>
    </aside>
<?php } ?>
