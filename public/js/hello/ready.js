function popupwindow(url, title, w, h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
$(document).ready(function() {
	$('#name').on('click', function() {
		$(this).select();
	});
	$('#theform').on('submit', function() {
		var name = $('#name').val();
		$(this).attr('action', "/hello/"+encodeURIComponent(name));
	});
	$('.sharer').click(function() {
		var url = $(this).prop('href');
		var NWin = popupwindow(url, "Share Fleet", 400, 300);
		if (window.focus)
		{
			NWin.focus();
		}
		return false;
	});
});