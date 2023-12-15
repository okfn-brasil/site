<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main id="page-eixos">
    <!-- Nós somos uma rede -->
    <article class="container-fluid hero pt7 pt10-sm pb5 pb5-sm">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12  col-md-9">
                    <h1 class="t6 w100 ff2  mb4"><?php md_field('titulo'); ?></h1>
                </div>
            </div>
        </div>
    </article>    

    <!-- Eixos de Atuação -->
    <article class="container-fluid bg-branco pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcp mb2 mb4-sm">Eixos de atuação</h2>
                </div>
            </header>
          
            <div class="row start-xs">
            <?php 
                $eixos = new WP_Query(array("post_type"=>"eixo","posts_per_page"=>-1));
                $i = 0;
                if($eixos->have_posts()):
            ?>
            <?php while($eixos->have_posts()): $eixos->the_post(); $i++; ?>
           
                <article class="col-xs-12 col-sm-6 col-md-6 mb2">
                    <div class="col-xs-12 z1 p0">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['banner']) ? $img['sizes']['banner'] : $img['url'] :  tu(0).'/assets/images/ph_banner.png';
                        ?>
                        <figure class="img-degrade img-frame mb2 mb0-md">
                            <img src="<?php echo $img; ?>">
                        </figure>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-5 z2">
                        <h3 class="t5 w100 ff2  nowrap mb1 "><?php md_field('titulo'); ?></h3>
                        <div class="row">
                            <div class="col-xs-12  ">
                                <div class="t3 lh1-50  mb1 ">
                                    <p><?php md_field('descricao'); ?></p>
                                </div>
                                <button class="btn-txt">Saiba mais</button>
                            </div>
                        </div>
                    </a>
                </article>
            <?php endwhile; ?>
            </div>
            <?php endif; wp_reset_postdata(); ?>

        </div>
    </article>

    <?php get_template_part('block-rede'); ?>
    <?php get_template_part('block-apoie'); ?>
</main>
<?php get_footer(); ?>