<div class="popis">
    <div id="shopping-cart">
        <h2>Vasa objednavka</h2>
        <form action="?c=orders&a=clearStorage" method="post" enctype="multipart/form-data">
            <?php /** @var \App\Model\user $data */?>
            <label for="name">Meno:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $data->getFirstName()?>"><br>
            <label for="second-name">Priezvisko:</label><br>
            <input type="text" id="second-name" name="second-name" value="<?php echo $data->getSecondName()?>"><br>
            <label for="tel-number">Telefonne cislo</label><br>
            <input type="tel" id="tel-number" name="tel-number" value="<?php echo $data->getTelNumber()?>"><br>
            <label for="address">Adresa:</label><br>
            <textarea id="address" name="address"><?php echo $data->getAddress()?></textarea><br>
            <div id="showItems">

            </div>
            <p>Finalna suma: <span id="cart-total"></span></p>
            <a class="red-button" onclick="window.history.back()">Vrat sa spat</a>
            <button class="green-button" type="submit" onclick="callThis()">Objednaj</button>
        </form>
    </div>
</div>

<script>
    function callThis(){
        sendData();
    }

    function sendData(){
        var formData = $('form').serialize();
        var data = JSON.parse(sessionStorage.getItem('cart'));

        $.ajax({
            url: "?c=Orders&a=createOrder",
            type: 'POST',
            data: {
                data: data ,
                formData: formData,
            },
            success: function(response) {
                console.log(response);
            }
        });
    }

        var cart = JSON.parse(sessionStorage.getItem('cart'));
        var totalPrice = 0;

        if (cart && cart.length > 0) {
            var cartContainer = document.getElementById('showItems');

            // Loop over the items in the cart
            for (var i = 0; i < cart.length; i++) {
                // Get the item and quantity
                var title = cart[i].title;
                var quantity = cart[i].quantity;
                var price = cart[i].price;

                // Create an element to hold the item
                var itemContainer = document.createElement('div');
                itemContainer.className = 'cart-item';

                // Add the item and quantity to the element
                itemContainer.innerHTML = '<span class="item-name">' + title +
                    '</span>' + '<span class="item-quantity">'+ quantity +
                    '</span>' + '<span>'+ 'x' +'</span>' + '<span class="item-price">'+ price + '</span>';
                totalPrice += parseInt(price)*parseInt(quantity);;
                // Add the item element to the cart container
                cartContainer.appendChild(itemContainer);
            }
        }
        document.getElementById('cart-total').innerHTML = totalPrice +' €';


</script>