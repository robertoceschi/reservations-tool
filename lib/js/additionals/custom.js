/************************
 Pickers
 *************************/
$("#datepicker").datepicker({dateFormat: "yy-mm-dd"});
$("#datepicker2").datepicker({dateFormat: "yy-mm-dd"});
$("#cp").colorpicker({format: 'hex'});
$('#tp1').timepicker({
    defaultTime: '09:00 AM',
    minuteStep: 30,
    disableFocus: true,
    showMeridian: false,
    template: 'dropdown'

});
$('#tp2').timepicker({
    defaultTime: '10:00 AM',
    minuteStep: 30,
    disableFocus: true,
    showMeridian: false,
    template: 'dropdown'
});

/************************
 Validation
 *************************/
$("#add_event").validationEngine({promptPosition : "topLeft", scroll: true});
