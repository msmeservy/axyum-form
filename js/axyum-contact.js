function submit_axyum_form()
{
	var fd = new FormData();
	fd.append('axyumContactSubmit', '1');
	fd.append('name', $("#your_name").val());
	fd.append('last', $("#your_last").val());
	fd.append('email', $("#your_email").val());
	fd.append('phone', $("#phone_number").val());
	fd.append('comments', $("#your_comments").val());
	
	if (!$("#your_name").val() || !$("#your_email").val()|| !$("#phone_number").val() || !$("#your_comments").val() ) {
			$('#response_div').html('At least one of the form fields is empty.');
			$("#response_div").css('background','rgba(255,24,0, .2)');
			$("#response_div").css('color','#000');
			$("#response_div").css('border','1px solid rgba(255,24,0, 1)');
			$("#response_div").css('padding','30px');
			$("#response_div").css('text-align','center');
			return false;
		} else if($("#your_last").val()) {
			$('#response_div').html('SPAMMER!');
			$("#response_div").css('background','rgba(255,24,0, .2)');
			$("#response_div").css('color','#000');
			$("#response_div").css('border','1px solid rgba(255,24,0, 1)');
			$("#response_div").css('padding','30px');
			$("#response_div").css('text-align','center');
			
		} else {
			

			js_submit(fd,submit_axyum_form_callback);
		}
}

function submit_axyum_form_callback(data)
{
	var jdata = JSON.parse(data);
		
	
	if(jdata.success == 1) {
		var mess = jdata.message;
		
		$("#response_div").html(mess);
		$("#response_div").css('background','rgba(0,238,56, .2)');
		$("#response_div").css('color','#000');
		$("#response_div").css('border','1px solid rgba(0,238,56, 1)');
		$("#response_div").css('padding','30px');
		$("#response_div").css('text-align','center');
	} 
}

function js_submit (fd,callback)
{
	var submitUrl = '/wp-content/plugins/axyum-form/process/';
	
	$.ajax({url: submitUrl,type:'post',data:fd,contentType:false,processData:false,success:function(response){ callback(response); },});
	
}