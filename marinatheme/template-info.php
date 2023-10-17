<?php
/**
 * Template Name: Info
 */
?>

<?php get_header(); ?>
<div id="preloader"></div>
<div class="main page">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<div class="post-content">
<?php the_content(); ?>
<div class="box">
    <div class="card">
        <div class="percent html" style="--clr:#04fc43;">
            <div class="dot html"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
                <h2>85%</h2>
                <p>HTML</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="percent css" style="--clr:#04fc43;">
            <div class="dot css"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
                <h2>85%</h2>
                <p>CSS</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="percent php" style="--clr:#04fc43;">
            <div class="dot php"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
                <h2>55%</h2>
                <p>PHP</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="percent js" style="--clr:#04fc43;">
            <div class="dot js"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
                <h2>35%</h2>
                <p>JAVASCRIPT</p>
            </div>
        </div>
    </div>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>