document.addEventListener("DOMContentLoaded", function () {
    const cartButtons = document.querySelectorAll(".product-cart-btn");
    const cartModal = document.getElementById("cart-modal");
    const loginModal = document.getElementById("login-modal");
  
    cartButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const productId = this.getAttribute("data-product-id");
  
        fetch("add_to_cart.php", {
          method: "POST",
          headers: {
              "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
              product_id: productId,
          }),
      })
      .then(response => response.json().catch(() => ({ success: false, message: "Invalid JSON response" })))
      .then(data => {
          if (data.success) {
              cartModal.classList.remove("hide");
              cartModal.classList.add("show");
      
              setTimeout(() => {
                  cartModal.classList.remove("show");
                  cartModal.classList.add("hide");
              }, 1500);
          } else if (data.message === "User not logged in") {
              loginModal.classList.remove("hide");
              loginModal.classList.add("show");
      
              setTimeout(() => {
                  loginModal.classList.remove("show");
                  loginModal.classList.add("hide");
              }, 1500);
          } else {
              alert("Failed to add product to cart: " + data.message);
          }
      })
      .catch(error => console.error("Error:", error));
      
      });
    });
  
  
    if (cartModal) {
      cartModal.addEventListener("click", function () {
        cartModal.classList.remove("show");
        cartModal.classList.add("hide");
      });
    }
  
    if (loginModal) {
      loginModal.addEventListener("click", function () {
        loginModal.classList.remove("show");
        loginModal.classList.add("hide");
      });
    }
  });
  


const navbar_toggle = document.querySelector(".navbar-toggle");
const navigation_links = document.querySelector(".navigation_links");
const searchBar = document.querySelector(".product-search");

navbar_toggle.addEventListener("click", function () {

  navigation_links.classList.toggle("active");

  
  if (navigation_links.classList.contains("active")) {
      searchBar.style.display = "none";
  } else {
      searchBar.style.display = "block";
  }
});
