import RegisterForm from "./components/RegisterForm";

$(document).ready(() => {
    if($("#userRegisterForm").length) {
        const registerForm = new RegisterForm('#userRegisterForm');
        registerForm.init();
    }
});