const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password_login");

togglePassword.addEventListener("click", function (e) {
  // toggle the type attribute
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  // toggle the eye slash icon
  this.classList.toggle("fa-eye-slash");
});

let signinContainer = document.querySelector(".sign-in-container"),
  resetPasswordContainer = document.querySelector(".forget-password-container"),
  signupContainer = document.querySelector(".sign-up-container");
document.querySelector(".forgot-btn").addEventListener("click", () => {
  signinContainer.classList.add("hidden"),
    resetPasswordContainer.classList.remove("hidden");
}),
  document.querySelector(".b-t-signin").addEventListener("click", () => {
    resetPasswordContainer.classList.add("hidden"),
      signinContainer.classList.remove("hidden");
  }),
  document.querySelector(".signup-btn").addEventListener("click", () => {
    signinContainer.classList.add("hidden"),
      signupContainer.classList.remove("hidden");
  }),
  document
    .querySelector(".already-member-btn")
    .addEventListener("click", () => {
      signupContainer.classList.add("hidden"),
        signinContainer.classList.remove("hidden");
    });

// remember me
let switchToggle = document.querySelectorAll(".switch-wrapper, .switch-text"),
  switchWrapper = document.querySelector(".switch-wrapper"),
  switchCircle = document.querySelector(".switch-circle");
switchToggle.forEach((btn) => {
  btn.addEventListener("click", () => {
    switchWrapper.classList.toggle("dark-blue-bg"),
      switchCircle.classList.toggle("switch-toggle");
  });
});
