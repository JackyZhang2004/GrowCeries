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


function validateForm(){
    const address = document.getElementById('address').innerText;
    const selectedValue = document.getElementsByTagName('optionPayment');
    // alert('clicked');

    if(address === 'No address found. Please add an address in your profile.'){
            window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth'});
            alert("salah");
    }
    else if (address !== 'No address found. Please add an address in your profile.' && selectedValue !== '' ){
        // If option is selected, show success message
        // document.getElementById('error-message-pay').style.display = 'none';
        // document.getElementById('error-message-adr').style.display = 'none';
        showPopup();
        // alert("salah");
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