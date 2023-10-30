$(document).ready(function() {

	{{$VarName ?? 'myTable'}}= $('#{{$idTable ?? 'dynamic-table'}}')
	.DataTable( {
		"language": {
			"url":"{{ asset('assets/js/languageDatable.txt')}}"
		},
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"sAjaxSource": "{{$route}}"	, 
		"aaSorting": [],
		"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		select: {
		    style: 'multi'
		}
	} )  ;

});
