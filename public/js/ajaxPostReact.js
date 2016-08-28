
function ajaxPostReact(url, encodedata, reactThis, success)
{
	jQuery.ajax({
		type:"POST",
		url:url,
		data :encodedata,
		dataType:"json",
		cache:false,
		timeout:50000,
		beforeSend :function(data) 
		{ 

		}.bind(this),
			success:function(data){
			success.call(this, data);
		}.bind(this),
		error:function(data){
			console.log(data)
		}.bind(this)
	});
}

