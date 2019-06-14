
var isChecked;

$('.radio label:not(.other)').click(function() {
	$(this).closest('.radio-options').find('.specific-other').val('').slideUp();
});

$('.radio .other').click(function() {
	$(this).next('.specific-other').slideDown();
});

$('.checkbox .other input').change(function() {
	isChecked = $(this).prop('checked');
	if ( ! isChecked ){
		$(this).parent().next('.specific-other').val('').slideUp();
	}
});

$('.radio .yes').click(function() {
	$(this).closest('.if-yes-no').next('.questions-group').slideDown();
});
$('.radio .no').click(function() {
	$(this).closest('.if-yes-no').next('.questions-group').slideUp();
});

$(document).ready(function(){
	$('.radio .other input:checked').parent().next('.specific-other').css('display', 'block');
    $('.radio .yes input:checked').closest('.if-yes-no').next('.questions-group').slideDown();
    $('.radio .if-no input:checked').closest('.if-yes-no').siblings('.if-no-group').slideDown();
    $('.radio .if-yes input:checked').closest('.if-yes-no').next('.questions-group').slideDown();
});


$('.radio .if-no').click(function() {
	$(this).closest('.if-yes-no').next('.questions-group').slideUp();
	$(this).closest('.if-yes-no').siblings('.if-no-group').slideDown();
});

$('.radio .if-yes').click(function() {
	$(this).closest('.if-yes-no').next('.questions-group').slideDown();
	$(this).closest('.if-yes-no').siblings('.if-no-group').slideUp();
});