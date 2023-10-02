function search_pesquisa() {

    
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('pesquisa');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";                 
        }
    }

    
function search_pesquisa() {
    modalFilter.classList.add('closed')
}


function search_pesquisa() {
    modalFilter.classList.remove('closed')
}

}

