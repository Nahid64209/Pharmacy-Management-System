function validatePayment(form) {
	if (form.customer.value === "" || form.invoice.value === "" || form.amount.value === "" || form.method.value === "" || form.phone.value === "") {
		alert("Please fill up all payment fields properly");
		return false;
	}

	return true;
}