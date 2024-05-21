document.addEventListener("DOMContentLoaded", function() {
    var checkboxes = document.querySelectorAll('.checkboxItem');
    var checkAllBox = document.getElementById('checkAll');
    var totalPriceElement = document.getElementById('totalPrice');

    function updateTotalPrice() {
        var totalPrice = 0;
        checkboxes.forEach(function(cb) {
            if (cb.checked) {
                var row = cb.closest('tr');
                var price = parseFloat(row.querySelector('.item-price').textContent);
                var quantity = parseInt(row.querySelector('.item-quantity').textContent);
                totalPrice += price * quantity;
            }
        });
        totalPriceElement.textContent = totalPrice.toFixed(2);
    }

    function updateMasterCheckbox() {
        var allChecked = true;
        checkboxes.forEach(function(cb) {
            if (!cb.checked) {
                allChecked = false;
            }
        });
        checkAllBox.checked = allChecked;
    }

    updateTotalPrice();

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            updateTotalPrice();
            updateMasterCheckbox();
        });
    });

    checkAllBox.addEventListener('change', function() {
        checkboxes.forEach(function(cb) {
            cb.checked = checkAllBox.checked;
        });
        updateTotalPrice();
    });

    checkboxes.forEach(function(cb) {
        if (cb.checked) {
            updateTotalPrice();
        }
    });

    updateMasterCheckbox();
});
