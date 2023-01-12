<?php /** @var \App\Core\IAuthenticator $auth */ ?>
<div class="popis">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div style="font-size: 30px">
                    Vitaj, <strong><?= $auth->getLoggedUserName() ?></strong>!<br><br>
                    <?php if ($auth->isAdminLogged()) { ?>
                    Ako admin mozes pridavat, menit alebo mazat zaznamy.
                    <?php } else {?>
                        Ako uzivatel si mozes prezerat svoje posledne objednavky.
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>