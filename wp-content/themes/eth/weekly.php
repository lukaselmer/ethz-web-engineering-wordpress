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


        <h3>This week's winner is... Sydney, Australia</h3>

        <p>
            Sydney is the state capital of New South Wales and the most populous city in Australia. It is on
            Australia's south-east coast, on the Tasman Sea. In June 2010 the greater metropolitan area had an
            approximate population of 4.6 million people. Inhabitants of Sydney are called Sydneysiders, comprising
            a cosmopolitan and international population.
        </p>

        <blockquote>
            "A life without travel is a life unlived"

            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/reviewers/1.png" alt=""/>

                <div>Mr. Anderson</div>
            </div>
        </blockquote>
    </article>

<?php

get_sidebar();
get_footer();
