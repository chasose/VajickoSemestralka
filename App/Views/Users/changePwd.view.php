<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="popis" style="margin-top: 5%">

    <div class="row" >
        <h1>Zmena hesla</h1>

    </div>
</div>
<div class="menu">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="text-center text-danger mb-3">
                <?= @$data['message'] ?>
            </div>
            <div class="card-body">
                <form class="account-form" method="post" action="?c=users&a=changePwd" style="color: black">
                    <label for="current-password">Heslo:</label>
                    <input  class="form-control" type="password" id="current-password" name="current-password" required autofocus>

                    <label for="new-password">Nove heslo:</label>
                    <input  class="form-control" type="password" id="new-password" name="new-password" required>

                    <label for="confirm-password">Potvrd nove heslo:</label>
                    <input  class="form-control" type="password" id="confirm-password" name="confirm-password" required>
                    <br>
                    <input id="send" class="tlacidlo-prihlasenia btn btn-primary" type="submit" value="Zmenit heslo">
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../../public/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">



</script>