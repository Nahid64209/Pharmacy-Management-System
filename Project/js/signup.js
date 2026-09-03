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

function signup() {
	let email = document.getElementById("email").value;
	let xhr = new XMLHttpRequest();

	xhr.open("POST", "../controllers/userEmailCheck.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = function() {
		document.getElementById("emailError").innerHTML = xhr.responseText;
	};
	xhr.send("email=" + email);
}

function signupu() {
	let username = document.getElementById("username").value;
	let xhr = new XMLHttpRequest();

	xhr.open("POST", "../controllers/usernameCheck.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onload = function() {
		document.getElementById("usernameError").innerHTML = xhr.responseText;
	};
	xhr.send("username=" + username);
}