// let keywordss = [
//         'Apple',
//         'Grape',
//         'Banana',
//         'Green Apple',
//         'Melon',
//         'Watermelon',
//         'Strawberry',
//         'Orange',
//         'Orange Bali',
//         'Green Grape'
// ]

// let keywordss;
// fetch('/discover').then(products => (discover = products))

// const resultBox = document.querySelector(".result_box")
// const inputBox = document.getElementById("input_box")

// inputBox.onkeyup = function () {
//     console.log(inputBox.value)
//     let result = [];
//     let input = inputBox.value;
//     if (input.length) {
//         result = keywordss.filter((keyword)=>{
//             return keyword.toLowerCase().includes(input.toLowerCase());
//         })
//         // console.log(result)
//     }
//     display(result);
// }

// function display(result) {
//     const content = result.map((list)=>{
//         return "<li onclick=selectInput(this)>" + list + "</li>";
//     });
//     resultBox.innerHTML ="<ul>" + content.join("") + "</ul>"
// }

// function selectInput(list){
//     inputBox.value = list.innerHTML;
//     resultBox.innerHTML='';
// }

// Variable to store the original content of the dropdown
var originalDropdownContent = document.getElementById("myDropdown").innerHTML;

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    event.preventDefault();
}

function filterFunction() {
    var input, filter, div, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");

    // Always restore the original content when the input changes
    div.innerHTML = originalDropdownContent;

    // Counter for found items
    var foundCount = 0;

    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1 && filter !== " ") {
            a[i].style.display = "";
            foundCount++;
        } else {
            a[i].style.display = "none";
        }
    }

    // Show/hide the dropdown based on whether there is text input
    div.style.display = filter.length > 0 ? "block" : "none";

    // Display "not found" message if no items are found
    if (foundCount === 0 && filter.length > 0) {
        div.innerHTML = '<p class="m-2" style="color: #050505;">No matching results found.</p>';
    }
}

window.onkeyup = function (event) {
    if (!event.target.matches('.form-control')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            openDropdown.style.display = 'none';
        }
    }
}

document.getElementById("myInput").addEventListener("input", filterFunction);

const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
progress = document.querySelector(".slider .progress");

let priceGapSlide = 25000;
let priceGapBox = 25000;

priceInput.forEach(input =>{
    input.addEventListener("input", e=>{
        //getting two inputs value and parsing them to number
        let minVal = parseInt(priceInput[0].value),
        maxVal = parseInt(priceInput[1].value);

        if((maxVal - minVal >= priceGapBox) && maxVal <= 500000 ){
            if(e.target.className === "input-min"){//if active input is min input
                rangeInput[0].value = minVal;
                progress.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxVal;
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }

        }

    });
});


rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        //getting two ranges value and parsing them to number
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if((maxVal - minVal) < priceGapSlide){
            if(e.target.className === "range-min"){//if active slider is min slider
                rangeInput[0].value = maxVal - priceGapSlide
            }else{
                rangeInput[1].value = minVal + priceGapSlide;
            }

        }
        else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            progress.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }

    });
});

//===================
// function sayurfuct(){
//     document.myInput.action = "action.php";
//     document.submit;
// }
