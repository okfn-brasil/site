<?php if( have_rows('conteudo') ): while ( have_rows('conteudo') ) : the_row(); ?>
    <?php if( get_row_layout() == 'texto' ): ?>          
        <div class="row center-xs">
           <!--  Modificação de col-md-6 para col-md-8 -->
            <div class="col-xs-12 col-sm-9 col-md-8 tl">
                <?php echo get_sub_field('texto'); ?>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'frasescol' ): ?>
        <div class="row center-xs">
            <div class="col-xs-12 col-sm-8 col-md-6">
                <h2 class="t6 w600 ff2 mb5 tcv"><?php md_sub_field('titulo'); ?></h2>
            </div>
        </div>
        <div class="row middle-xs">
            <?php 
                $count = count(get_sub_field('itens'));
                if( have_rows('itens') ): $i = 0; while ( have_rows('itens') ) : the_row(); $i++; 
            ?>
            <div class="col-xs-12 col-sm-6 <?php acertagrid($i,$count); ?> mb4">
                <p><?php md_sub_field('texto'); ?></p>
            </div>
            <?php endwhile;  endif; ?>
        </div>
    <?php elseif( get_row_layout() == 'blocoscol' ): ?>
        <div class="row">
            <?php 
                $count = count(get_sub_field('itens'));
                if( have_rows('itens') ): $i = 0; while ( have_rows('itens') ) : the_row(); $i++; 
            ?>
            <div class="col-xs-12 col-sm-6 <?php acertagrid($i,$count); ?> mb4">
                <div class="bg-cinza p2">
                    <h4 class="uc tcv ls1 w600"><?php md_sub_field('titulo'); ?></h4>
                    <p class=""><?php md_sub_field('texto'); ?></p>
                </div>
            </div>
            <?php endwhile;  endif; ?>
        </div>
    <?php elseif( get_row_layout() == 'botoes' ): ?>
        <div class="row middle-xs center-xs mb4 mt2">
            <div class="col-xs-12">
            <?php 
                $count = count(get_sub_field('itens'));
                if( have_rows('itens') ): $i = 0; while ( have_rows('itens') ) : the_row(); $i++; 
                    $l = get_sub_field('link');
            ?>
                <a href="<?php echo $l['url']; ?>" target="<?php echo $l['target']; ?>"><button class="btn btn-verde m05 mr1 ml1"><?php echo md_line($l['title']); ?></button></a>
            <?php endwhile;  endif; ?>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'titulodesecao' ): ?>
        <h2 class="titulo-secao mb2"><?php the_sub_field('titulo'); ?></h2>
    <?php elseif( get_row_layout() == 'margem' ): ?>
        <div class="mb4"></div>
    <?php elseif( get_row_layout() == 'imagem' ): ?>
        <div class="row middle-xs">
            <div class="col-xs-12">
                <figure>
                    <?php 
                        $img = get_sub_field('imagem');
                        $img = $img ? isset($img['sizes']['full']) ? $img['sizes']['full'] : $img['url'] :  tu(0).'/assets/images/ph_full.png';
                    ?>
                    <img src="<?php echo $img; ?>">
                    <figcaption class="t1 w400 "><?php md_sub_field('legenda'); ?></figcaption>
                </figure>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'galeria' ): ?>
                </section>
            </div>
        </article>
        <article class="container-fluid bg-cinza-escuro pt3 pb3">
            <div class="wrap">
                    <div class="row center-xs noticia-carrossel carrossel">
                        <?php
                            $images = get_sub_field('galeria');
                            if($images):
                            foreach( $images as $img ): 
                        ?>
                        <div class="col-xs-12">
                            <?php $img = $img ? isset($img['sizes']['full']) ? $img['sizes']['full'] : $img['url'] :  tu(0).'/assets/images/ph_full.png'; ?>
                            <figure><img src="<?php echo $img; ?>"></figure>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </article>
        <article class="container-fluid bg-preto pt3 pb3">
            <div class="wrap">
                <section class="conteudo">
    <?php endif; ?>


<?php endwhile;  endif; ?>