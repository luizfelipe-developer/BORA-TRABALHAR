 //muda de id para class o preview-btn
//aqui passo por cada botao e adiciono o evento click, passando ele para o função que vai fazer o toggle
for (let element of document.getElementsByClassName('preview-btn'))
    element.addEventListener('click', () => togglePreview(element));

function togglePreview(element) {
    //pego o dado se ele foi clicado ou nao (inicial é true)
    let clicked = element.getAttribute('data-clicked') || 'true';

    //criei um metodo para pegar o 'note' do bloco dele
    let note = getMyNote(element);

    //faço a mudança com base no valor do clicked
    //usei uma varial de estados para eliminar os ifs
    note.setAttribute('style', toggleValues[clicked]['note-style']);
    element.innerHTML = toggleValues[clicked]['element-html'];

    //seto o estado do botão com o contrario do que está atualmente
    element.setAttribute('data-clicked', !(clicked == 'true'));
}

//funcao responsavel por pegar o 'note' do bloco do preview
function getMyNote(element) {
    //subo até o nivel do bloco e pego o proximo que é o bookmark onde contem o 'note'
    //acho meio gambiarra mas é o que temos para agora
    let bookmark = element.parentElement.parentElement.nextElementSibling;

    //passo por cada filho do bookmark até achar o 'note' e devolvo ele
    for (let node of bookmark.childNodes) {
        if (node.className == 'note')
            return node;
    }
}

//os valores para quando o botao for clicado e nao clicado
const toggleValues = {
    'true': {
        'note-style': 'white-space: pre-line',
        'element-html': '<i class="fa fa-eye-slash" id="fa-eye"></i>'
    },
    'false': {
        'note-style': 'white-space: nowrap',
        'element-html': '<i class="fa fa-eye" id="fa-eye"></i>'
    }
}