function validateForgot(form) {
        const username = form.username.value;
        const newPassword = form.newPassword.value;
        const confirmPassword = form.confirmPassword.value;

        if (username === "" || newPassword === "" || confirmPassword === "") {
                alert("Please fill up all fields properly");
                return false;
        }

        if (newPassword !== confirmPassword) {
                alert("Passwords do not match");
                return false;
        }

        return true;
}