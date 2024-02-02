<div class="mb-4">
    <!--<a href="https://vimeo.com/342333493" data-fancybox class="video-wrap">
    <span class="play-wrap"><span class="icon-play"></span></span></a>-->
    <img src="<?php bloginfo('template_url'); ?>/images/textualesnewlogo.png" alt="Image" class="img-fluid rounded">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="advertising-medium-rectangle">
            <a href="https://parlamentoydebate.com"><img src="<?php bloginfo('template_url'); ?>/images/LogoParla300x250.png" alt="Image" class="img-fluid rounded"><!--Textual-es<span class="text-primary">.--></span> </a>
        </div>
    </div>
</div>
<div class="floating-block sticky-top">
    <h2 class="section-title">Mas populares</h2>
    <ul>
        <?php
            $args = array(
                'posts_per_page' => 3,
                'meta_key' => 'post_views',
                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            );
            
            $popular_posts = new WP_Query( $args );
            while ( $popular_posts->have_posts() ) : $popular_posts->the_post();?>
            <li>
                <a href="<?php the_permalink();?>">
                <img src="<?php
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail_url('full');
                }
                ?>" alt="Image placeholder" class="me-4 rounded">
                <div class="text">
                    <h6><?php the_title();?></h6>
                    <div class="post-meta">
                    <span class="mr-2"><?php echo get_the_date(); ?></span>
                    </div>
                </div>
                </a>
            </li>
        <?php
            endwhile;
        ?>
    </ul>
    <!--<p>Far far away behind the word mountains far from.</p>
    <form action="#">
    <input type="email" class="form-control mb-2" placeholder="Enter email">
    <input type="submit" value="Subscribe" class="btn btn-primary btn-block">
    </form>-->
    <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="advertising-half-page">
                <h1>300 x 600</h1>
            </div>
        </div>
    </div> -->
</div>