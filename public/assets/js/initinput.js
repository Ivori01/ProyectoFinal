jQuery(function($) {
  $(".select2")
    .css("width", "80%")
    .select2({
      allowClear: true,
    })
    .on("change", function() {
      $(this)
        .closest("form")
        .validate()
        .element($(this));
    });
  /*$(".datetimepicker").datetimepicker({
          icons: {
                  time: 'far fa-clock text-success text-120',
                  date: 'far fa-calendar text-blue text-120',

                  up: 'fa fa-chevron-up text-secondary',
                  down: 'fa fa-chevron-down text-secondary',
                  previous: 'fa fa-chevron-left text-secondary',
                  next: 'fa fa-chevron-right text-secondary',

                  today: 'far fa-calendar-check text-purple-m1 text-120',
                  clear: 'fa fa-trash-alt text-orange-d1 text-120',
                  close: 'fa fa-times text-danger text-120'
                },
     toolbarPlacement: "top",

                allowInputToggle: true,
                // showClose: true,
                // showClear: true,
                showTodayButton: true,
      format: 'YYYY-MM-DD'
    });*/
  $(".datetimepicker").datetimepicker({
    icons: {
      time: "far fa-clock text-success text-120",
      date: "far fa-calendar text-blue text-120",
      up: "fa fa-chevron-up text-secondary",
      down: "fa fa-chevron-down text-secondary",
      previous: "fa fa-chevron-left text-secondary",
      next: "fa fa-chevron-right text-secondary",
      today: "far fa-calendar-check text-purple-m1 text-120",
      clear: "fa fa-trash-alt text-orange-d1 text-120",
      close: "fa fa-times text-danger text-120",
    },
    // sideBySide: true,
    toolbarPlacement: "top",
    allowInputToggle: true,
    // showClose: true,
    // showClear: true,
    showTodayButton: true,
    format: "L",
    format: "DD-MM-YYYY",
    //"format": "HH:mm:ss"
  });
  // this plugin was designed for BS3, so to make it work with BS4, the following piece of code is required
  $(".datetimepicker").on("dp.show", function() {
    $(".collapse.in").addClass("show");
    $(this)
      .find(".table-condensed")
      .addClass("table table-borderless");
    $(this)
      .find("[data-action][title]")
      .tooltip(); //enable tooltip
  });
  // now listen to the `.collapse` events inside this datetimepicker accordion (one `.collapse` is for timepicker, the other one is for datepicker)
  // then add or remove the old `in` BS3 class so the plugin works correctly
  $(document)
    .on(
      "show.bs.collapse",
      ".bootstrap-datetimepicker-widget .collapse",
      function() {
        $(this).addClass("in");
      }
    )
    .on(
      "hide.bs.collapse",
      ".bootstrap-datetimepicker-widget .collapse",
      function() {
        $(this).removeClass("in");
      }
    );
  //$.mask.definitions['~'] = '[+-]';
  //$("#form-field-mask-2").inputmask("(999) 999-9999");
  //$('#celular').inputmask('(999) 999-999');
  //$('#telefono').inputmask('999-999');
});
