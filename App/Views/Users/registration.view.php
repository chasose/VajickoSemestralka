<?php
$layout = 'auth';
/** @var Array $data */
?>
<div class="popis" style="margin-top: 5%">

    <div class="row" >
        <h1>ZAREGISTRUJ SA</h1>

    </div>
</div>
<div class="menu">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <div class="text-center text-danger mb-3">
                    <?= @$data['message'] ?>
                </div>
                <form class="registration-form" method="post" action="<?= \App\Config\Configuration::REGISTRATION_URL ?>">
                    <div class="form-label-group mb-3">

                        <label for="email">Zadaj email:</label>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span> <span id="check-email" style="color: white;"></span>
                        <input name="email" type="email" id="email" class="form-control" placeholder="Email" required autofocus onkeyup="checkEmail()">

                    </div>
                    <label for="firstName">Zadaj krstné meno:</label>
                    <input name="firstName" type="text" id="fistName" class="form-control" placeholder="Meno" required>
                    <label for="secondName">Zadaj priezvisko:</label>
                    <input name="secondName" type="text" id="secondName" class="form-control" placeholder="Priezvisko" required>
                    <label for="telNumber">Zadaj tel. číslo:</label>
                    <input name="telNumber" type="number" id="telNumber" class="form-control" placeholder="Telefonne cislo" required>
                    <label for="address">Zadaj adresu:</label>
                    <input name="address" type="text" id="address" class="form-control" placeholder="Adresa" required> <br>
                    <div class="form-label-group mb-3">
                        <label for="name">Zadaj prihlasovacie meno:</label>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                        <span id="check-username" style="color: white;">.</span>
                        <input name="name" type="text" id="name" class="form-control" placeholder="Pouzivatelske meno" required autofocus onkeyup="checkUsername()">
                        <label class="form-label" for="name"></label>
                    </div>

                    <div class="passChecker form-label-group mb-3">
                        <label for="password">Zadaj heslo:</label>
                        <input name="password" type="password" id="password" class="form-control"
                               placeholder="Heslo" required> <br>
                        <p id="message"></p>

                    </div>

                    <div class="text-center">
                        <button class="tlacidlo-prihlasenia btn btn-primary" type="submit" name="submit" id="submit">Zaregistruj sa
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="../../../public/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">



</script>