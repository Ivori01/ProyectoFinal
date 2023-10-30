var $invalidClass = 'brc-danger-tp2';
          var $validClass = 'brc-info-tp2';
    $({{$formId}}).validate({
            errorElement: 'span',
            errorClass: 'form-text form-error text-danger-m2',
            focusInvalid: true,
            ignore: "",
            {{ $opts ?? '' }}
            rules: {
         {{ $rules }}
            },

            messages: {
        {{ $messages ?? '' }}
            },


            highlight: function(element) {
              var $element = $(element);

              //remove error messages to be inserted again, so that the .fa-exclamation-circle is inserted in `errorPlacement` function
              $element.closest('.form-group').find('.form-text').remove();

              if ($element.is('input[type=checkbox]') || $element.is('input[type=radio]')) return;

              else if ($element.is('.select2')) {
                var container = $element.siblings('[class*="select2-container"]');
                container.find('.select2-selection').addClass($invalidClass);
              } else if ($element.is('.chosen')) {
                var container = $element.siblings('[class*="chosen-container"]');
                container.find('.chosen-choices, .chosen-single').addClass($invalidClass);
              } else {
                $element.addClass($invalidClass + ' d-inline-block').removeClass($validClass);
              }
            },

            success: function(error, element) {
              var parent = error.parent();
              var $element = $(element);

              $element.removeClass($invalidClass)
                .closest('.form-group').find('.form-text').remove();

              if ($element.is('input[type=checkbox]') || $element.is('input[type=radio]')) return;

              else if ($element.is('.select2')) {
                var container = $element.siblings('[class*="select2-container"]');
                container.find('.select2-selection').removeClass($invalidClass);
              } else if ($element.is('.chosen')) {
                var container = $element.siblings('[class*="chosen-container"]');
                container.find('.chosen-choices, .chosen-single').removeClass($invalidClass);
              } else {
                $element.addClass($validClass + ' d-inline-block');
              }

              //append 'ok' mark
              {!! $showSuccess ?? " parent.append('<span class=".'"'."form-text d-inline-block ml-sm-2".'"'.'><i class=" fa fa-check text-success-m1 text-120"></i></span>'."');" !!}

            },

            errorPlacement: function(error, element) {
              //prepend 'x' mark
              error.prepend('<i class="form-text fa fa-exclamation-circle text-danger-m1 text-100 mr-1 ml-2"></i>');

              if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                element.closest('div[class*="col-"]').append(error);
              } else if (element.is('.select2')) {
                var container = element.siblings('[class*="select2-container"]');
                error.insertAfter(container);
                container.find('.select2-selection').addClass($invalidClass);
              } else if (element.is('.chosen')) {
                var container = element.siblings('[class*="chosen-container"]');
                error.insertAfter(container);
                container.find('.chosen-choices, .chosen-single').addClass($invalidClass);
              } else {
                error.addClass('d-inline-block').insertAfter(element);
              }
            },

            submitHandler: function(form) {
{{ $submitHandler }}
            },
            invalidHandler: function(form) {}
          });
