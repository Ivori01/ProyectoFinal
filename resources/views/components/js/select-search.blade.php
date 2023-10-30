$("{{$name}}").select2({
	
width:'80%',
  allowClear:true,
ajax: {
     url: '{{$ruta}}',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used

      
      params.page = params.page || 1;

      return {
        results: data.data,
        data:data.data,
        pagination: {
          more: (params.page * 30) < data.total_count
        }
      };
    },
    cache: false

  },



  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1,
  templateResult: formatRepo,
  templateSelection: formatRepoSelection
});

function formatRepo (repo) {

  if (repo.loading) {
    return repo.nombres;
  } 

 

  var markup = '<div class="task-item mt-n1px border-1  brc-secondary-l1 p-2  text-95"> <div class="d-flex align-items-start"> <img src="{{ url(Storage::url('sistem/photos/'))}}'+'/'+repo.img+'" class="border-1 brc-success-m1 radius-round p-1px w-5 h-5 mr-2px"> <div class="mx-2"> <div class="font-bolder"> '+repo.text+' </div> '+repo.nrodocumento+' </div> <span class="text-90 text-secondary-m2 ml-auto text-nowrap"> . </span> </div> </div> '; return markup; }

  function formatRepoSelection (repo) {
  return repo.text || repo.nrodocumento;
}
