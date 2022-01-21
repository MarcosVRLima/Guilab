//Sidenav
$(document).ready(function(){
    $('.sidenav').sidenav();
});

//carousel
$(document).ready(function(){
    $('.carousel.carousel-slider').carousel({
        shift: -150,
        duration: 300,
        fullWidth: true,
        indicators: true
    });
    setInterval(function(){
        $('.carousel').carousel('next');
    }, 15000);
});

//pushpin
$(function(){
    $(window).scroll(function(){
    if ($(this).scrollTop() < 255)
        {
            $('#navbarFixed').addClass('hide', 500);
        } else {
            $('#navbarFixed').removeClass('hide', 500); 
        }
    });
});

//Preloader cadastrar ou login
$(document).ready(function(){
    $("#idCadastraUsuario").click(function(){
        if($("nomeCadId").val() != null && $("matriculaCadId").val() != null && $("emailCadId").val() != null){     
            $("#preloaderProgress").fadeIn();
        }
    });
}); 
// abrir e fechar div para mensagens
$(document).ready(function(){
    $("#fechar").click(function(){
        $("#fecharDiv").fadeOut();
    });
    $("#abrir").click(function(){
        $("#fecharDiv").fadeIn();
    });
});
//funções para a página cadastrar senha
$(function(){
    $("#senha1Id").complexify({}, function (valid, complexity) {
        $("#progressbarId").fadeIn();
        $("#progressCadId").css( "width", complexity+"%");

    });
    $("#senha2Id").keyup(function(){
        var senha1 = $("#senha1Id").val();
        var senha2 = $("#senha2Id").val();
        if(senha1 == senha2){
            $("#pCompara").html("As senhas são iguais").css( "color", "#21633a");
            $("#cadNovaSenha").removeAttr("disabled", "disabled");
        }else{
            $("#pCompara").html("As senhas são diferentes").css( "color", "#ffc946");
            $("#cadNovaSenha").attr("disabled", "disabled");
        }
    });
});

//select
$(document).ready(function(){
    $('select').formSelect();
});

//tabs (na parte de login)
$(document).ready(function(){
    $('.tabs').tabs();
});

//datapicker
$(document).ready(function(){
    var data = new Date;
    data.setDate(data.getDate() + 1);
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",  
        minDate: data,
        disableWeekends: true,
        i18n:{
            months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            weekdaysShort: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            weekdaysAbbrev:	['D','S','T','Q','Q','S','S'],
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Pronto',
            labelMonthNext: 'Próximo mês',
            labelMonthPrev: 'Mês anterior',
            labelMonthSelect: 'Selecione um mês',
            labelYearSelect: 'Selecione um ano',
            selectMonths: true,
            selectYears: 15,
            cancel: 'Cancelar',
            clear: 'Limpar'
        }
    });
});

//datapicker para buscar agendadmentos
$(document).ready(function(){
  $('.datepickerAgendado').datepicker({
      format: "dd/mm/yyyy",
      disableWeekends: true,
      i18n:{
          months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
          weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
          weekdaysShort: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
          weekdaysAbbrev:	['D','S','T','Q','Q','S','S'],
          today: 'Hoje',
          clear: 'Limpar',
          close: 'Pronto',
          labelMonthNext: 'Próximo mês',
          labelMonthPrev: 'Mês anterior',
          labelMonthSelect: 'Selecione um mês',
          labelYearSelect: 'Selecione um ano',
          selectMonths: true,
          selectYears: 15,
          cancel: 'Cancelar',
          clear: 'Limpar'
      }
  });
});

//timepicker

$(document).ready(function(){
    $('.timepicker').timepicker({
        i18n: {
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok'
        },
        twelveHour : false, // twelve hours, use AM/PM
        autoclose: false  //Close the timepicker automatically after select time
    });
});

//modal
$(document).ready(function(){
    $('.modal').modal();
  });

//contador de caracteres para matricula
$(document).ready(function() {
    $('input#matriculaId').characterCounter();
});

// DATA TABLES CONFIGURE

(function(window, document, undefined) {

    var factory = function($, DataTable) {
      "use strict";
  
      $('.search-toggle').click(function() {
        if ($('.hiddensearch').css('display') == 'none')
          $('.hiddensearch').slideDown();
        else
          $('.hiddensearch').slideUp();
      });
  
      /* Set the defaults for DataTables initialisation */
      $.extend(true, DataTable.defaults, {
        dom: "<'hiddensearch'f'>" +
          "tr" +
          "<'table-footer'lip'>",
        renderer: 'material'
      });
  
      /* Default class modification */
      $.extend(DataTable.ext.classes, {
        sWrapper: "dataTables_wrapper",
        sFilterInput: "form-control input-sm",
        sLengthSelect: "form-control input-sm"
      });
  
      /* Bootstrap paging button renderer */
      DataTable.ext.renderer.pageButton.material = function(settings, host, idx, buttons, page, pages) {
        var api = new DataTable.Api(settings);
        var classes = settings.oClasses;
        var lang = settings.oLanguage.oPaginate;
        var btnDisplay, btnClass, counter = 0;
  
        var attach = function(container, buttons) {
          var i, ien, node, button;
          var clickHandler = function(e) {
            e.preventDefault();
            if (!$(e.currentTarget).hasClass('disabled')) {
              api.page(e.data.action).draw(false);
            }
          };
  
          for (i = 0, ien = buttons.length; i < ien; i++) {
            button = buttons[i];
  
            if ($.isArray(button)) {
              attach(container, button);
            } else {
              btnDisplay = '';
              btnClass = '';
  
              switch (button) {
  
                case 'first':
                  btnDisplay = lang.sFirst;
                  btnClass = button + (page > 0 ?
                    '' : ' disabled');
                  break;
  
                case 'previous':
                  btnDisplay = '<i class="material-icons">chevron_left</i>';
                  btnClass = button + (page > 0 ?
                    '' : ' disabled');
                  break;
  
                case 'next':
                  btnDisplay = '<i class="material-icons">chevron_right</i>';
                  btnClass = button + (page < pages - 1 ?
                    '' : ' disabled');
                  break;
  
                case 'last':
                  btnDisplay = lang.sLast;
                  btnClass = button + (page < pages - 1 ?
                    '' : ' disabled');
                  break;
  
              }
  
              if (btnDisplay) {
                node = $('<li>', {
                    'class': classes.sPageButton + ' ' + btnClass,
                    'id': idx === 0 && typeof button === 'string' ?
                      settings.sTableId + '_' + button : null
                  })
                  .append($('<a>', {
                      'href': '#',
                      'aria-controls': settings.sTableId,
                      'data-dt-idx': counter,
                      'tabindex': settings.iTabIndex
                    })
                    .html(btnDisplay)
                  )
                  .appendTo(container);
  
                settings.oApi._fnBindAction(
                  node, {
                    action: button
                  }, clickHandler
                );
  
                counter++;
              }
            }
          }
        };
  
        // IE9 throws an 'unknown error' if document.activeElement is used
        // inside an iframe or frame. 
        var activeEl;
  
        try {
          // Because this approach is destroying and recreating the paging
          // elements, focus is lost on the select button which is bad for
          // accessibility. So we want to restore focus once the draw has
          // completed
          activeEl = $(document.activeElement).data('dt-idx');
        } catch (e) {}
  
        attach(
          $(host).empty().html('<ul class="material-pagination"/>').children('ul'),
          buttons
        );
  
        if (activeEl) {
          $(host).find('[data-dt-idx=' + activeEl + ']').focus();
        }
      };
  
      /*
       * TableTools Bootstrap compatibility
       * Required TableTools 2.1+
       */
      if (DataTable.TableTools) {
        // Set the classes that TableTools uses to something suitable for Bootstrap
        $.extend(true, DataTable.TableTools.classes, {
          "container": "DTTT btn-group",
          "buttons": {
            "normal": "btn btn-default",
            "disabled": "disabled"
          },
          "collection": {
            "container": "DTTT_dropdown dropdown-menu",
            "buttons": {
              "normal": "",
              "disabled": "disabled"
            }
          },
          "print": {
            "info": "DTTT_print_info"
          },
          "select": {
            "row": "active"
          }
        });
  
        // Have the collection use a material compatible drop down
        $.extend(true, DataTable.TableTools.DEFAULTS.oTags, {
          "collection": {
            "container": "ul",
            "button": "li",
            "liner": "a"
          }
        });
      }
  
    }; // /factory
  
    // Define as an AMD module if possible
    if (typeof define === 'function' && define.amd) {
      define(['jquery', 'datatables'], factory);
    } else if (typeof exports === 'object') {
      // Node/CommonJS
      factory(require('jquery'), require('datatables'));
    } else if (jQuery) {
      // Otherwise simply initialise as normal, stopping multiple evaluation
      factory(jQuery, jQuery.fn.dataTable);
    }
  
  })(window, document);
  
  $(document).ready(function() {
    $('#datatable').dataTable({
      "oLanguage": {
        "sStripClasses": "",
        "sSearch": "",
        "sSearchPlaceholder": "Digite palavras chaves aqui",
        "sZeroRecords":  "Não foram encontrados resultados",
        "sInfoEmpty":    "0 - 0 de 0",
        "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
        "sInfo":         "_START_ - _END_ de _TOTAL_",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sPrevious": "Anterior",
            "sNext":     "Seguinte",
            "sLast":     "Último"
        },
        "sLengthMenu": '<span>Colunas por página:</span><select class="browser-default">' +
          '<option value="10">10</option>' +
          '<option value="20">20</option>' +
          '<option value="30">30</option>' +
          '<option value="40">40</option>' +
          '<option value="50">50</option>' +
          '<option value="-1">Todos</option>' +
          '</select></div>'
      },
      bAutoWidth: false
    });
  });