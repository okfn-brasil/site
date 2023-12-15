<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <header class="container-fluid hero pt7 pt10-sm pb5">
            <div class="wrap">
                <div class="row center-xs">
                    <div class="col-xs-12 col-md-7 tl">
                        <h1 class="t6 w100 ff2  mb3"><?php md_field('titulo'); ?></h1>
                        <p class="t1 ff2 w400 tcv uc ls1 mb2">Acompanhe nossas redes</p>
                        <?php if( have_rows('redes_sociais','option') ): ?>
                                    <ul class="lista-horizontal m0">
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
                    <div class="col-xs-8 col-sm-5">
                        <figure class="img-deslocada esquerda">
                            <img src="<?php tu(); ?>/assets/images/faq.svg?v=20231004">
                        </figure>
                    </div>
                </div>
            </div>
        </header>
        <?php while(have_rows('blocos')): the_row(); ?>
        <section class="container-fluid  pt5 pb5">
            <div class="wrap">
                <header class="row">
                    <div class="col-xs-12">
                        <h2 class="titulo-secao  mb4"><?php md_sub_field('titulo'); ?></h2>
                    </div>
                </header>
                <div class="row">
                    <div class="col-xs-12">
                        <?php while(have_rows('perguntas')): the_row(); ?>
                        <div class="sanfona mb2">
                            <div class="sanfona-titulo">
                                <div class="t4 w600  lh1-50">
                                    <p><?php md_sub_field('pergunta'); ?></p>
                                </div>
                            </div>
                            <div class="sanfona-conteudo">
                                <div class="t3 w400 lh1-50">
                                    <?php md_sub_field('resposta'); ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
       
    <?php get_template_part('block-apoie'); ?>

    </main>
<?php get_footer(); ?>