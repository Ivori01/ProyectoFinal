@extends('layouts.ace',['title'=>'Docente | Horario'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 

@section('navbar-menu')
@component('components.docente.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.docente.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
ver
@endslot
@slot('subpage_name')
 
      Horario
@endslot
@endcomponent
@endsection

@section('linksAfterAce')
<link href="{{ asset('assets/js/@fullcalendar/core/main.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/js/@fullcalendar/daygrid/main.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/js/@fullcalendar/timegrid/main.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('head')


@endsection
   

@section('content')
<div class="row mt-0">
    <div class="col-12 " id="calendar-container">
        <div class="text-blue-d1" id="calendar">
        </div>
    </div>
</div>
@stop


@section('footer')
@component('components.footer')
@endcomponent
@endsection
@section('script')
<script src="{{ asset('assets/js/moment.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/additional-methods.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-maxlength.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/autosize.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap-table-es-CL.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/@fullcalendar/core/main.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/@fullcalendar/interaction/main.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/@fullcalendar/daygrid/main.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/@fullcalendar/timegrid/main.js')}}" type="text/javascript">
</script>

<script type="text/javascript">
    var calendar;
    jQuery(function($) {
    if (!window.Intl) {
        console.log("Calendar can't be displayed because your browser doesn's support `Intl`. You may use a polyfill!");
        return;
    }
    var Calendar = FullCalendar.Calendar;

    if ('ontouchstart' in window) {
        $('.alert').removeClass('d-none')
    }
    var CustomTheme = FullCalendar.Theme;
    CustomTheme.prototype.classes = {
        widget: 'fc-bootstrap',
        tableGrid: 'table-bordered text-secondary-m1',
        tableList: 'table text-dark-tp4',
        tableListHeading: 'table-active ',
        buttonGroup: 'btn-group',
        button: 'btn btn-lighter-grey btn-h-lighter-blue btn-a-blue',
        buttonActive: 'active',
       // today: 'bgc-yellow-l1',
        popover: 'card card-primary',
        popoverHeader: 'card-header',
        popoverContent: 'card-body',
        // day grid
        // for left/right border color when border is inset from edges (all-day in timeGrid view)
        // avoid `table` class b/c don't want margins/padding/structure. only border color.
        headerRow: 'table-bordered bgc-primary-l4',
        dayRow: 'table-bordered',
        // list view
        listView: 'card card-primary'
    };
    CustomTheme.prototype.baseIconClass = 'fa';
    CustomTheme.prototype.iconClasses = {
        close: 'fa-times',
        prev: 'fa-chevron-left',
        next: 'fa-chevron-right',
        prevYear: 'fa-angle-double-left',
        nextYear: 'fa-angle-double-right'
    };
    CustomTheme.prototype.iconOverrideOption = 'FontAwesome';
    CustomTheme.prototype.iconOverrideCustomButtonOption = 'FontAwesome';
    CustomTheme.prototype.iconOverridePrefix = 'fa-';
    var CustomThemePlugin = FullCalendar.createPlugin({
        themeClasses: {
            customTheme: CustomTheme
        }
    });
    //for some random events to be added
  
     calendar = new Calendar(document.getElementById('calendar'), {
        plugins: ['interaction', 'dayGrid', 'timeGrid'],
        firstDay:1,
        columnHeaderFormat:{ weekday: 'long' },
       timeZone: 'UTC',
        slotDuration:'00:15:00',
         height: 830,
        defaultTimedEventDuration:  '00:45:00',
        defaultDate: "2020-08-17",
        forceEventDuration: true,
        eventOverlap:false,
        displayEventEnd:false,
        displayEventTime:false,
   allDaySlot:false,
   scrollTime:'7:00:00',
   eventContent: 'some text',

  slotLabelFormat: {
  hour: 'numeric',
  minute: '2-digit',
 
  meridiem: 'short'
},

slotLabelFormat: [
  { hour: 'numeric',
  minute: '2-digit',
  //hour12:true,
  meridiem: 'short'
  }, // top level of text
  
],
        businessHours: {
  // days of week. an array of zero-based day of week integers (0=Sunday)
  daysOfWeek: [ 1, 2, 3, 4,5], // Monday - Thursday
  startTime: '7:00', // a start time (10am in this example)
  endTime: '15:00', // an end time (6pm in this example)
},
        defaultView: 'timeGridWeek',
        header: {
            left: '',
            center: '',
            right: ''
        },
 locale: 'es',
 eventTimeFormat:{
  hour: 'numeric',
  minute: '2-digit',
  meridiem: 'short'
},
     events: [
@foreach ($horarios as $horario)

	{
         "id"           :"{{  $horario->idhorario }}" ,
                "title"    :      "{!! $horario->info->cursoInfo->datosCurso->nombre .'              ('.$horario->info->seccionInfo->datosGrado->numero.'° '.$horario->info->seccionInfo->letra.' '. $horario->info->seccionInfo->datosGrado->datosNivel->nombre.')'!!}",
                "start"    :      "{{ $datesForDay[$horario->dia] . ' ' . $horario->horainicio }}",
                "end"        :   "{{ $datesForDay[$horario->dia] . ' ' . $horario->horafin }}",
                "classNames"  :   "{{ $horario->color }}",
                "extendedProps": {
        'seccion': '{!! $horario->info->seccionInfo->datosGrado->nombre.$seccionRepo->letra($horario->info->seccionInfo->letra)!!}',
        'inicio':'{{ $horario->horainicio }}',
        'fin':'{{$horario->horafin }}',
        'dia':'{{ $dayForDay[$horario->dia] }}'
      }
     
    },

@endforeach
     ],
        selectable: true,
        selectHelper: true,
        selectLongPressDelay: 200,
         eventClick: function(info) {

          console.log(info.event.extendedProps.urlUpdate);
            //display a modal
            var tooltip = new Tooltip(info.el, {
          title: info.event.title,
          placement: 'top',
          trigger: 'hover',
          container: 'body'
        });
            var modal = '<div class="modal fade">\
        <div class="modal-dialog">\
         <div class="modal-content">\
          <div class="modal-header">\
            <h5 class="modal-title">Info</h5>\
            <button type="button" class="close" data-dismiss="modal">&times;</button>\
          </div>\
          <div class="modal-body">\
            <div class="alert alert-secondary bgc-default-l4 brc-secondary-m3" role="alert">\
                          <h5 class="alert-heading text-blue text-uppercase font-bolder">'+info.event.title+'</h5>\
                          <a href="#" class="alert-link text-secondary">'+info.event.extendedProps.seccion+'</a><span class="ml-3 align-self-center text-success-d2 text-110">('+info.event.extendedProps.dia+') ('+info.event.extendedProps.inicio+' - '+info.event.extendedProps.fin+')</span> .\
                        </div>\
          </div>\
        </div>\
       </div>\
      </div>';
            var modal = $(modal).appendTo('body');
            modal.find('form').on('submit', function(ev) {
                ev.preventDefault();
                info.event.setProp('title', $(this).find("input[type=text]").val());
                modal.modal("hide");
            });
            modal.find('button[data-action=delete]').on('click', function() {
               // info.event.remove();
               console.log(info.event.title);
                 Swal.fire({
        title: 'Desea eliminar este registro ?',
        text: "La accion no se podra revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si,eliminar !',
    }).then((result) => {
       destroyHorario(info);
    })
                modal.modal("hide");
            });
            modal.modal('show').on('hidden.bs.modal', function() {
                modal.remove();
            });
        }


    });
    calendar.pluginSystem.add(CustomThemePlugin);
    calendar.setOption('themeSystem', 'customTheme');
    calendar.render();
});
</script>
<script type="text/javascript">
    jQuery(function($) {

	$('#menu-horario').addClass('active');		
	
			})
</script>
@stop
