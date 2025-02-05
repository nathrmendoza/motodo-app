class RegisterForm {
    constructor (element) {
        this.$form = $(element);
    }

    init() {
        this.#setupCustomValidations();
        this.#setupValidation();
        this.#bindEvents();
    }

    destroy() {
        this.$form.off();
        this.$form.data('validator').destroy();
    }

    #setupCustomValidations() {
        $.validator.addMethod("noInappropriate", function(value, element) {
            const inappropriate = ['fuck', 'shit', 'ass', 'bitch'];
            return !inappropriate.some(word =>
                value.toLowerCase().includes(word.toLowerCase())
            );
        }, "Please choose an appropriate name");
    }

    #setupValidation() {
        this.$form.validate({
            rules: {
                name: {
                    required: true,
                    minlength: 1,
                    maxlength: 50,
                    pattern: /^[a-zA-Z\s'-]+$/,
                    noInappropriate: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    equalTo: "#form_user_password"
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 1 character",
                    maxlength: "Name cannot be longer than 50 characters",
                    pattern: "Name can only contain letters, spaces, hyphens, and apostrophes"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 6 characters"
                },
                confirm_password: {
                    required: "Please confirm your password",
                    equalTo: "Passwords do not match"
                }
            },
            errorElement: 'div',
            errorPlacement: this.#handleErrorPlacement.bind(this),
            highlight: this.#handleHighlight.bind(this),
            unhighlight: this.#handleUnhighlight.bind(this)
        });
    }

    #handleErrorPlacement(error, element) {
        error.addClass('error-message');
        error.insertBefore(element);
    }

    #handleHighlight(element) {
        $(element).addClass('error');
    }

    #handleUnhighlight(element) {
        $(element).removeClass('error');
    }

    #bindEvents() {
        this.$form.on("submit", this.#handleSubmit.bind(this));
    }

    #handleSubmit(e) {
        if (!this.$form.valid()){
            e.preventDefault();
        }
    }
}

export default RegisterForm;