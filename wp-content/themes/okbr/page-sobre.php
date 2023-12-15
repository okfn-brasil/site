<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main id="page-sobre">
    <!-- Nós somos -->
    <article class="container-fluid hero bg-grafismo pt7 pt10-sm pb5">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12  col-md-9">
                    <h1 class="t6 w100 ff2  mb2"><?php md_field('titulo'); ?></h1>
                    <div class="t3  mb3"><?php echo md_field('subtitulo'); ?></div>
                </div>
            </div>
            <?php 
                $images = get_field('imagens');
                if($images):
            ?>
            <div class="row middle-xs mb2 mb3-sm">
                <?php 
                    $count = count($images);
                    foreach( $images as $i=>$img ): 
                        $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                ?>
                <div class="col-xs-12 <?php acertagrid($i,$count); ?> mb1">
                    <figure><img src="<?php echo $img; ?>"   style="border-radius:16px;"></figure>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="row center-xs">
                <div class="col-xs-12 col-sm-9 col-md-6 tl conteudo ">
                    <?php echo md_text(get_field('descricao')); ?>
                </div>
            </div>
        </div>
    </article>

    <!-- Missão e Visão -->
    <article class="container-fluid  pt3 pb3 oh">
        <div class="wrap">
            <?php 
                $i=0;
                while(have_rows('blocosimagem')): the_row(); $i++;
            ?>
            <section class="row middle-xs <?php if($i%2) echo 'reverse'; ?> mb5">
                <div class="col-xs-12 col-md-6 z1">
                    <figure class=" ambos mb2 mb0-md">
                        <?php 
                            $img = get_sub_field('imagem');
                            $img = $img ? isset($img['sizes']['full']) ? $img['sizes']['full'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                        ?>
                        <img src="<?php echo $img; ?>">
                    </figure>
                </div>
                <div class="col-xs-12 col-md-6 z2">
                    <h3 class="t6 w100 ff2  mb3 lh1-25"><?php md_sub_field('titulo'); ?></h3>
                    <div class="row">
                        <div class="col-xs-12 col-md-10 t3 lh1-50 tcc">
                            <?php echo md_text(get_sub_field('descricao')); ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endwhile; ?>
        </div>
    </article>

    <!-- Valores -->
    <article class="container-fluid  pt3 pb3">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12 center-xs">
                    <h2 class="t6 w600 ff2 tcv ">Valores</h2>
                </div>
            </div>

            <section class="row middle-xs">

                <?php 
                    $i=0;
                    while(have_rows('blocosicone')): the_row(); $i++;
                ?>
                <article class="col-xs-12 col-sm-6 p<?php echo $i%2 ? 'r':'l'; ?>1 p<?php echo $i%2 ? 'r':'l'; ?>3-md mb3">
                    <figure class="valores_icon">
                        <?php 
                            $img = get_sub_field('imagem');
                            $img = $img ? isset($img['sizes']['meio']) ? $img['sizes']['meio'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                        ?>
                        <img src="<?php echo $img; ?>">
                    </figure>
                    <h3 class="t4 w300 mb1 "><?php md_sub_field('titulo'); ?></h3>
                    <section class="t3 lh1-25 mb2 tcc">
                        <?php echo md_text(get_sub_field('descricao')); ?>
                    </section>
                </article>
                <?php endwhile; ?>

            </section>
        </div>
    </article>

    

    <?php get_template_part('block-prestacao'); ?>
    <?php get_template_part('block-rede'); ?>

    <?php while(have_rows('grupos')): the_row(); ?>
    <article class="container-fluid bg-branco pt5 pb3">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao mb4"><?php md_sub_field('titulo'); ?></h2>
                </div>
            </header>

            <!-- Logos -->
            <section class="row start-xs middle-xs">
                <?php while(have_rows('logos')): the_row(); ?>
                <div class="col-xs-6 col-sm-4 col-md-3 mb2">
                    <a <?php echo ($url = get_sub_field('url')) ? 'href="'.$url.'" target="_blank"' : 'onclick="return false;"'; ?>>
                        <?php 
                            $img = get_sub_field('imagem');
                            $img = $img ? $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                        ?>
                        <img src="<?php echo $img; ?>">
                    </a>
                </div>
                <?php endwhile; ?>
            </section>
        </div>
    </article>
    <?php endwhile; ?>

    <?php get_template_part('block-apoie'); ?>
</main>
<?php get_footer(); ?>