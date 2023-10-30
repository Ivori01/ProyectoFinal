   $.ajax({
         url: {{ $url }},
            type: '{!! $type ?? 'post'!!}',
            data: {{ $data }},
              cache:false,
    dataType:'{!! $dataType ?? 'json' !!}',
   processData:false,
    contentType:false,
    beforeSend: function(){ 
   {{ $beforeSend ?? '' }}
    },
    success: function(message){  
        {{ $success ?? '' }}

    },

    error : function(message) {
      {{ $error ?? '' }}
    },
    complete : function(message) {
  {{ $complete ?? '' }}

    }

    });