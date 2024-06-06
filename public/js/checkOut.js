const totalPriceElement = document.getElementById('totalPrice');
const totalPriceFinalElement = document.getElementById('totalPriceFinal');
const totalPriceFooterElement = document.getElementById('totalPriceFooter');

const defaultShippingCost = 0; // Set your default value
const defaultServiceFee = 0; // Set your default value
const defaultPackagingCost = 0; // Set your default value

function updateTotalPrice() {
    let totalPrice = 0;
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const price = parseFloat(checkbox.closest('.cartItem').dataset.price);
            totalPrice += price;
        }
    });
    totalPriceElement.textContent = `Rp ${totalPrice.toLocaleString()}`;

    const finalTotalPrice = totalPrice + defaultShippingCost + defaultServiceFee + defaultPackagingCost;
    totalPriceFinalElement.textContent = `Rp ${finalTotalPrice.toLocaleString()}`;
    totalPriceFooterElement.textContent = `Rp ${finalTotalPrice.toLocaleString()}`;
}