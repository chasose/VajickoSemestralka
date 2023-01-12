<div class="popis">
    <div id="shopping-cart">
        <h2>Nakupny kosik</h2>
        <div id="cart-items">

        </div>
        <p>Finalna suma: <span id="cart-total"></span></p>
        <button class="red-button" onclick="window.location.href='?c=offers';">Vrat sa spat</button>
        <button id="button-to-continue" class="green-button" onclick="window.location.href='?c=orders&a=orderDetail';">Pokracuj v objednavke</button>
    </div>
</div>


<script>
    // Get the cart from sessionStorage
    var cart = JSON.parse(sessionStorage.getItem('cart'));
    var totalPrice = 0;
    // Check if the cart exists and is not empty
    if (cart && cart.length > 0) {
        // Get the div element to hold the shopping cart items
        var cartContainer = document.getElementById('cart-items');

        // Loop over the items in the cart
        for (var i = 0; i < cart.length; i++) {
            // Get the item and quantity
            var id = cart[i].id;
            var title = cart[i].title;
            var quantity = cart[i].quantity;
            var price = cart[i].price;

            // Create an element to hold the item
            var itemContainer = document.createElement('div');
            itemContainer.className = 'cart-item';

            // Add the item and quantity to the element
            itemContainer.innerHTML = '<span class="item-name">' + title +
                '</span>' + '<span class="item-quantity">'+ quantity +
                '</span>' + '<span>'+ 'x' +'</span>' + '<span class="item-price">'+ price + '</span>' +
                '<button class="remove-item" onclick="removeItem(this)">Remove</button>';
            totalPrice += parseInt(price)*parseInt(quantity);
            // Add the item element to the cart container
            cartContainer.appendChild(itemContainer);
        }
    }
    document.getElementById('cart-total').innerHTML = totalPrice +' €';

    function removeItem(item){

        var itemContainer = item.parentNode;
        // Get the price of the item
        var price = itemContainer.querySelector('.item-price').innerHTML;
        var quantity = itemContainer.querySelector('.item-quantity').innerHTML;
        var title = itemContainer.querySelector('.item-name').innerHTML;
        // Remove the item from the page
        itemContainer.parentNode.removeChild(itemContainer);
        // Update the total price
        totalPrice -= parseInt(price)*parseInt(quantity);
        document.getElementById('cart-total').innerHTML = totalPrice + ' €';

        var cart = JSON.parse(sessionStorage.getItem("cart"));

        // Find the index of the item to remove
        var index = -1;
        for (var i = 0; i < cart.length; i++) {
            if (cart[i].title === title) {
                index = i;
                break;
            }
        }

        if (index !== -1) {
            // Use splice to remove the item from the cart array
            cart.splice(index, 1);

            // Update the cart in session storage
            sessionStorage.setItem("cart", JSON.stringify(cart));
        }
        //if cart is empty after removing
        if(cart.length === 0){
            sessionStorage.removeItem('cart');
        }
        updateButton();

    }

    window.onload = function switchButton(){

        let button = document.getElementById("button-to-continue");
        if(sessionStorage.getItem("cart") === null) {
            console.log("CART JE NULL")
            button.disabled = true;
        }else {
            console.log("CART NIEJE NULL")
            button.disabled = false;
        }
    }

    function updateButton(){
        let button = document.getElementById("button-to-continue");

        button.disabled = sessionStorage.getItem("cart") === null;
    }

</script>
