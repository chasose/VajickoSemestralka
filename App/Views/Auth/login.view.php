<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="popis">
    <h1>PRIHLÁS SA </h1>

</div>
<div class="menu">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                        <div class="form-label-group mb-3">
                            <label for="login">PRIHLASOVACIE MENO</label>
                            <input name="login" type="text" id="login" class="form-control" placeholder="Login"
                                   required autofocus>
                        </div>

                        <div class="passChecker form-label-group mb-3">
                            <label for="login">PRIHLASOVACIE HESLO</label>
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Password" required> <br>
                            <p id="message"></p>

                        </div>
                        <div class="text-center">
                            <button class="tlacidlo-prihlasenia btn btn-primary" type="submit" name="submit">Prihlásiť
                            </button>
                        </div>
                        <div class="registration" style="color: #111111; text-align: center" >
                            <a href="?c=users&a=index">Zaregistruj sa, ak ešte nemáš účet!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../../public/js/script.js"></script>

