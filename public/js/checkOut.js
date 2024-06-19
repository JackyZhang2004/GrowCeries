function calculateTotal() {
    let total = 0;
    let shippingCost = 0;
    let serviceFee = 0;
    let packagingCosts = 1000;
    document.querySelectorAll('.itemTotal').forEach(item => {
        total += parseFloat(item.textContent);
    });
    document.getElementById('spendingSubtotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
    total = total+shippingCost+serviceFee+packagingCosts
    document.getElementById('totalPayment').textContent = 'Rp ' + total.toLocaleString('id-ID');
}

function validateForm() {
    const options = document.getElementsByName('option');
    let selectedValue = '';

    // Check if any radio button is checked
    for (const option of options) {
        if (option.checked) {
            selectedValue = option.value;
            break;
        }
    }

    // If no option is selected, show error message
    if (selectedValue === '') {
        document.getElementById('error-message').style.display = 'block';
    } else {
        // If option is selected, show success message
        document.getElementById('error-message').style.display = 'none';
        showPopup();
    }
}

function showPopup() {
    document.getElementById('popup-overlay').style.display = 'block';
    document.getElementById('popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup-overlay').style.display = 'none';
    document.getElementById('popup').style.display = 'none';
}

// Calculate total on page load
document.addEventListener('DOMContentLoaded', calculateTotal);