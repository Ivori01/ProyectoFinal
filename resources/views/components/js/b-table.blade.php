 {{$VarName ?? 'myTable'}} = $('#{{$idTable ?? 'dynamic-table'}}').bootstrapTable({
url:"{{$route}}",
      icons: {
          fullscreen: 'fa fa-expand'
      },
       locale:'es-CL',
      toolbar: "#table-toolbar",
      pageList:[10, 25, 50, 100, 200, 'all'],
      theadClasses: "bgc-white text-grey text-uppercase text-80",
      clickToSelect: true,
      checkboxHeader: true,
      search: true,
      searchAlign: "left",
      //showSearchButton: true,
      sortable: true,
      {{ $options ?? '' }}
      pagination: true,
      paginationLoop: false,
      buttonsClass: "outline-default btn-smd bgc-white btn-h-light-primary btn-a-outline-primary py-1",
      showFullscreen: true,
    });
  