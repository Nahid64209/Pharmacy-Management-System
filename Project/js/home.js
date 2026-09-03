let searchBox = document.getElementById("searchMedicine");

if (searchBox) {

searchBox.addEventListener("keyup", function () {

    let searchValue = this.value.toLowerCase();

    let medicines = document.querySelectorAll(".medicine-card");

    medicines.forEach(function (medicine) {

        let medicineName = medicine.querySelector("h3").innerText.toLowerCase();

        if (medicineName.includes(searchValue)) {

            medicine.style.display = "block";

        } else {

            medicine.style.display = "none";

        }

    });

});

}
