<?php /** @var \App\Model\user $data */?>
<div class="popis" style="margin-top: 5%">

    <div class="row" >
        <h1>Informacie o tvojom ucte</h1>

    </div>
</div>
<div class="menu">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">

                <form class="account-form" method="post" action="?c=users&a=showAccoutInfo" style="color: black;">
                    <label for="fistName">Meno:</label>
                    <input name="firstName" type="text" id="fistName" class="form-control" placeholder="Meno" required value="<?php echo $data->getFirstName()?>" autofocus>
                    <label for="secondName">Priezvisko:</label>
                    <input name="secondName" type="text" id="secondName" class="form-control" placeholder="Priezvisko" required value="<?php echo $data->getSecondName()?>">
                    <label for="telNumber">Tel. cislo:</label>
                    <input name="telNumber" type="number" id="telNumber" class="form-control" placeholder="Telefonne cislo" required value="<?php echo $data->getTelNumber()?>">
                    <label for="address">Adresa:</label>
                    <input name="address" type="text" id="address" class="form-control" placeholder="Adresa" required value="<?php echo $data->getAddress()?>"> <br>

                    <div class="text-center">
                        <button class="tlacidlo-prihlasenia btn btn-primary" type="submit" name="submit" id="submit">Uloz zmeny
                        </button>
                    </div>
                    <br>
                    <div class="text-center">
                        <a href="?c=users&a=showFormForPwd" class="tlacidlo-prihlasenia btn btn-warning" id="change">Zmenit heslo
                        </a>
                    </div>
                    <br>
                    <br>
                    <?php
                    /** @var App\Auth\DummyAuthenticator $auth */
                    if ($auth->isAdminLogged()) {?>
                        <div class="text-center">
                            <a href="?c=admin&a=showAllOrders" class="tlacidlo-prihlasenia btn btn-danger" >Ukaz historiu vsetkych objednavok
                            </a>
                        </div>
                    <?php } else {?>
                        <div class="text-center">
                            <a href="?c=users&a=showUserOrders" class="tlacidlo-prihlasenia btn btn-danger" >Ukaz historiu objednavok
                            </a>
                        </div>
                    <?php }?>


                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="../../../public/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">



</script>