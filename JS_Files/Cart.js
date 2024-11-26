document.addEventListener("DOMContentLoaded", function () {
    const cartButton = document.querySelector(".cart-btn");
    const cartModal = document.getElementById("cart-modal");
    const loginModal = document.getElementById("login-modal");

    cartButton.addEventListener("click", function () {
        const productId = this.getAttribute("data-product-id");

        fetch("add_to_cart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: new URLSearchParams({ product_id: productId }),
        })
        .then(response => response.json().catch(() => ({ success: false, message: "Invalid JSON response" })))
        .then(data => {
            if (data.success) {
                toggleModal(cartModal);
            } else if (data.message === "User not logged in") {
                toggleModal(loginModal);
            } else {
                alert("Failed to add product to cart: " + data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    });

    function toggleModal(modal) {
        modal.classList.remove("hide");
        modal.classList.add("show");
        setTimeout(() => {
            modal.classList.remove("show");
            modal.classList.add("hide");
        }, 1500);
    }
});
