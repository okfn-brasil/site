<aside class="modal container-fluid" data-membro="col_<?php the_ID(); ?>">
    <div class="wrap h100">
        <div class="row center-xs middle-xs h100">
            <button class="btn-fechar shrink" type="button"><span>Esc</span></button>
            <div class="col-xs-12 col-sm-8 col-md-6">
                <article class="modal-membro bg-cinza p2 ">
                   <div class="mb1" style="width: 100%;display: flex;justify-content: center;flex-direction: column;">
                        <div>
                            <?php 
                                $img = get_field('imagem');
                                $img = $img ? isset($img['sizes']['perfil']) ? $img['sizes']['perfil'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                            ?>
                            <figure data-modal="col_<?php the_ID(); ?>"><img src="<?php echo $img; ?>" style="width: 250px;"></figure>
                        </div>
                        <div style="display: flex;flex-direction: column;justify-content: center;">
                            <h3 class="t4 w600 ff2 "><?php the_title(); ?></h3>
                            <h4 class="t3 w400 "><?php md_field('cargo'); ?></h4>
                            <p class="t2 w400 "><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                        </div>
                    </div>

                    <div class="conteudo  tl">
                        <?php echo md_field('texto'); ?>
                    </div>
                </article>
            </div>
        </div>
    </div>
</aside>