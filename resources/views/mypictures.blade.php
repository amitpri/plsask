@extends('layouts.mr.manage')

@section('formname')

<h2>My Pictures</h2>

@stop

@section('breadcrump')

<a href="/mr/mypictures">My Pictures</a>

@stop

@section('content_pagejs')

  <script src="/admin/assets/vendor/autosize/autosize.js"></script>

@stop


@section('content_page')
  
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script> 
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">

 

<div id="mainprofile">

	<h4 class="mb-xlg">Main Profile Picture Upload</h4>							 	 
	<div class="container">
		<div class="panel panel-default"> 
		  <div class="panel-body">

		  	<div class="row">
		  		<div class="col-md-4 text-center">
					<div id="upload-demo2" style="width:350px"></div>
		  		</div>
		  		<div class="col-md-4" style="padding-top:30px;">
					<strong>Select Image:</strong>
					<br/>
					<input type="file" id="upload2">
					<br/>
					<button class="btn btn-success upload-result2">Upload Image</button>
					<a class="btn btn-success upload-result2" href="/profile">Done</a>
		  		</div>
		  		<meta name="csrf-token" content="{{ csrf_token()}}">
		  		<div class="col-md-4" style="">
					<div id="upload-demo-i2" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
		  		</div>
		  	</div>

		  </div>
		</div>
	</div>


</div>

	 <script type="text/javascript">
		$uploadCrop2 = $('#upload-demo2').croppie({
		    enableExif: true,
		    viewport: {
		        width: 200,
		        height: 200,
		        type: 'rectangle'
		    },
		    boundary: {
		        width: 300,
		        height: 300
		    }
		});

		$('#upload2').on('change', function () { 
			var reader2 = new FileReader();
		    reader2.onload = function (e) {
		    	$uploadCrop2.croppie('bind', {
		    		url: e.target.result
		    	}).then(function(){
		    		console.log('jQuery bind complete');
		    	});
		    	
		    }
		    reader2.readAsDataURL(this.files[0]);
		});

		$('.upload-result2').on('click', function (ev) {
			$uploadCrop2.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (resp) {

				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });
				$.ajax({
					url: "ajaxpro.php",
					type: "POST",
					data: {"image":resp, "userid":"{!! $loggedinid !!}", "email":"{!! $mrprofile->email !!}"}, 
					success: function (data) {
						html = '<img src="' + resp + '" />';
						$("#upload-demo-i2").html(html);
					}
				});
			});
		});

	</script> 
@stop
