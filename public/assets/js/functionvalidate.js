
function validateform(myform) {
	
	$(myform).validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: true,
				     ignore: "",
					rules: { 
                       
					 
					horainicio: {
							required: true
						},
						horafin:{
							required:true
						},
						descripcion:{
							required:true
						}

					},

					messages: {
				    nrodocumento: {
					
					remote: "Numero de Documento Duplicado"
				              }

				   

			            },
			
					
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
						var controls=$(e).closest('.form-group').find('span[class*="block"]');
						controls.html('<i class="ace-icon fa fa-times-circle bigger-200"></i>');
						
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-success');
						var controls=$(e).closest('.form-group').find('span[class*="block"]');
						controls.html('<i class="ace-icon fa fa-check-circle bigger-200"></i>');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
$.getScript(myscr, function(){
   alert("Archivo cargado!");
});
var formData = new FormData($("#form-update2")[0]);


		$.ajax({
			url:routeUpdate,
			type:'POST',
			data:formData,
			
			cache:false,
			dataType:'json',
			processData:false,
			contentType:false,

           		      beforeSend: function(){ 
                         $('#widget-update').widget_box('reload');
                        },

		success: function(msg){  
          $('#widget-update').trigger('reloaded.ace.widget');
        resetForm('#form-update2');
          $("#modal-update").modal('hide');
		myTable.ajax.reload();



                
             messageSucess(msg);
         




             },

             error : function(xhr, status,error) {
        messageError(msg);
    }
		});


					},
					invalidHandler: function (form) {
					}
				});
			
}