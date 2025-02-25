document.querySelector("form").addEventListener("submit", function (e) {
    let seatNumber = document.querySelector("[name='seat_number']").value;
    if (seatNumber < 1) {
        alert("Seat number must be greater than 0!");
        e.preventDefault();
    }
});
