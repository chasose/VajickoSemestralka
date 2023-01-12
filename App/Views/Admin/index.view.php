<?php /** @var \App\Core\IAuthenticator $auth */ ?>
<div class="popis">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div style="font-size: 30px">
                    Vitaj, <strong><?= $auth->getLoggedUserName() ?></strong>!<br><br>
                    <?php if ($auth->isAdminLogged()) { ?>
                    Ako admin môžes pridávať, meniť alebo mazať záznamy.
                    <?php } else {?>
                        Ako užívatel si možes objednať jedlo a aj prezerať svoje posledné objednávky.
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>