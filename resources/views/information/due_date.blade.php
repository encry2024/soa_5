<div class="field">
    <label>Down Payment Date</label>
    <div class="ui input left icon">
        <input name="due_1" class="datepicker_1" type="text" placeholder="Down Payment Date">
        <i class="calendar icon"></i>
    </div>
</div>

<div class="field">
    <label>2nd Payment *</label>
    <div class="ui left icon input">
        <input name="due_2" class="datepicker_2" type="text" placeholder="2nd Payment Date">
        <i class="calendar icon"></i>
    </div>
</div>

<div class="field">
    <label>3rd Payment *</label>
    <div class="ui left icon input">
        <input name="due_3" class="datepicker_3" type="text" placeholder="3rd Payment Date">
        <i class="calendar icon"></i>
    </div>
</div>

<div class="field">
    <label>4th Payment *</label>
    <div class="ui left icon input">
        <input name="due_4" class="datepicker_4" type="text" placeholder="4th Payment Date">
        <i class="calendar icon"></i>
    </div>
</div>

<div class="field">
    <label>5th Payment *</label>
    <div class="ui left icon input">
        <input name="due_5" class="datepicker_5" type="text" placeholder="5th Payment Date">
        <i class="calendar icon"></i>
    </div>
</div>
<button class="ui fluid button positive" type="submit"><i class="checkmark icon"></i> Set Due Date</button>

                    $('.datepicker_1').datepicker({
    format: "dd-MM-yyyy",
    autoclose: true,
    todayHighlight: 1,
    minView: 2,
    forceParse: 0,
    startDate: moment().format('DD-MMMM-YYYY')
});
$('.datepicker_2').datepicker({
    format: "dd-MM-yyyy",
    autoclose: true,
    todayHighlight: 1,
    minView: 2,
    forceParse: 0,
    startDate: moment().format('DD-MMMM-YYYY')
});
$('.datepicker_3').datepicker({
    format: "dd-MM-yyyy",
    autoclose: true,
    todayHighlight: 1,
    minView: 2,
    forceParse: 0,
    startDate: moment().format('DD-MMMM-YYYY')
});
$('.datepicker_4').datepicker({
    format: "dd-MM-yyyy",
    autoclose: true,
    todayHighlight: 1,
    minView: 2,
    forceParse: 0,
    startDate: moment().format('DD-MMMM-YYYY')
});
$('.datepicker_5').datepicker({
    format: "dd-MM-yyyy",
    autoclose: true,
    todayHighlight: moment(),
    minView: 2,
    forceParse: 0,
    startDate: moment().format('DD-MMMM-YYYY')
});

<form class="ui form" action="{{ route('information.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                </form>