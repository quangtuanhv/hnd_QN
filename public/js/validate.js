$('#name').on('blur',function (event) {
	event.preventDefault();
	var url = ('/');
	var name = $(this).val();
	$.ajax({
type:'post',
url:url,
data:{'name':name},
success:function(data){
if (data) {
	Materialize.toast(data,4000,'red');
$("#login_name_error").html(data);
$('#login_button').prop('disabled',true);	

}else {
$('#login_button').prop('disabled',false);	
}
}
	});
});