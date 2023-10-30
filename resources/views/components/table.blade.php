  
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
		<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header btn-inverse">
		{{$title}}
		</div>
		<div>
		<table id="{{$id ?? 'dynamic-table'}}" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
				{{$slot}}
				</tr>
			</thead>
		</table>
		</div>
	</div>
</div>