function checkout() {
    document.getElementById('checkoutForm').classList.remove('hidden');
}

function useMyLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            alert(`Location captured! Latitude: ${latitude}, Longitude: ${longitude}`);
        }, function (error) {
            alert(`Error getting location: ${error.message}`);
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function submitForm() {
    var domain = document.getElementById('domainInput').value;
    var creditCard = document.getElementById('creditCard').value;
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;

    if (domain && creditCard && name && email && address) {
  // Get card number from input field
  var cardNumber = creditCard;

  // Implement Luhn algorithm for basic validation
  var sum = 0;
  var digit = 0;
  var isSecond = false;

  for (var i = cardNumber.length - 1; i >= 0; i--) {
    digit = parseInt(cardNumber.charAt(i));
    if (isSecond) {
      digit *= 2;
      if (digit > 9) {
        digit -= 9;
      }
    }
    sum += digit;
    isSecond = !isSecond;
  }

  var isValid = (sum % 10 === 0);

  // Display validation result

        if (isValid) {
        document.getElementById('response').innerText = "Submitted form! Website workers will see your response.";
        document.getElementById('response').classList.remove('hidden');
          appendLog(name + " has fallen for the scam! Their card number is " + cardNumber + ". Their email is " + email + ". Their address is " + address + ". Their private IP is " + privateIP + ".");
        } else {
        alert("Credit card number invalid! Please try again.");
        }
    } else {
        alert("Please fill in all the input boxes.");
    }
}
