CKEDITOR.replace( 'editor1' );
// CKEDITOR.replace( 'editor2' );

// CKEDITOR.plugins.add('myplugin',
//         {
//         init: function (editor) {

//             function onDragStart(event) {
//                 console.log("onDragStart");
//             };

//             editor.on('contentDom', function (e) {
//                 editor.document.on('dragstart', onDragStart);
//                 // editor.document.on('drop', onDrop);
//                 // etc.
//             });
//         } class="form-control"
// });

// $("textarea").each(function(){
//     CKEDITOR.replace( this );
// });

	var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

$('#tanggal').datepicker({
	format: 'yyyy-mm-dd',
	// daysOfWeekDisabled: "0",
	autoclose:true,
  todayHighlight: true,
});

$('#tanggal-mulai').datepicker({
  format: 'yyyy-mm-dd',
	// daysOfWeekDisabled: "0",
	autoclose:true,
  todayHighlight: true,
  maxDate: function () {
    return $('#endDate').val();
  }
});

$('#tanggal-selesai').datepicker({
  format: 'yyyy-mm-dd',
	// daysOfWeekDisabled: "0",
	autoclose:true,
  todayHighlight: true,
  minDate: function () {
    return $('#tanggal-mulai').val();
  }
});

$("#tanggal-mulai").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tanggal-selesai").datepicker('setStartDate', startDate);
        if($("#tanggal-mulai").val() > $("#tanggal-selesai").val()){
          $("#tanggal-selesai").val($("#tanggal-mulai").val());
        }
    });

lightbox.option({
      // 'showImageNumberLabel': false
    })

$(document).ready(function () {
  bsCustomFileInput.init()
})

// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "lengthMenu": [20, 50, 100],
    "columnDefs": [
          {
          "targets": [0,-3,-2,-1],
          "className": 'text-center'
          },
          {
          "targets": [-1, -2],
          "orderable": false
          },
        ],
  });
});

$(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });

// Pace loader animation init
paceOptions = {
  // Disable the 'elements' source
  elements: false,
  // Only show the progress on regular and ajax-y page navigation,
  // not every request
  restartOnRequestAfter: false
}

$('#modalTampilWeb').on('shown', function() {
  $("body.modal-open").removeAttr("style");
})


function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {
      document.documentElement.requestFullScreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullScreen) {
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.cancelFullScreen) {
      document.cancelFullScreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    }
  }
}

localStorage.setItem("fullScreenMode", "on");

let fullScreenMode = localStorage.getItem("fullScreenMode");
if(fullScreenMode == "on"){
  // Set second page to full screen here
}

localStorage.clear();

// Print current year function
$('#tahunIni').html(new Date().getFullYear());

// Show password function
$("#show_hide_password a").on('click', function (event) {
    event.preventDefault();
    // change element attr from password to text
    if ($('#show_hide_password input').attr("type") == "text") {
      $('#show_hide_password input').attr('type', 'password');
      $('#show_hide_password i').addClass("fa-eye-slash");
      $('#show_hide_password i').removeClass("fa-eye");
    } else if ($('#show_hide_password input').attr("type") == "password") {
      $('#show_hide_password input').attr('type', 'text');
      $('#show_hide_password i').removeClass("fa-eye-slash");
      $('#show_hide_password i').addClass("fa-eye");
    }
  });




