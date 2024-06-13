$(document).ready(function(){
	tinymce.init({
		selector: '.editor',
		plugins : [
				"advlist autolink lists charmap print preview ",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime table contextmenu paste textcolor" ],
		toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor",
		height : "300"
	});
	//$('#frmemail').submit(function (ev) {
		//ev.preventDefault();
		//$('#valor').val(tinyMCE.activeEditor.getContent());
		//$('#frmemail').trigger('submit');
	//});
});