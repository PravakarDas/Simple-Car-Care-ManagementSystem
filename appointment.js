document.getElementById('appointmentForm').addEventListener('submit', function(event) {
    var phone = document.getElementById('phone').value;
    var carEngine = document.getElementById('carEngine').value;
    var appointmentDate = document.getElementById('appointmentDate').value;

    // Validate phone number
    var phoneRegex = /^\d{11}$/; // Updated to match the example format
    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid phone number.");
        event.preventDefault();
    }

    // Validate car engine number
    var engineRegex = /^[A-Z0-9]{17}$/; // Updated to match the example format
    if (!engineRegex.test(carEngine)) {
        alert("Please enter a valid car engine number.");
        event.preventDefault();
    }

    // Validate appointment date
    if (!appointmentDate) {
        alert("Please select an appointment date.");
        event.preventDefault();
    }
});
