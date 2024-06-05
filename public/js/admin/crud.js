function dropDownFunction(id){
    console.log(id);
    if(document.getElementById(id).classList.contains('view')){
        dropDown = document.getElementById(id).classList.remove('view')
    }
    else{
        dropDown = document.getElementById(id).classList.toggle('view')
    }
    
}

function searchFunction(){
    searchValue = document.getElementById(searchField);
    
}