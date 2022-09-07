function confirmacion(e){

    if (confirm("¿Está seguro que desea eliminar este registro?")){
    return true;
}else{
    e.preventDefault();
}}
let linkDelete=document.querySelectorAll('.confirmarEliminar');
for(var i = 0; i<linkDelete.length;i++){
    linkDelete[i].addEventListener('click', confirmacion);
};

function confirmacion(e){

    if (confirm("¿Está seguro que desea editar este registro?")){
    return true;
}else{
    e.preventDefault();
}}
let linkEdit=document.querySelectorAll('.confirmarEditar');
for(var i = 0; i<linkEdit.length;i++){
    linkEdit[i].addEventListener('click', confirmacion);
};



$(document).ready(function () {
    $('#convocatoriasTable').DataTable({
        order: [[0, "desc"]],
        language:{
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrada de _MAX_ registros)",
                        "loadingRecords": "Cargando...",
                        "processing":     "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords":    "No se encontraron registros coincidentes",
                        "paginate": {
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        },                  
                    }
    });
});
const preliminar=document.querySelectorAll('.preliminar')

const pdf=document.querySelectorAll('.pdfs');

for (var i = 0; i <pdf.length; i++) {
    let hijos=pdf[i].children
    
    if(hijos.length==2){
        preliminar[i].innerHTML="PRELIMINAR"
        console.log(hijos)
    }
    

}

