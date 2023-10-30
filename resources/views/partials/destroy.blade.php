<div id="modal-destroy" class="modal ">
 <div class="modal-dialog" >
	<div class="widget-box widget-color-blue3" id="widget-destroy">
		<div class="widget-header">
			<h5 class="widget-title">Eliminar registro</h5>

			<div class="widget-toolbar">
				
				<a href="#" >
					<i class="ace-icon fa bigger-120 white"  data-dismiss="modal">X</i>
				</a>
			</div>
			
		</div>

		<div class="widget-body">
		<form class="form-horizontal" id="form-destroy" role="form" novalidate="novalidate" >
		<div class="widget-main">
        <input type="hidden" name="_method" value="DELETE">
		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

		     <div class="form-group">
				 <h3 class="text-danger" align="center"> ¿ Desea eliminar el Registro ?.</h3>			
			</div>
			 	
			 	
		</div>
	
		</form>
		<div class="widget-toolbox padding-8 clearfix">
		<button class="btn  btn-danger pull-left " data-dismiss="modal" >
			<i class="ace-icon fa fa-times"></i>
			<span class="bigger-110">Cancelar</span>
		</button>

		<button class="btn btn-success pull-right" id="btn-destroy">
			<span class="bigger-110">Aceptar</span>

			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
		</button>
		</div>
		</div>
	</div>
 </div>
</div>