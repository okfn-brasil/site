<?php 
    $menuitems = array();
    $activeIDs = array();
    foreach (wp_get_nav_menu_items('2') as $m) {
        if(!isset($menuitems[$m->menu_item_parent])) $menuitems[$m->menu_item_parent] = array();
        array_push($menuitems[$m->menu_item_parent], $m);
        $i = $m->menu_item_parent!=0 ? $m->menu_item_parent : $m->ID;
        $activeIDs[$m->object_id] = $i;
    }
?>
<header class="barra-topo ativo">
    <nav class="container-fluid pt05 pb05">
        <div class="wrap">
            <div class="row middle-xs">
                <div class="col-xs-9  col-md-3">
                    <a href="<?php echo home_url(); ?>" class="inline-block">
                        <img src="<?php tu(); ?>/assets/images/logo.svg?v=20231004" alt="">
                    </a>
                </div>
                <div class="col-xs-3 col-sm-2 col-md-9 tr">
                    <div class="invisible-md">
                        <a class="btn-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                    <ul class="lista-horizontal-md centro-vertical pl1 pr1 pl0-md pr0-md">
                        <?php foreach ($menuitems[0] as $m): ?>
                        <li class="t1 uc w500 mt2 mb2 mt0-md mb0-md ml05 mr05 link <?php if( isset($activeIDs[get_the_ID()]) && $activeIDs[get_the_ID()] == $m->ID ) echo 'ativo'; ?>"><a href="<?php echo $m->url; ?>"><?php echo $m->title; ?></a>
                            <?php if(isset($menuitems[$m->ID])): ?>
                            <span class="drop-sub-menu"></span>
                            <ul class="sub-menu">
                                <?php foreach ($menuitems[$m->ID] as $mm): ?>
                                <li class="t1 uc w500  link"><a href="<?php echo $mm->url; ?>"><?php echo $mm->title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                        <li class="t1 uc w500 tcp mt2 mb2 mt0-md mb0-md ml05 mr05 link">
                            <a class="toggleBusca">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.84104 17.6534L6.12999 13.3644C5.06685 12.0683 4.42606 10.408 4.42606 8.59849C4.42606 4.44789 7.79387 1.08008 11.9445 1.08008C16.0987 1.08008 19.4629 4.44789 19.4629 8.59849C19.4629 12.7491 16.0987 16.1169 11.9445 16.1169C10.135 16.1169 8.47836 15.4798 7.18221 14.4166L2.89325 18.7019C2.60198 18.9932 2.13231 18.9932 1.84104 18.7019C1.54977 18.4143 1.54977 17.941 1.84104 17.6534ZM11.9445 14.6205C15.2686 14.6205 17.9701 11.919 17.9701 8.59849C17.9701 5.27801 15.2686 2.57284 11.9445 2.57284C8.62399 2.57284 5.91882 5.27801 5.91882 8.59849C5.91882 11.919 8.62399 14.6205 11.9445 14.6205Z" fill="black"/>
                            </svg>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <form class="container-fluid bg-branco pt05 pb05" action="<?php echo home_url(); ?>">
        <div class="wrap">
            <div class="row middle-xs between-xs">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a href="<?php echo home_url("sobre"); ?>">
                        <img src="<?php tu(); ?>/assets/images/logo.svg?v=20231004" alt="">
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6 mt2 mb2 mt0-sm mb0-sm">
                    <div class="flex middle-xs">
                        <a class="t1 uc w300 tcb ml05 mr1 link shrink" href="<?php echo home_url("faq"); ?>">FAQ</a>
                        <input class="ml05 mr05 buscar campo-linha" type="text" name="s" placeholder="Buscar">
                        <button class="ml05 mr05 toggleBusca btn-fechar shrink" type="button"></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</header>