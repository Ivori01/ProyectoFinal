jQuery.validator.addMethod("{{$MethodName}}", function (value, element) {

      var result;
      token=$("#token").val();
      $.ajax({
            url:"{{$RutaCheck}}",
            type: 'post',
            data: {!!$data !!},
            datatype: "json",
            async: false,
            success: function(data){
                  result = JSON.parse(data);   
                  {!! $ActionSuccess ?? '' !!}       
            }
      });


      return result;

}, '{!! $message ?? 'Numero de Documento Duplicado' !!}' ); 