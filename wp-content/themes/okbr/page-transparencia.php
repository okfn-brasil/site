<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <!-- Junte-se a Open Knowledge -->
    <article class="container-fluid hero pt7 pt10-sm pb2">
        <div class="wrap">
            <div class="row center-xs">
                <div class="col-xs-12 col-md-7 tl">
                    <h1 class="t6 w100 ff2 mb2"><?php md_field('titulo'); ?></h1>
                    <div class="t4 w400 lh1-50 mb3 mb0-md">
                        <?php echo md_text(get_field('descricao')); ?>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-5">
                    <figure class="img-deslocada esquerda">
                        <img src="<?php tu(); ?>/assets/images/prestacao.svg?v=20231004">
                    </figure>
                </div>
            </div>
        </div>
    </article>

    <!--  Blocos -->
    <?php if( have_rows('blocos') ): $i = 0; while ( have_rows('blocos') ): $i++; the_row(); ?>
    <article class="container-fluid pt5 pb5">
        <div class="wrap">
            <?php if(get_sub_field('titulo')): ?>
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao mb4"><?php the_sub_field('titulo'); ?></h2>
                </div>
            </header>
            <?php endif; ?>
            <div class="row">
                <?php if( have_rows('destaques') ): while ( have_rows('destaques') ) : the_row(); ?>
                <article class="col-xs-12 col-md-6 mb2 mb1-md">
                    <a href="<?php the_sub_field(get_sub_field('tipo')); ?>" class="cartao cartao-horizontal middle-xs">
                        <figure><img src="<?php tu(); ?>/assets/images/documento.png"></figure>
                        <section class="p2 tl">
                            <div class="t4 lh1-50 w600 mb1">
                                <p><?php the_sub_field('titulo'); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao"><?php echo get_sub_field('tipo') == 'link' ? get_sub_field('label') : 'Leia no site'; ?></button>
                        </section>
                    </a>
                </article>
                <?php endwhile;  endif; ?>
                
                <?php if( have_rows('lista') ): ?>
                <article class="col-xs-12 col-md-6 mb2 mb1-md tc tl-md">
                    <?php while ( have_rows('lista') ) : the_row(); ?>
                    <a href="<?php the_sub_field(get_sub_field('tipo')); ?>"><button class="btn mb05"><?php the_sub_field('titulo'); ?></button></a>
                    <?php endwhile; ?>
                </article>
                <?php endif; ?>
            </div>
        </div>                    
    </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>