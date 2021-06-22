<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
	// $.ajax({
	// 	type:'POST',
	// 	url:'/api/customers/',
	// 	data:{first_name: "Kieu", last_name: "Phong"},
	// 	success:function(response){
 //          // Log response
 //          console.log(response);
 //      }
 //  });
var data;
 $.ajax({
 	type:'POST',
 	url: '/api/customers',
 	data: {'first_name':'trong','last_name':'Peter'},
 	async: false,
 	success:function(response) {
 		//console.log(response);
 		data = response;
 	}
 });
 console.log(data);
</script>
