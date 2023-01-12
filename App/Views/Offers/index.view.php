<?php
/** @var offer[] $data */

use App\Model\offer;
?>
<div class="popis">
    <h1>Vyberte si pizzu a nasledne objednajte</h1>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
</div>
<?php /** @var auth $auth */
if ($auth->isAdminLogged()) {?>
    <div>
        <a href="?c=offers&a=createOffer" class="block">Pridaj jedlo</a>
    </div>
<?php }?>
<a href="?c=orders" class="block kup" onclick="switchButton()"  >NAKUPNY KOSIK</a>
<?php foreach ($data as $offer) {
    if ($offer->getVisible() === 0) continue; ?>
<div class="menu">
    <?php if ($auth->isAdminLogged()) {?>
        <div class="tlacidla">

            <a href="?c=offers&a=deleteOffer&id=<?php echo $offer->getId()?>" class="btn btn-danger">Zmazat</a>
            <a href="?c=offers&a=editOffer&id=<?php echo $offer->getId()?>" class="btn btn-warning">Upravit</a>
        </div>
    <?php } ?>
    <div class="predaj">

        <div class="pizzaObrazok">

            <img src="<?php echo $offer->getImage() ?>" alt="">
            <h6><?php echo $offer->getPrice() ?>$</h6>
        </div>
        <div class="popisok">
            <h3><?php echo $offer->getTitle() ?></h3>
            <p><?php echo $offer->getDescription() ?></p>
            <button type="submit" onclick="addToCard('<?php echo $offer->getId()?>','<?php echo $offer->getTitle() ?>',
                    '<?php echo $offer->getPrice() ?>',document.getElementById('<?php echo $offer->getId()?>quantity').value)" class="kup">VLOZIT DO KOSIKA</button>
            <input type="number" id="<?php echo $offer->getId()?>quantity" name="quantity" min="1" max="20" value="1" style="text-align: center">
        </div>
    </div>


</div>
<?php } ?>

<script>

    function addToCard(id,title,price,quantity){
        console.log("Vosiel tam");

        if (sessionStorage.getItem('cart') === null) {
            // If it doesn't, create it as an empty array
            sessionStorage.setItem('cart', '[]');
        }
        // Get the cart from sessionStorage
        var cart = JSON.parse(sessionStorage.getItem('cart'));
        var duplicate = cart.find(item => item.id === id);
        if (duplicate){
            duplicate.quantity = parseInt(duplicate.quantity) + parseInt(quantity);
        } else cart.push({id: id, title: title,price: price, quantity: quantity}); // Add the item to the cart


        // Save the updated cart back to sessionStorage
        sessionStorage.setItem('cart', JSON.stringify(cart));
        alert("Uspesne pridany do kosika");

    }

</script>
