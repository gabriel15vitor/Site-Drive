<script src="scripts/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json>"></script>
<link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<script type="text/javascript">
	$(document).ready(function() {
        $('#admin').dataTable( {
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
			    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
			    "sInfoPostFix": "",
			    "sInfoThousands": ".",
			    "sLengthMenu": "Resultados por página: _MENU_",
			    "sLoadingRecords": "Carregando...",
			    "sProcessing": "Processando...",
			    "sZeroRecords": "Nenhum registro encontrado",
			    "sSearch": "Pesquisar: ",
			    "oPaginate": {
			        "sNext": " Próximo",
			        "sPrevious": "Anterior ",
			        "sFirst": "Primeiro",
			        "sLast": "Último"
			    },
			    "oAria": {
			        "sSortAscending": ": Ordenar colunas de forma ascendente",
			        "sSortDescending": ": Ordenar colunas de forma descendente"
			    },
			    "select": {
			        "rows": {
			            "_": "Selecionado %d linhas",
			            "0": "Nenhuma linha selecionada",
			            "1": "Selecionado 1 linha"
			        }
			    }
            }
        } );
    } );

    $(document).ready(function() {
        $('#user').dataTable( {
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
			    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
			    "sInfoPostFix": "",
			    "sInfoThousands": ".",
			    "sLengthMenu": "Resultados por página: _MENU_",
			    "sLoadingRecords": "Carregando...",
			    "sProcessing": "Processando...",
			    "sZeroRecords": "Nenhum registro encontrado",
			    "sSearch": "Pesquisar: ",
			    "oPaginate": {
			        "sNext": " Próximo",
			        "sPrevious": "Anterior ",
			        "sFirst": "Primeiro",
			        "sLast": "Último"
			    },
			    "oAria": {
			        "sSortAscending": ": Ordenar colunas de forma ascendente",
			        "sSortDescending": ": Ordenar colunas de forma descendente"
			    },
			    "select": {
			        "rows": {
			            "_": "Selecionado %d linhas",
			            "0": "Nenhuma linha selecionada",
			            "1": "Selecionado 1 linha"
			        }
			    }
            }
        } );
    } );
</script>