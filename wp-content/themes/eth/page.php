<?php get_header(); ?>

<?php
$r = mt_rand(0, 2);
if ($r == 0)
    include("reviews.php");
elseif ($r == 1)
    include("weekly.php");
else
    include("reviewers.php");
?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
