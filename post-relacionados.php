<?php
    $cad			= "";
    $template_li 	= '<div class="col-md-3 col-lg-3">
                            <div class="post-entry">
                            <div class="media">
                            <a href="{url}"><img src="{thumb}" alt="Image" class="img-fluid"></a>
                            </div>
                            <div class="text">
                            <h2><a href="{url}">{title}</a></h2>
                            <div class="meta">
                                <span>{date}</span>
                            </div>
                            <p>{excerpt}</p>
                            </div>
                        </div>
                    </div>';
    $template_rel	= '<div class="col-lg-12">
    <div class="row">
        <div class="col-12">
            <h2 class="section-title">Tambien te podria interesar...</h2>
        </div>
        {list}
    </div>
</div>';

    $terms = get_the_terms( get_the_ID(), 'category');
    $categ = array();
    // print_r($terms);
    if ( $terms ){
        foreach ($terms as $term) {
            $categ[] = $term->term_id;
        }
    }
    else{
        return $content;
    }

    // print_r($categ);

    $loop	= new WP_QUERY(array(
            'category__in'	=> $categ,
            'posts_per_page'	=> 4,
            'post__not_in'	=>array(get_the_ID()),
            'orderby'			=>'rand'
            ));

    // print_r($loop);

    if ( $loop->have_posts() ){
        while ( $loop->have_posts() ){
            $loop->the_post();

            $search	 = Array('{url}','{thumb}','{title}','{date}','{excerpt}');
            $replace = Array(get_permalink(),get_the_post_thumbnail_url(),get_the_title(),get_the_date(),get_the_excerpt());
        
            $cad .= str_replace($search,$replace, $template_li);
        }

        if ( $cad ){
            $content .= str_replace('{list}', $cad, $template_rel);
        }
    }
    echo $content;
?>