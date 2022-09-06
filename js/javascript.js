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
/*let count=0;
for(pdfs of pdf){
    const hijos=pdfs.children;
    if(hijos.length==2){
        console.log(hijos)
        preliminar[count].innerHTML="preliminar"
        count++
    }

    
}*/
/*const hijos=pdf[0].children;
console.log()
*/