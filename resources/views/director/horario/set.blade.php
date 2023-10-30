@extends('layouts.ace',['title'=>'Director | Horario','headertitle'=>'Home','viewtitle'=>'Panel Principal','page'=>'Home'])

@section('logo')
@component('components.logo',['app_name'=>'School','href_logo'=>route('home')])
@endcomponent
@endsection 

@section('navbar-menu')
@component('components.director.navbar-menu')
@endcomponent
@endsection

@section('sidebar')
@component('components.sidebar')
@section('sidebar-menu')
@component('components.director.sidebar-menu') 
@endcomponent
@endsection
@endcomponent
@endsection

@section('page-name')
@component('components.page-name',['subpage_name'=>'Cursos'])
@slot('page_name')
Horario {{$seccion->datosGrado->nombre  ."° " .$seccion->letra}}
    {{$seccion->datosGrado->datosNivel->nombre}}
@endslot
@slot('subpage_name')
 
        Asignar
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
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
    <div class="d-none alert bgc-default-l3 brc-primary-m3 mx-3" role="alert">
        Touch a date slot and hold down to add a new event
    </div>
    <div class="row">
        <div class="col-12 col-md-9" id="calendar-container">
            <div class="text-blue-d1" id="calendar">
            </div>
        </div>
        <div class="col-12 col-md-3 mt-1 mt-md-0" id="external-events">
            <p class="text-120 text-primary-m1">
                Cursos
            </p>
            @foreach ($seccion->cursos as $curso)
       @if ($curso->docente)
            <div class="fc-event badge badge-primary {{ $colors[$loop->index] }} border-0 py-2 text-90 mb-1 radius-2px" data-class="{{ $colors[$loop->index] }} text-white text-95" data-secciondoc="{{ $curso->id }}">
                {{$curso->cursoinfo->datosCurso->nombre}}
            </div>
            @endif
    
        @endforeach
            <label class="mt-2 d-none">
                <input class="mr-1" id="drop-remove" type="checkbox"/>
                Remove after drop
            </label>
        </div>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thin-border-bottom">
            <tr>
                <th>
                    <i class="ace-icon fa fa-caret-right blue">
                    </i>
                    Curso
                </th>
                <th>
                    <i class="ace-icon fa fa-caret-right blue">
                    </i>
                    Docente
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($seccion->cursos as $curso)
            <tr>
                <td>
                    {{$curso->cursoinfo->datosCurso->nombre}}
                </td>
                <td>
                    <b class="green">
                        @if($curso->docenteinfo)
                        <div class="name">
                            <a href="#">
                                {{$curso->docenteinfo->persona->nombres}} {{$curso->docenteinfo->persona->apellidos}}
                            </a>
                        </div>
                        @endif
                    </b>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
    var Draggable = FullCalendarInteraction.Draggable;
    // initialize the external events
    new Draggable(document.getElementById('external-events'), {
        itemSelector: '.fc-event',
        longPressDelay: 45,
        locale: 'es',
        eventData: function(eventEl) {

          //console.log(eventEl.getAttribute('data-secciondoc'));
            return {
                title: eventEl.innerText,
                classNames: eventEl.getAttribute('data-class').split(' '),
                extendedProps:{
                  secciondoc:eventEl.getAttribute('data-secciondoc')
                }
               
            };


        }
    });
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
    var date = new Date();
    var m = date.getMonth();
    var y = date.getFullYear();
    var day1 = Math.random() * 20 + 2;
    var day2 = Math.random() * 25 + 1;
    // initialize the calendar
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
     events: '{{route('Director.Horario.Show',['id'=>$seccion->id])}}',
        selectable: true,
        selectHelper: true,
        selectLongPressDelay: 200,
        select: function(date) {
         /*   bootbox.prompt("New Event Title:", function(title) {
                if (title !== null) {
                    calendar.addEvent({
                        title: title ,
                        start: date.start,
                        end: date.end,
                        allDay: date.allDay,
                        classNames: ['text-95', 'bgc-info', 'text-white']
                    });
                }
            });*/
        },
        editable: true,
        droppable: true,

        drop: function(info) {

            // is the "remove after drop" checkbox checked?
            if (document.getElementById('drop-remove').checked) {
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        },
/*eventDragStart:function (argument) {
  alert('draggin');
},*/
eventDrop:function (event) {
updateHorario(event);
},
eventRender: function(event) { 
 

     
},


eventReceive:function (event) {

  saveHorario(event);
  
},
eventDidMount:function(info){
  alert();
},
eventWillUnmount:function (argument) {
  alert();
},
/*eventResizeStart:function (argument) {
  alert('resize');
},*/
  eventResize:function (event) {
resizeHorario(event);
  

},
/*eventResizeStop:function (event) {
resizeHorario(event);
  

},*/
  
eventLeave:function (argument) {
  alert('draggin');
},
       eventDidMount:function (info) {
          console.log(info.event);
        },
        eventAdd:function (info) {
          alert('addgin');
        },
        

         eventDidMount: function(info) {
    console.log(info.event.extendedProps);
    // {description: "Lecture", department: "BioChemistry"}
  },

  eventsSet:function (argument) {
    alert('a');
  },
        eventClick: function(info) {

          console.log(info.event.extendedProps.urlUpdate);
            //display a modal
            var modal = '<div class="modal fade">\
        <div class="modal-dialog">\
         <div class="modal-content">\
          <div class="modal-header">\
            <h5 class="modal-title">Editar</h5>\
            <button type="button" class="close" data-dismiss="modal">&times;</button>\
          </div>\
          <div class="modal-body">\
            <form class="m-0">\
              <div class="input-group">\
                  <div class="input-groupp-repend align-self-center mr-2">\
                    ' + info.event.title + '\
                  </div>\
                  <input class="form-control d-none" autocomplete="off" type="text" value="" />\
                  <div class="input-group-append">\
                    <button type="button" class="btn btn-sm btn-outline-danger btn-bold ml-2px" data-action="delete"><i class="far fa-trash-alt text-120"></i></button>\
                  </div>\
              </div>\
            </form>\
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
        var myTable;
  var routeUpdate;        
jQuery(function($) {


      
       $('#menu-horario').addClass('active open');
  $('#menu-horario').children('.submenu').addClass('show');
  $('#menu-horario-main').addClass('active open');  
  $('#menu-horario-main').children('.submenu').addClass('show');
  $('#menu-horario-asignar-edit').addClass('active').removeClass('d-none'); 

$(document).ready(function() {

gethorario($("#nivel").val());

         });



@component('components.js.validate-form')
    @slot('formId')
      '#form-create'
    @endslot
      
      @slot('rules')
curso: {
  required: true

  },
value: {
  required: true

  },
  dia:{
  required: true  
  }
  @endslot

  

       @slot('submitHandler')
      var formData = new FormData($("#form-create")[0]);

    @component('components.js.ajax')
    
        @slot('url')
        '{{ route("Director.Horario.Store") }}'
      @endslot
          @slot('data')
        formData
      @endslot

          @slot('beforeSend')
            $('#Widget-create').aceWidget('startLoading');
        
          @endslot

      @slot('success')
        //gethorario();

      
        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
        @endslot
        @slot('error')
            Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 2500
})
        @endslot
       @slot('complete')
        $('#Widget-create').aceWidget('stopLoading');
        @endslot

    @endcomponent
  
    @endslot

  @endcomponent


  




      })




  function gethorario() {

$('#horaslist').html('');
      $.ajax({
    url:'{{route('Director.Horario.Show',['id'=>$seccion->id])}}',
    
    dataType:'text',
      beforeSend: function(){ 
     $('#table').aceWidget('startLoading');



    },
  
    success:function(msg) {

            
       $('#horaslist').html(msg);
$('#table').aceWidget('stopLoading');

    } ,

    error : function(xhr, status) {
    }
    });
  }


function saveHorario(event) {
  
token=$("#token").val();
      $.ajax({
    url:'{{ route("Director.Horario.Store") }}',
    type:'post',
    data:{"start":event.event.start.toISOString(),"end":event.event.end.toISOString(),"secciondoc":event.event.extendedProps.secciondoc,"color":event.event.classNames,_token:token},
    dataType:'json',
    success:function(message) {
    
   calendar.refetchEvents();
   event.event.remove();

        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})

    } ,

    error : function(message) {
       Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 6500
})
         calendar.refetchEvents();
   event.event.remove();
    }
    });
  }

  function updateHorario(event) {
  
token=$("#token").val();
      $.ajax({
    url:event.event.extendedProps.urlUpdate,
    type:'post',
    data:{'id':event.event.id,"start":event.event.start.toISOString(),"end":event.event.end.toISOString(),"color":event.event.classNames,_token:token,_method:'PUT'},
    dataType:'json',
    success:function(message) {
    
   calendar.refetchEvents();
   event.event.remove();

        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})

    } ,

    error : function(message) {
       Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 6500
})

         calendar.refetchEvents();
   event.event.remove();
    }
    });
  }


  function resizeHorario(event) {
  
token=$("#token").val();
      $.ajax({
    url:event.event.extendedProps.urlResize,
    type:'post',
    data:{'id':event.event.id,"start":event.event.start.toISOString(),"end":event.event.end.toISOString(),"color":event.event.classNames,_token:token},
    dataType:'json',
    success:function(message) {
    
   calendar.refetchEvents();
   event.event.remove();

        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})

    } ,

    error : function(message) {
       Swal.fire({
  icon: 'warning',
  title: message.responseJSON.message,
  showConfirmButton: false,
  timer: 6500
})

         calendar.refetchEvents();
   event.event.remove();
    }
    });
  }

  function destroyHorario(event) {
    
token=$("#token").val();
      $.ajax({
    url:event.event.extendedProps.urlDelete,
    type:'post',
    data:{"_token":token,"_method":"DELETE"},
    dataType:'json',
  
    success:function(message) {
   calendar.refetchEvents();
   event.event.remove();

        Swal.fire({
  icon: 'success',
  title: message.message,
  showConfirmButton: false,
  timer: 2500
})
        


    } ,

    error : function(msg) {
      
    }
    });
  }
    </script>
    @stop
</input>