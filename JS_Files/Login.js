document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");
    const loginModal = document.getElementById("login-modal");
    const tickWord = document.querySelector(".tick-word p");

    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(loginForm);
            fetch("authenticate.php", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    tickWord.textContent = data.message;
                    loginModal.classList.remove("hide");
                    loginModal.classList.add("show");

                    setTimeout(() => {
                        loginModal.classList.remove("show");
                        loginModal.classList.add("hide");
                    }, 1500);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }

    if (loginModal) {
        loginModal.addEventListener("click", function () {
            loginModal.classList.remove("show");
            loginModal.classList.add("hide");
        });
    }
});
