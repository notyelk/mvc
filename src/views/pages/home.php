<?= $render('header', ['loggedUser' => $loggedUser]); ?>
<section class="container main">
    <?= $render('sidebar'); ?>

    <section class="feed mt-10">
        <div class="row">
            <div class="column pr-5">

                <?= $render('feed-editor'); ?>
                <?= $render('feed-item'); ?>

            </div>
            <div class="column side pl-5">
                <div class="box banners">
                    <div class="box-header">
                        <div class="box-header-text">Patrocinios</div>
                        <div class="box-header-buttons">

                        </div>
                    </div>
                    <div class="box-body">
                        <a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/1200px-Webysther_20160423_-_Elephpant.svg.png" /></a>
                        <a href=""><img src="https://mazer.dev/pt-br/laravel/b1-curso/componentes-de-arquitetura-do-framework-laravel/featured-laravel_hu3769fdde211cec892c1d22aeaa807e50_30091_0x480_resize_box_3.png" /></a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body m-10">
                        Criado com ❤️ por B7Web
                    </div>
                </div>
            </div>
        </div>

    </section>
</section>
<?= $render('footer'); ?>