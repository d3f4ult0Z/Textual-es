<div class="row gutter-v1 align-items-stretch mb-5">
    <div class="col-12">
        <h2 class="section-title">Opinión</h2>
    </div>
    <div class="col-md-9 pr-md-5">
        <div class="row">
            <?php query_posts('category_name=opinion')?>
            <?php $i = 0; if ( have_posts() ) : while ( have_posts() && $i < 7) : the_post(); ?>
            <!--Codigo que se ejecutara cuando encuentre algun post-->
            <div class="col-12">
                <div class="post-entry horizontal d-md-flex">
                    <div class="media">
                    <a href="<?php the_permalink();?>"><img src="<?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail_url('full');
                        }
                    ?>" alt="Image" class="img-fluid"></a>
                    </div>
                    <div class="text">
                    <!--<div class="meta-cat"><a href="#">Business</a></div>-->
                    <h2><a href="<?php the_permalink();?>"><?php the_title() ?></a></h2>
                    <div class="meta mb-0">
                        <span><?php echo get_the_date(); ?></span>
                        <span>&bullet;</span>
                        <span><?php 
                            $cats = get_the_category();
                            $firstCat = $cats[0];
                            echo '<a href="'.esc_url(get_category_link($firstCat->cat_ID)).'">'.$firstCat->name.'</a>';
                        ?></span>
                    </div>
                    <p><?php $extracto = get_the_content();
                        $extracto = strip_tags($extracto);
                        echo substr($extracto, 0, 200).'...'; ?>
                    </p>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; else: ?>
            <!--Codigo que se ejecutara si no encuentra post-->
            <h1>Error 404 no se encontraron portadas.</h1>
            <?php endif; ?>
            <?php wp_reset_query();?>
            <!--Termina Segunda sección-->
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="advertising-leader-board">
                <a href="https://parlamentoydebate.com"><img src="<?php bloginfo('template_url'); ?>/images/Logo_Parla728x90.png" alt="Image" class="img-fluid rounded"></span> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <?php require 'newsletter.php'; ?>
    </div>
</div>