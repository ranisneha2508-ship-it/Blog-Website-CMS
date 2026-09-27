const password = document.getElementById("loginPassword");
const eye = document.getElementById("loginPasswordToggle");

eye.onclick = function () {

    if (password.type == "password") {

        // Password dikhao
        password.type = "text";

        // Eye ko close karo
        eye.classList.remove("bi-eye");
        eye.classList.add("bi-eye-slash");

    } else {

        // Password hide karo
        password.type = "password";

        // Eye ko open karo
        eye.classList.remove("bi-eye-slash");
        eye.classList.add("bi-eye");
    }
};
const confirmPassword = document.getElementById("confirmPassword");
const confirmEye = document.getElementById("confirmPasswordToggle");

confirmEye.onclick = function () {

    if (confirmPassword.type == "password") {

        // Password show
        confirmPassword.type = "text";

        // Eye close
        confirmEye.classList.remove("bi-eye");
        confirmEye.classList.add("bi-eye-slash");

    } else {

        // Password hide
        confirmPassword.type = "password";

        // Eye open
        confirmEye.classList.remove("bi-eye-slash");
        confirmEye.classList.add("bi-eye");
    }
};
