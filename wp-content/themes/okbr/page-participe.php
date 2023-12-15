<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <article class="container-fluid hero pt7 pt10-sm pb5">
            <div class="wrap">
                <div class="row center-xs">
                    <div class="col-xs-12 col-md-7 tl">
                        <h1 class="t6 w100 ff2  mb2"><?php md_field('titulo'); ?></h1>
                        <div class="conteudo  mb5">
                            <?php echo md_text(get_field('descricao',get_the_ID(),false)); ?>
                        </div>
                        <p class="t1 ff2 w400 tcv uc ls1 mb2">Acompanhe nossas redes</p>
                    
                        <?php if( have_rows('redes_sociais','option') ): ?>
                                    <ul class="lista-horizontal m0 mb3">
                                        <?php while ( have_rows('redes_sociais','option')) : the_row(); ?>
                                            <?php 
                                            $link = get_sub_field('link');
                                            $img = get_sub_field('icon');
                                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';

                                            if( $link ): 
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <li class="mr05 ml05 mb1">
                                                    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                                    <figure><img src="<?php echo $img; ?>"></figure>
                                                    <!-- <?php echo esc_html( $link_title ); ?>-->
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </ul>
                            <?php endif; ?>
                    </div>
                    <div class="col-xs-8 col-md-5">
                        <figure class="img-deslocada esquerda">
                            <img src="<?php tu(); ?>/assets/images/participe.svg?v=20231004">
                        </figure>
                    </div>
                </div>
            </div>
        </article>

        <article class="container-fluid bg-roxo pt5 pb5">
            <div class="wrap">
                <div class="row">
                    <?php while(have_rows('blocos')): the_row(); ?>
                    <div class="col-xs-12 col-md-6 mb3 mb5-md">
                        <h2 class="t3 tcb w600  lh1-50 mb1"><?php echo md_sub_field('titulo'); ?></h2>
                        <div class="t2 tcb  lh1-50 w400 mb2">
                            <?php echo md_sub_field('descricao'); ?>
                        </div>
                        <a href="<?php the_sub_field('link'); ?>"><button class="btn btn-verde mb2"><?php the_sub_field('label'); ?></button></a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>                    
        </article>

        <?php get_template_part('block-prestacao'); ?>
    </main>
<?php get_footer(); ?>