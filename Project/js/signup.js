function validateSignup(form) {
	if (form.fullname.value === "" || form.email.value === "" || form.username.value === "" || form.password.value === "" || form.confirm.value === "") {
		alert("Please fill up all fields properly");
		return false;
	}

	if (form.password.value !== form.confirm.value) {
		alert("Passwords do not match");
		return false;
	}

	return true;
}