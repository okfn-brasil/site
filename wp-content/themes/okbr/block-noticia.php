<!-- Notícia -->
<article class="col-xs-12 col-sm-12 col-md-8 mb2 mb1-md">
    <a href="<?php echo ($url = get_field('url')) ? $url : get_the_permalink(); ?>" <?php if($url) echo 'target="_blank"' ?> class="cartao cartao-horizontal middle-xs">
        <?php 
            $img = get_field('imagem');
            $img = $img ? isset($img['sizes']['thumbhor']) ? $img['sizes']['thumbhor'] : $img['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
        ?>
        <figure><img src="<?php echo $img; ?>"></figure>
        <section class="p2 pt1 tl">
            <p class="t1 ff2 uc w300 mb05"><?php the_date('d M \d\e Y'); ?></p>
            <h3 class="t3 ff2 lh1-50 w600 mb0"><?php the_title(); ?></h3>
            <button class="btn-txt btn-cartao">Leia Mais</button>
        </section>
    </a>
</article>