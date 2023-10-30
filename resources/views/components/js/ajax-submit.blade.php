		$.ajax({
		url:{{$rutaAjax}},
		type:"{!! $type ?? 'POST'!!}",
		data:{{$data ?? 'formData'}},
		cache:false,
		dataType:"{{$dataType ?? 'json'}}",
	 {{$procesData ?? 'processData:false,
		contentType:false,' }}
		beforeSend: function(){ 
		{{$beforeSendAjax ?? null}}
		},

		success: function(msg){  
         {{$successAjax}}

		},

		error : function(msg) {
	    {{$errorAjax ?? 'messageError(msg);'}}
		},
		complete : function(msg) {
		{{$completeAjax ?? null}}

		}

		});