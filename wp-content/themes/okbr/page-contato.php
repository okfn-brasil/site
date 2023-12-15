<?php 
    function formContato($a){
        $nome = isset($a['qd4q9d4q9']) ? $a['qd4q9d4q9'] : false;
        $email = isset($a['d4as8d4a9s']) ? $a['d4as8d4a9s'] : false;
        $assunto = isset($a['sda6f51asd6fa5']) ? $a['sda6f51asd6fa5'] : false;
        $msg = isset($a['fasdf1asd9f5as']) ? $a['fasdf1asd9f5as'] : false;

        $erros = array();
        if(!$nome || !$email || !$assunto || !$msg){array_push($erros, 'Preencha todos os campos.');}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){array_push($erros, 'E-mail inválido!');}

        if(!sizeof($erros)){
            $txt = '<tr><td><h2>'.$assunto.'</h2><p>Mensagem recebida pelo site.</p></td></tr>';
            $txt .= '<tr><td>Nome: '.$nome.' <br>E-mail: '.$email.' <br><br>Mensagem: <br>'.$msg.'</td></tr>';
            
            if(wp_mail('contato@okfn.org.br',$assunto,emailTabela($txt),array('Content-Type: text/html; charset=UTF-8','Reply-to: $nome &lt;$email&gt;'))){
                return (Object)array("status"=>"sucesso","msg"=>"Mensagem enviada com sucesso!");
            }
            return (Object)array("status"=>"erro","msg"=>"Não foi possível enviar sua mensagem. Tente novamente.");
        }else{
            return (Object)array("status"=>"erro","msg"=>implode("<br>", $erros));
        }
    }
    global $alerta;
    if(isset($_POST['qd4q9d4q9']) && $_POST['qd4q9d4q9']){$alerta = formContato($_POST); }
    if(isset($_POST['ajax']) && $alerta){ echo json_encode($alerta); exit; }

    //Newsletter da OK: 0446a2e3c5
    //Semanário OK: e6ecc81a0f
    //ID Serenata: a9dbb7f49a
    //Newsletter ED: https://mail.ok.org.br/subscription?f=xXpx9lwcPtKh2D763RstD2euwVFF4B6kjqZAerr3dJfODhG3QF7cynsoTot2QTaYbG6cUeYbPvQ7Bxz4fLfSRO892A

    //OKBR: c1ce40ae0bd0a2796ff3ab6990282a01-us13
    //Semanário OKBR: 7a997073b3089e902c1422a708b91a44-us20
    //Serenata de Amor: d69107b3598db8f01bc9099d59d85165-us15

?>
<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main id="page-contato">
        <!-- Entre em Contato -->
            <article class="container-fluid hero pt7 pt10-sm pb5 pb10-sm">
                <div class="wrap">
                    <div class="row">
                        <div class="col-xs-12  col-md-9">
                            <h2 class="t6 w100 ff2  mb2">Siga a <span class="tcv w700">OKBR</span></h2>
                        </div>
                    </div>
                    <div class="row center-md">
                        <div class="col-xs-12 col-sm-9 col-md-6 tl">
                            <div class="t4  w300 lh1-50">
                                <p><?php the_field('frase'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        <?php if(have_rows('redes')): ?>
        <article class="container-fluid bg-roxo pt5 pb5">
            <div class="wrap">
                <section class="row start-xs ">
                    <div class="col-xs-12">
                        <h2 class="titulo-secao tcb mb5">Redes sociais e newsletters</h2>
                    </div>
                    <div class="row center-xs mb3 tcp">
                    <?php while(have_rows('redes')): the_row(); ?>
                    <article class="col-xs-12 col-sm-12 col-md-8 mb2 mb1-md" data-categoria="inovacao">
                        <div class="cartao cartao-horizontal tl" style="display: flex; align-items: center;">
                            <?php 
                                $img = get_sub_field('imagem');
                                $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                                $link_principal = get_sub_field('link_principal');
                            ?>
                            <figure>
                                <?php if($link_principal): ?><a href="<?php echo $link_principal; ?>"><?php endif; ?>
                                    <img src="<?php echo $img; ?>">
                                <?php if($link_principal): ?></a><?php endif; ?>
                            </figure>
                            <section class="p1 pt2 pb0 ">
                                <?php if($link_principal): ?><a href="<?php echo $link_principal; ?>"><?php endif; ?>
                                    <div  class="t1 w600 ff3 uc ls1-5 tcv mb0 mb1" > <?php the_sub_field('titulo'); ?></div>
                                    <p><?php the_sub_field('descricao'); ?></p>
                                <?php if($link_principal): ?></a><?php endif; ?>
                                <?php if( have_rows('redes_sociais') ): ?>
                                    <ul class="flex">
                                        <?php while ( have_rows('redes_sociais') ) : the_row(); ?>
                                       
                                            <?php 
                                            $link = get_sub_field('link');
                                            $img = get_sub_field('icon');
                                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';

                                            if( $link ): 
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <li class="mr05">
                                                    <a class="" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                                    <figure><img src="<?php echo $img; ?>"></figure>
                                                    <!-- <?php echo esc_html( $link_title ); ?>-->
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                           
                         
                            </section>
                        </div>
                    </article>
                    <?php endwhile; ?>
                    </div>
                </section>
            </div>
        </article>
        <?php endif; ?>

        <!-- Formulário -->
            <article class="container-fluid pt5 pb5">
                <div class="wrap">
                    <div class="row">
                        <div class="col-xs-12 ">
                       
                            <h2 class="t6 w100 ff2  mb2"><?php md_field('titulo'); ?></h2>
 
                            <div class="t3 mb3 ">
                                <?php while(have_rows('emails')): the_row(); ?>
                                <p><?php the_sub_field('titulo'); ?> <a href="mailto:<?php the_sub_field('email'); ?>" class="w600 link"><?php the_sub_field('email'); ?></a></p>
                                <?php endwhile; ?>
                            </div>
                            <!-- <p class="t1 ff2 w400 tcv uc ls1 mb2">Nossas Redes</p>
                            <ul class="lista-horizontal mb3 mb0-md t4">
                                <li><a href="https://twitter.com/okfnbr"><button class="rede-social tamanho twitter mr1"></button></a></li>
                                <li><a href="https://www.facebook.com/OpenKnowledgeBrasil"><button class="rede-social tamanho facebook mr1"></button></a></li>
                                <li><a href="https://github.com/okfn-brasil"><button class="rede-social tamanho github mr1"></button></a></li>
                                <li><a href=""><button class="rede-social tamanho feed mr1"></button></a></li>
                            </ul> -->
                        </div>
                        <!--          <div class="col-xs-12 col-md-4">
                            <form action="<?php the_permalink(); ?>" method="post" class="ajaxpost">
                                <label class="t1 ff2 w400 tcv uc ls1 block mb05">Nome</label>
                                <input type="text" name="qd4q9d4q9" class="mb1" required="true">
                                <label class="t1 ff2 w400 tcv uc ls1 block mb05">Email</label>
                                <input type="email" name="d4as8d4a9s" class="mb1" required="true">
                                <label class="t1 ff2 w400 tcv uc ls1 block mb05">Assunto</label>
                                <input type="text" name="sda6f51asd6fa5" class="mb1" required="true">
                                <label class="t1 ff2 w400 tcv uc ls1 block mb05">Mensagem</label>
                                <textarea name="fasdf1asd9f5as" rows="10" class="mb1" required="true"></textarea>
                                <button type="submit" class="btn btn-verde">Enviar</button>
                            </form>
                        </div> -->
                    </div>
                </div>
            </article>
    </main>
<?php get_footer(); ?>