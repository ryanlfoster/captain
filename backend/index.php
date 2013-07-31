<!DOCTYPE html>
<html>
	<head>
		<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
		<meta charset="utf-8">
		<link rel="stylesheet" href="css.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS Toolkit styles -->
<link rel="stylesheet" href="http://blueimp.github.io/cdn/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="http://blueimp.github.io/cdn/css/bootstrap-responsive.min.css">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]>
<link rel="stylesheet" href="http://blueimp.github.io/cdn/css/bootstrap-ie6.min.css">
<![endif]-->
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
	</head>
	<body>
		<div class="container">
			<div class="logo">
				<a href="../index.html"><img src="../resource/logo.png" alt="Captian Logo"></a>
			</div>
			<div class="main">
				<textarea name="about" id="about" cols="25" rows="5" placeholder="What's this site about?" title="What's this site about?"></textarea>
				<textarea name="faq" id="faq" cols="25" rows="5" placeholder="What's the frequent asked questions?" title="What's the frequent asked questions"></textarea>
				     <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
    			    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    			    <noscript><input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/"></noscript>
    			    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    			    <div class="row fileupload-buttonbar">
    			        <div class="span7">
    			            <!-- The fileinput-button span is used to style the file input field as button -->
    			            <span class="btn btn-success fileinput-button">
    			                <i class="icon-plus icon-white"></i>
    			                <span>Add files...</span>
    			                <input type="file" name="files[]" multiple>
    			            </span>
    			            <button type="submit" class="btn btn-primary start">
    			                <i class="icon-upload icon-white"></i>
    			                <span>Start upload</span>
    			            </button>
    			            <button type="reset" class="btn btn-warning cancel">
    			                <i class="icon-ban-circle icon-white"></i>
    			                <span>Cancel upload</span>
    			            </button>
    			            <button type="button" class="btn btn-danger delete">
    			                <i class="icon-trash icon-white"></i>
    			                <span>Delete</span>
    			            </button>
    			            <input type="checkbox" class="toggle">
    			            <!-- The loading indicator is shown during file processing -->
    			            <span class="fileupload-loading"></span>
    			        </div>
    			        <!-- The global progress information -->
    			        <div class="span5 fileupload-progress fade">
    			            <!-- The global progress bar -->
    			            <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
    			                <div class="bar" style="width:0%;"></div>
    			            </div>
    			            <!-- The extended global progress information -->
    			            <div class="progress-extended">&nbsp;</div>
    			        </div>
    			    </div>
    			    <!-- The table listing the files available for upload/download -->
    			    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    			 </form>
    			 <div class="bts">
					<button class="btn btn-primary" id="publish">Publish</button>
					<button class="btn btn-danger" id="clear">Clear</button>
				</div>
			</div>
		</div>
		<script id="template-upload" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			    <tr class="template-upload fade">
			        <td>
			            <span class="preview"></span>
			        </td>
			        <td>
			            <p class="name">{%=file.name%}</p>
			            {% if (file.error) { %}
			                <div><span class="label label-important">Error</span> {%=file.error%}</div>
			            {% } %}
			        </td>
			        <td>
			            <p class="size">{%=o.formatFileSize(file.size)%}</p>
			            {% if (!o.files.error) { %}
			                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
			            {% } %}
			        </td>
			        <td>
			            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
			                <button class="btn btn-primary start">
			                    <i class="icon-upload icon-white"></i>
			                    <span>Start</span>
			                </button>
			            {% } %}
			            {% if (!i) { %}
			                <button class="btn btn-warning cancel">
			                    <i class="icon-ban-circle icon-white"></i>
			                    <span>Cancel</span>
			                </button>
			            {% } %}
			        </td>
			    </tr>
			{% } %}
		</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	    <tr class="template-download fade">
	        <td>
	            <span class="preview">
	                {% if (file.thumbnailUrl) { %}
	                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
	                {% } %}
	            </span>
	        </td>
	        <td>
	            <p class="name">
	                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
	            </p>
	            {% if (file.error) { %}
	                <div><span class="label label-important">Error</span> {%=file.error%}</div>
	            {% } %}
	        </td>
	        <td>
	            <span class="size">{%=o.formatFileSize(file.size)%}</span>
	        </td>
	        <td>
	            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
	                <i class="icon-trash icon-white"></i>
	                <span>Delete</span>
	            </button>
	            <input type="checkbox" name="delete" value="1" class="toggle">
	        </td>
	    </tr>
	{% } %}
</script>
		<script src="../js/jquery-1.10.1.min.js"></script>
		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="js/vendor/jquery.ui.widget.js"></script>
		<!-- The Templates plugin is included to render the upload/download listings -->
		<script src="http://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
		<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
		<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
		<!-- The Canvas to Blob plugin is included for image resizing functionality -->
		<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
		<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
		<script src="http://blueimp.github.io/cdn/js/bootstrap.min.js"></script>
		<!-- blueimp Gallery script -->
		<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="js/jquery.fileupload.js"></script>
		<!-- The File Upload processing plugin -->
		<script src="js/jquery.fileupload-process.js"></script>
		<!-- The File Upload image preview & resize plugin -->
		<script src="js/jquery.fileupload-image.js"></script>
		<!-- The File Upload audio preview plugin -->
		<script src="js/jquery.fileupload-audio.js"></script>
		<!-- The File Upload video preview plugin -->
		<script src="js/jquery.fileupload-video.js"></script>
		<!-- The File Upload validation plugin -->
		<script src="js/jquery.fileupload-validate.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="js/jquery.fileupload-ui.js"></script>
		<!-- The main application script -->
		<script src="js/main.js"></script>
		<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
		<!--[if gte IE 8]>
		<script src="js/cors/jquery.xdr-transport.js"></script>
		<![endif]-->
		<script src="js.js"></script>
	</body>
</html>