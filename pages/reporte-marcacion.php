<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">


<div class="row">
  
<div class="col-md-12">
 
 
    <div class="table-responsive">
      <table id="consulta"  class="table table-hover table-condensend" style="font-size: 12px">
        <thead>
          <tr class="table-active">
          
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Cargo</th>
          <th>Dni</th>
          <th>Empresa</th>
          <th>Hora</th>
          <th>Fecha</th>
              

                      
          </tr>
        </thead>
      </table>
     </div>

</div>

</div>

<script>
  
function loadData()
{

 $(document).ready(function (){

//$("#consulta").dataTable().fnDestroy();
$('#consulta').dataTable({

 //"order": [[ 4, "desc" ]],
 dom: 'lBfrtip',
 buttons: [
 
{
extend:    'excelHtml5',
text:      '<i class="fa fa-file-excel-o text-success"></i>',
titleAttr: 'Exportar en documento Excel',
title    :  'Marcaciones'
},
{
extend:    'print',
text:      '<i class="fa fa-print"></i>',
titleAttr: 'Imprimir Documento',
title    :  'Marcaciones'
},
{
extend:    'pdfHtml5',
text:      '<i class="fa fa-file-pdf-o"></i>',
titleAttr: 'Exporta en Documento PDF',
orientation: 'letter',
pageSize: 'LEGAL',
title    :  'Marcaciones'
}






 ],
"destroy":true,
 "deferRender": true,
"bAutoWidth": false,
"iDisplayLength": 25,
"language": {
"url": "assets/js/spanish.json"
},
"bProcessing": true,
"sAjaxSource": "sources/marcacion?op=2",
"aoColumns": [

{ mData: 'nombres'},
{ mData: 'apellidos'},
{ mData: 'cargo'},
{ mData: 'dni'},
{ mData: 'empresa'},
{ mData: 'hora'},
{ mData: 'fecha'}






]

});

 });

}
//Cargar Data
loadData();



</script>