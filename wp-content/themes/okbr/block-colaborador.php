<div class="cartao cartao-membro">
    <?php 
        $img = get_field('imagem');
        $img = $img ? isset($img['sizes']['perfil']) ? $img['sizes']['perfil'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
    ?>
    <figure data-modal="col_<?php the_ID(); ?>"><img src="<?php echo $img; ?>" style="width: 276px;"></figure>
    <section class="flex flex-column flex-row-sm between-xs middle-xs">
        <div class="">
            <a data-modal="col_<?php the_ID(); ?>"><p class="t3  w600 mb05"><?php the_title(); ?></p></a>
            <a data-modal="col_<?php the_ID(); ?>"><p class="t3  ff2 w400 mb0"><?php md_field('cargo'); ?></p></a>
            <a class="" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
        </div>
        <button class=" t4 w900" data-modal="col_<?php the_ID(); ?>">+</button>
    </section>
</div>