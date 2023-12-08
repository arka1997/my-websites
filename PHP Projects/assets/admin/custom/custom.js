var BASE_URL = $('meta[name="base-url"]').attr('content');

// alert message before deleting destination  \\

function delete_modal(url){
	$('#delete_link').attr('href', url);
    $('#deleteModal').modal('show');
  }

$(document).ready(function () {
	bsCustomFileInput.init();



});

// siteseeing remove input boxes  \\
function DeleteEditSiteseeing(id) {
	$('#siteseeing' + id).remove();
}

function DeleteEditreview(id) {
	$('#review' + id).remove();
}

// <!-- page script -->
$(function () {
	$("#example1").DataTable({
		"responsive": true,
		"autoWidth": false,
	});
});

$(function () {
	// Summernote
	$('.textarea').summernote()
})

// ADD SLUGS FOR DESTINATION,AJAX CALL  \\
function create_slug(title, id = '') {

	$.ajax({
		type: "post",
		url: BASE_URL + "admin/destinations/ajax_create_slug",
		data: {
			title: title,
			id: id
		},
		success: function (response) {
			$('#slug').val(response);
		}
	});
}

//  ADD SLUGS FOR PACKAGE,AJAX CALL   \\
function create_package_slug(title, id = '') {

	$.ajax({
		type: "post",
		url: BASE_URL + "admin/packages/ajax_create_slug",
		data: {
			title: title,
			id: id
		},
		success: function (response) {
			$('#package_slug').val(response);
		}
	});
}

//  showing name of siteseeing in text box in model of siteseeing_list  \\
function siteseeing_id(bb) {
	var btn = $("#vc").val();
	// console.log(btn);
	var name = $("#siteseeing_name" + bb).val();
	var id = $("#siteseeing_id" + bb).val();
	$("#siteseeing_name").val(name);
	$("#siteseeing_id").val(id);
}

// <!-- add multiple tags -->
function addTags() {
	var SlRow = $('#SlRow').val();
	var NewSl = parseInt(SlRow) + 1;
	$('#SlRow').val(NewSl);
	var Appenddata = '<div class="row" id="tags' + NewSl + '">' +
		'<div class="col-lg-12">' +
		'<div class="row">' +
		'<div class="col-lg-5">' +
		'<div class="form-group">' +
		'<input type="text" class="form-control" id="tags' + NewSl + '" placeholder="Enter Tags' + NewSl + '" name="tags[]">' +
		'</div>' +
		'</div>' +
		'<div class="col-lg-5">' +
		'<div class="form-group">' +
		'<select class="form-control" name="status[]"> id="tags' + NewSl + '"' +
		'<option value="1">Active</option>' +
		'<option value="0">Deactive</option>' +
		'</select>' +
		'</div>' +
		'</div>' +
		'<div class="col-sm-2">' +
		'<a href="javascript:void(0)" onclick="DeleteTags(' + NewSl + ')" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete Row"><i class="fa fa-trash"></i></a>' +
		'</div>' +
		'</div>' +

		'</div>';

	$('#AppendData').append(Appenddata);
}

function DeleteTags(id) {
	$('#tags' + id).remove();
}

// <!-- adding more text boxes -->
function addMore() {
	var SlRow = $('#SlRow').val();
	var NewSl = parseInt(SlRow) + 1;
	$('#SlRow').val(NewSl);

	var Appenddata = '<div class="row" id="ColumnRow' + NewSl + '">' +
		'<div class="col-lg-5">' +
		'<div class="form-group">' +
		'<input type="text" class="form-control" id="siteseeing' + NewSl + '" placeholder="Enter Siteseeing Name' + NewSl + '" name="siteseeing[]">' +
		'</div>' +
		'</div>' +
		'<div class="col-sm-2">' +
		'<a href="javascript:void(0)" onclick="DeleteRow(' + NewSl + ')" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete Row"><i class="fa fa-trash"></i></a>' +
		'</div>' +
		'</div>';

	$('#AppendData').append(Appenddata);
}

function DeleteRow(id) {
	$('#ColumnRow' + id).remove();
}

// first star rating call for destination_add -> star_rating

$(function () {

	$.getScript(BASE_URL + '/assets/admin/theme/src/jquery.rateyo.js');

	var rating = 0;
	$(".counter").text(rating);

	$(".rateyo-readonly-widg").rateYo({
		rating: rating,
		numStars: 5,
		precision: 2,
		minValue: 1,
		maxValue: 5,
	}).on("rateyo.change", function (e, data) {
		$('.star_rating').val(data.rating);
	});
});

function addreview() {

	var SlRow = $('#SlRows').val();

	$.getScript(BASE_URL + '/assets/admin/theme/src/jquery.rateyo.js');
	var NewSl = parseInt(SlRow) + 1;
	$('#SlRows').val(NewSl);


	var Appendreview = '<div class="row" id="ReviewRow' + NewSl + '">' +
		'<div class="col-lg-5">' +
		'<div class="form-group">'+
		'<label class=""><b>Customer Name</b></label>'+
		'<input type="text" class="form-control" id="customer_name' + NewSl + '" placeholder="Enter Customer Name' + NewSl + '" name="customer_name[]">'+
		'</div>'+
		'<div class="form-group">' +
		'<label class=""><b>Review</b></label>' +
		'<input type="text" class="form-control" id="review' + NewSl + '" placeholder="Enter review Name' + NewSl + '" name="review[]">' +
		'</div>' +
		'<div style="margin-bottom:5px">' +
		'<p style = "margin-bottom : 10px;"><b>Rating</b></p>' +
		'<div class="rateyo-readonly-widg' + NewSl + '">' +
		'</div>' +
		'<input type="hidden" class="star_rating' + NewSl + '" id="rating' + NewSl + '" name="rating[]">' +
		'<br>' +
		'</div>' +
		'</div>' +
		'<div class="col-sm-2">' +
		'<a href="javascript:void(0)" onclick="DeleteReview(' + NewSl + ')" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete Row"><i class="fa fa-trash"></i></a>' +
		'</div>' +
		'</div>';


	$(function () {
		var rating = 0;
		$(".counter").text(rating);

		$('.rateyo-readonly-widg' + NewSl).rateYo({
			rating: rating,
			numStars: 5,
			precision: 2,
			minValue: 1,
			maxValue: 5,
		}).on("rateyo.change", function (e, data) {
			//console.log(data);
			$('.star_rating' + NewSl).val(data.rating);
		});
	});

	$('#Appendreview').append(Appendreview);


}


function DeleteReview(id) {
	$('#ReviewRow' + id).remove();
}
// <!-- /.card -->

$('.toastsDefaultWarning').click(function () {
	$(document).Toasts('create', {
		class: 'bg-warning',
		title: 'Toast Title',
		subtitle: 'Subtitle',
		body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
	})
});

// checkig file format for main_images in packages
function check_file_type(){
	var fileInput =
		document.getElementById('main_image');
	var filePath = fileInput.value;
	// Allowing file type
	var allowedExtensions =
		/(\.jpg|\.jpeg|\.png)$/i;

	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type, Please provide with jpg/jpeg/png');
		fileInput.value = '';
		return false;
	}
}
// checkig file format for additional _images in packages
function check_file_type2(){
	var fileInput =
		document.getElementById('additional_images');
	var filePath = fileInput.value;
	// Allowing file type
	var allowedExtensions =	
		/(\.jpg|\.jpeg|\.png)$/i;

	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type, Please provide with jpg/jpeg/png');
		fileInput.value = '';
		return false;
	}
}
// DESTINATION main Image preview \\
function main_preview_image(dd) {
	var filePath = dd.value;
	// Allowing file type
	var allowedExtensions =
		/(\.jpg|\.jpeg|\.png)$/i;

	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type, Please provide with jpg/jpeg/png');
		dd.value = '';
		return false;
	} else {
			var file = document.getElementById("main_image").files[0]['name'];
			$('#main_image_preview').append("<img src='" + URL.createObjectURL(event.target.files[0]) + "' width=90 height=70 /> ");
		return true;
	}
}

function edit_main_preview_image(dd,id) {
	var filePath = dd.value;
	console.log(id);
	// Allowing file type
	var allowedExtensions =
		/(\.jpg|\.jpeg|\.png)$/i;

	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type, Please provide with jpg/jpeg/png');
		dd.value = '';
		return false;
	} else {
			$('#main_image_preview' + id).append("<img src='" + URL.createObjectURL(event.target.files[0]) + "' width=90 height=70 /> ");
		return true;
	}
}

//   DESTINATION MORE IMAGES PREVIEWING   \\

function preview_image(dd) {
	// console.log(dd.files[0]);
	var filePath = dd.value;
	// Allowing file type
	var allowedExtensions =
		/(\.jpg|\.jpeg|\.png)$/i;

	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type, Please provide with jpg/jpeg/png');
		dd.value = '';
		return false;
	} else {
		var total_file = document.getElementById("upload_file").files.length;
		for (var i = 0; i < total_file; i++) {
			var file = document.getElementById("upload_file").files[i]['name'];
			console.log(file);
			$('#image_preview').append('<input type="checkbox" onchange="func2(' + i + ')" value="' + file + '" name="images[]" id="myCheckbox' + i + '" />' + '<input type="hidden" value="0" name="status_check[]" id="checked' + i + '"/>' + '<label for="myCheckbox' + i + '" id="image_preview' + i + '">' + "<img src='" + URL.createObjectURL(event.target.files[i]) + "' width=90 height=70 /> " + '</label>');
		}
		return true;
	}
}

function preview_img(dd, id) {
	var filePath = dd.value;
	// Allowing file type
	var allowedExtensions =
		/(\.jpg|\.jpeg|\.png)$/i;

	if (!allowedExtensions.exec(filePath)) {
		alert('Invalid file type, Please provide with jpg/jpeg/png');
		dd.value = '';
		return false;
	} else {
		var total_file = document.getElementById("upload_img" + id).files.length;

		for (var i = 0; i < total_file; i++) {
			var file = document.getElementById("upload_img" + id).files[i]['name'];
			$('#siteseeing_images' + id).append('<input type="checkbox" onchange="func3(' + i + ')" value="' + file + '" name="images[]" id="Checkbox' + i + '" />' + '<input type="hidden" value="0" name="image_status_check[]" id="check' + i + '"/>' + '<label for="Checkbox' + i + '" id="siteseeing_image_preview' + i + '">' + "<img src='" + URL.createObjectURL(event.target.files[i]) + "' width=90 height=70 /> " + '</label>');
		}
		return true;
	}
}

function func2(img) {

	var bb = $("#checked" + img).val(); //first it stores 0
	// console.log(bb);
	var status;
	if (bb == "1") {
		status = parseInt(bb) - 1;
		console.log(status);
		$('#checked' + img).val(status);
	} else {
		status = parseInt(bb) + 1;
		console.log(status);
		$('#checked' + img).val(status);

	}
}

// EDit preview checked function  \\

function func3(img1) {

	var ids = $("#check" + img1).val(); //first it stores 0
	// console.log(bb);
	var status;
	if (ids == "1") {
		status = parseInt(ids) - 1;
		console.log(status);
		$('#check' + img1).val(status);
	} else {
		status = parseInt(ids) + 1;
		console.log(status);
		$('#check' + img1).val(status);

	}
}


// AJAX CALL FOR STATUS "ON" "OFF" CHANGE IN EDIT destination
function image_status_check(chk, id) {
	if (chk.checked == true) {
		var status = 1;
	} else {
		var status = 0
	}
	// OR  \\
	$.ajax({
		type: "post",
		url: BASE_URL + "admin/siteseeing/ajax_status_check",
		data: {
			id: id,
			status: status
		},
		success: function () {

		}
	});
}

function edit_status_check(chk, id) {
	if (chk.checked == true) {
		var status = 1;
	} else {
		var status = 0
	}
	// OR  \\
	$.ajax({
		type: "post",
		url: BASE_URL + "admin/siteseeing/ajax_status_check",
		data: {
			id: id,
			status: status
		},
		success: function () {

		}
	});
}

// for the checkbox image editing section in DESTINATION section
function image_check(chk, id) {
	if (chk.checked == true) {
		var status = 1;
	} else {
		var status = 0
	}
	// OR  \\
	$.ajax({
		type: "post",
		url: BASE_URL + "admin/destinations/ajax_status_check",
		data: {
			id: id,
			status: status
		},
		success: function () {

		}
	});
}



// for fetching the star rating from the database and show them one by one with this function  \\
$(function () {

	var total_rating = $('#total_rating').val();

	for (var i = 0; i < total_rating; i++) {
		var rating_value = $(".star_rating" + i).val();

		var rating = (rating_value == "") ? 0 : rating_value;

		$(".rateyo-readonly-widg" + i).rateYo({
			rating: rating,
			numStars: 5,
			precision: 2,
			minValue: 1,
			maxValue: 5,
		}).on("rateyo.change", function (e, data) {
			$('.star_rating' + $(this).data('key')).val(data.rating);
		});
	}
});

// DESTINATION MULTIPLE SELECT2 DROPDOWN \\
$(function () {
	//Initialize Select2 Elements
	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	})
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', {
		'placeholder': 'mm/dd/yyyy'
	})
	//Money Euro
	$('[data-mask]').inputmask()

	//Date range picker
	$('#reservationdate').datetimepicker({
		format: 'L'
	});
	//Date range picker
	$('#reservation').daterangepicker()
	//Date range picker with time picker
	$('#reservationtime').daterangepicker({
		timePicker: true,
		timePickerIncrement: 30,
		locale: {
			format: 'MM/DD/YYYY hh:mm A'
		}
	})
	//Date range as a button
	$('#daterange-btn').daterangepicker({
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate: moment()
		},
		function (start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
		}
	)

	//Timepicker
	$('#timepicker').datetimepicker({
		format: 'LT'
	})

	//Bootstrap Duallistbox
	$('.duallistbox').bootstrapDualListbox()

	//Colorpicker
	$('.my-colorpicker1').colorpicker()
	//color picker with addon
	$('.my-colorpicker2').colorpicker()

	$('.my-colorpicker2').on('colorpickerChange', function (event) {
		$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
	});

	$("input[data-bootstrap-switch]").each(function () {
		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});

})

// CUSTOMER ENQUIRY\\

// NOTES Modal Section in Enquiry
function view_notes(id){
// console.log(id);
$.ajax({
type:"post",
url: BASE_URL + "admin/customer_enquiry/ajax_fetch_notes",
data : {id:id},
success : function(data){
$('#viewModal1').modal({'show':true});

if(data){
data = JSON.parse(data);
var html='<table class="table" style="width:100%"><thead><tr><th>Note:</th></tr></thead>'
var i=1;
$.each(data, function(i,details){
html+='<tbody><tr><th>'+data[i]['notes']+'</th></tr></tbody>';
});
$("#notes").html(html);
}
}
});
}

// Customer Enquiry Details Modal
function get_enquiry_details(id){
// console.log(id);
$.ajax({
type:"post",
url: BASE_URL + "admin/customer_enquiry/ajax_fetch_enquiry",
data : {id:id},
success : function(data){
$('#viewModal').modal({'show':true});

if(data){
data = JSON.parse(data);
'<table class="table" style="width:100%"><thead><tr><th>ID</th><th> Query ID</th><th>Date</th><th>Customer Name</th><th>Email Id</th><th>Contact</th><th>Location</th><th> Tour Date</th><th>Destination</th><th>Estimated Budget</th></tr></thead>'
var html = '<pre>'
 html += 'ID : '+data[0]['query_id']+'<br>'+'Date : ' + data[0]['date']+'<br>'+'Customer Name : ' + data[0]['customer_name']+'<br>'+'Email ID : ' + data[0]['email_id']+'<br>'+'Contact : '+data[0]['contact']+'<br>'+'Location : '+data[0]['location']+'<br>'+'Tour Date : ' + data[0]['tour_date']+'<br>'+'Destination : ' + data[0]['destinations']+'<br>'+'Estimated Budget : ' + data[0]['est_budget']+'<br>',
// console.log(data[0]['query_id']);
$.each(data, function(i,details){
// console.log(data[i]['query_id']);
// html+='<tbody><tr><th>'+data[i].id+'</th><th>'+data[i]['query_id']+'</th><th>'+data[i].date+'</th><th>'+data[i]['customer_name']+'</th><th>'+data[i]['email_id']+'</th><th>'+data[i]['contact']+'</th><th>'+data[i]['location']+'</th><th>'+data[i]['tour_date']+'</th><th>'+data[i]['destination']+'</th><th>'+data[i]['est_budget']+'</th></tr></tbody>';
// html+='<th>'+data[i]['tour_date']+'</th><th>'+data[i]['destination']+'</th><th>'+data[i]['est_budget']+'</th></tr></tbody>';
});
$("#enquiry_data").html(html);
}
}
});
}


// Anothe rcode for preview of images  \\
// const file= document.getElementById("images");
// const container= document.getElementById("image_preview");
// const preview_image = container.querySelector(".preview_img");
//   images.addEventListener("change", function(){
//   const file = this.files[1];
//   console.log(file);
//   if(file){
//     const reader = new FileReader();
//     preview_image.style.display = "block";
//     reader.addEventListener("load", function(){
//       console.log(this);
//       preview_image.setAttribute("src", this.result);
//     });
//     reader.readAsDataURL(file);
//   }
//   else{
//     preview_image.style.display= null;
//   }
// });
