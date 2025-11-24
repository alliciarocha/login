document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");

  const showSignupBtn = document.getElementById("showSignup");
  const showLoginBtn = document.getElementById("showLogin");

  if (loginForm && signupForm && showSignupBtn && showLoginBtn) {
    showSignupBtn.addEventListener("click", (e) => {
      e.preventDefault();
      loginForm.classList.add("hidden");
      signupForm.classList.remove("hidden");
    });

    showLoginBtn.addEventListener("click", (e) => {
      e.preventDefault();
      loginForm.classList.remove("hidden");
      signupForm.classList.add("hidden");
    });
  } else {
    console.error(
      "Um ou mais elementos de formulário/botão de alternância não foram encontrados no HTML."
    );
  }
});
