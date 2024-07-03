function openOrder(evt, orderStatus) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(orderStatus).style.display = "inline-flex";
    evt.currentTarget.className += " active";
}

// By default, open the "In Progress" tab
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.tablinks').click();
});
