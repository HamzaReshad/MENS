document.querySelectorAll(".cart-btn").forEach(cartButton => {
    cartButton.addEventListener("click", function() {
        var productId = this.getAttribute("data-product-id");

        fetch('add_to_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'product_id': productId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Product added to cart successfully!");
            } else {
                alert("Failed to add product to cart: " + data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const increaseButtons = document.querySelectorAll('.increase-btn');
    const decreaseButtons = document.querySelectorAll('.decrease-btn');
    const removeButtons = document.querySelectorAll('.remove-btn');

    
    increaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            updateCartQuantity(productId, 'increase');
            preventDefault();
        });
        
    });

   
    decreaseButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            updateCartQuantity(productId, 'decrease');
            preventDefault();
        });
    });

    
    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-product-id');
            removeFromCart(productId);
            preventDefault();
        });
    });

   
    function updateCartQuantity(productId, action) {
        fetch('update_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                'product_id': productId,
                'action': action
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); 
            } else {
                alert('Error updating cart.');
            }
        })
        .catch(error => console.error('Error:', error));
    }

  
    function removeFromCart(productId) {
        fetch('remove_from_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                'product_id': productId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); 
            } else {
                alert('Error removing item.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
