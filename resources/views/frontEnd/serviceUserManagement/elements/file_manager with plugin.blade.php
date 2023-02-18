
<link rel="stylesheet" href="{{ url('public/frontEnd/js/file-uploader/css/jquery.fileupload.css') }}">
<link rel="stylesheet" href="{{ url('public/frontEnd/js/file-uploader/css/jquery.fileupload-ui.css') }}">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript>
    <link rel="stylesheet" href="{{ url('public/frontEnd/js/file-uploader/css/jquery.fileupload-noscript.css') }}">
</noscript>
<noscript>
    <link rel="stylesheet" href="{{ url('public/frontEnd/js/file-uploader/css/jquery.fileupload-ui-noscript.css') }}">
</noscript>

<!--File Manager -->
<div class="modal fade" id="filemngrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> File Manager </h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <!-- file uploader HTML -->
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript>
                                <input type="hidden" name="redirect" value="http://blueimp.github.io/jQuery-File-Upload/">
                            </noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                    <!-- <i class="glyphicon glyphicon-plus"></i> -->
                                    <i class="fa fa-plus"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files" > <!--  multiple  -->
                                    </span>
                                    <button type="submit" class="btn btn-primary start"> <!--   start -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <!-- <i class="glyphicon glyphicon-upload"></i> start -->
                                        <i class="fa fa-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <!-- <i class="glyphicon glyphicon-ban-circle"></i> -->
                                        <i class="fa fa-ban"></i>
                                        <span>Cancel upload</span>
                                    </button>
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;">
                                        </div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->
                            <table role="presentation" class="table table-striped">
                                <tbody class="files">
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 serch-btns text-right">
                        <button class="btn label-default active risk-add-btn" type="button"> Add New </button>
                        <button class="btn label-default risk-logged-btn logged-plans" type="button"> Logged Files </button>
                        <button class="btn label-default risk-search-btn" type="button"> Search </button>
                    </div>

                    <!-- Add new Details -->
                    <div class="risk-add-box risk-tabs">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="m-t-0 m-b-20 clr-blue"> Add New - Details </h3>
                        </div>

                        <!-- alert messages -->
                        @include('frontEnd.common.popup_alert_messages')

                        <!-- 1st field -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Title: </label>
                                <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                    <div class="input-group popovr">
                                        <input type="text" name="file_title" required class="form-control add_title" placeholder="title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 2nd field -->
                        <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Category: </label>
                                <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                    <div class="input-group popovr">
                                        <div class="select-style">
                                            <select name="file_category" class="add_category">
                                                <!-- <option value=" ">Select Category </option> -->
                                            <?php foreach ($file_category as $key=>$value){
                                                ?>
                                                <option value='{{ $value->id }}'> {{ $value->name }} </option>
                                        <?php    } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer m-t-0 recent-task-sec" style="padding-bottom: 0px">
                            <input type="hidden" name="_token1" value="{{ csrf_token() }}">
                            <input type="hidden" name="service_user_id" value="{{ $service_user_id }}">
                            <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true"> Cancel </button>
                            <!-- <button class="btn btn-warning" type="button"> Confirm </button> -->
                            <button class="btn btn-warning save-detail-btn" type="button"> Confirm </button>
                        </div>
                    </div>

                    <!-- Logged Files -->
                    <div class="risk-logged-box risk-tabs">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="m-t-0 m-b-20 clr-blue"> Logged files </h3>
                        </div>
                        <!--logged files list shown here!-->
                        <!-- alert messages -->
                        @include('frontEnd.common.popup_alert_messages')
                        <div class="col-md-12 col-sm-12 col-xs-12 logged-plans-list">     
                        <!-- Logged files shown using ajax -->
                        </div>
                    </div>

                   <!-- Search Box -->
                
                    <div class="risk-search-box risk-tabs">
                        <form method="post" action="" id="files_search_form">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3 class="m-t-0 m-b-20 clr-blue"> Search </h3>
                            </div>

                            <!-- 1st field -->
                            <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                    <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Title: </label>
                                    <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                        <div class="input-group popovr">
                                            <input type="text" name="search_file_title" class="form-control" placeholder="title" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="searched-logged-files" style="padding-left:34px">
                            <!-- Using Ajax -->
                            </div>

                            <div class="modal-footer m-t-0 recent-task-sec" style="padding-bottom: 0px">
                                <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true"> Cancel </button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="service_user_id" value="{{ $service_user_id }}">
                                <button class="btn btn-warning file_details_submit search_files_btn" type="button"> Confirm </button>
                            </div>
                         </form> 
                    </div>
                         
                </div>
            </div>
            <!-- <div class="modal-footer m-t-0">
                <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true"> Cancel </button>
                <button class="btn btn-warning" type="button"> Confirm </button>
            </div> -->
        </div>
    </div>
</div>

<script src="{{ url('public/frontEnd/js/file-uploader/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.iframe-transport.js') }}"></script>
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload.js') }}"></script>

<script src="{{ url('public/frontEnd/js/tmpl.min.js') }}"></script>
<script src="{{ url('public/frontEnd/js/load-image.all.min.js') }}"></script>
<script src="{{ url('public/frontEnd/js/canvas-to-blob.min.js') }}"></script>

<!-- The File Upload processing plugin -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload-process.js') }}"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload-image.js') }}"></script>
<!-- The File Upload audio preview plugin -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload-audio.js') }}"></script>
<!-- The File Upload video preview plugin -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload-video.js') }}"></script>
<!-- The File Upload validation plugin -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload-validate.js') }}"></script>
<!-- The File Upload user interface plugin -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/jquery.fileupload-ui.js') }}"></script>
<!-- The main application script -->
<script src="{{ url('public/frontEnd/js/file-uploader/js/main.js') }}"></script>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <a class="start" disabled>
                        
                    </a>
                {% } %}
                {% if (!i) { %}
                    <a class="cancel">
                        
                    </a>
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
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <!-- <i class="glyphicon glyphicon-ban-circle"></i> -->
                        <i class="fa fa-ban"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
</script>

<script type="text/javascript">
    $('#fileupload').fileupload({ 
        // Uncomment the following to send cross-domain cookies:
        xhrFields: {withCredentials: true},
        maxNumberOfFiles: 1,
        singleFileUploads: true,
        //url: 'http://local.tf/tf/F4/bucketmin/assets/file-uploader/server/php/',
        url: "{{ url('service/file-manager/upload/'.$service_user_id) }}",
        method: 'post',
        headers : "{ 'CSRFToken' : getCSRFTokenValue()}"
        //data: { '_token': "{{ csrf_token() }}" }
        //data: { '_token': 'vN289jibqne7SklBn7aRRRMVWbB6IrEOfNTCXGM3' }
    });
</script>

<!-- <script>
    //click search btn
    $(document).ready(function(){
        $(document).on('click','.btn-primary ', function(){
            //alert('m'); return false;
            //var formData = $('#fileupload').serialize();
            var formData = new FormData();
            formData.append('image', $( "#inputImageUpload" )[0].files[0]);
            var a = $( "#inputImageUpload" );
            console.log(a); return false;
            
            $.ajax({
                url : "{{ url('service/file-manager/upload/'.$service_user_id) }}",
                type : "post",
                data:  formData,
                dataType : "json",
                contentType : false,
                cache : false,
                processData : false,
                success : function(response){
                    // 
                    alert(response);
                }
            });
        
        return false;
        });
    });
</script> -->

<script>
    //click search btn
    $(document).ready(function(){
        $(document).on('click','.search_files_btn', function(){

            

            var search = $('input[name=\'search_file_title\']').val();

            var service_user_id = $('input[name=\'service_user_id\']').val();
            var token1 = $('input[name=\'_token\']').val();
            // alert(service_user_id); return false; 
             //var _token = $('input[name=\'_token\']').val();
            search = jQuery.trim(search);

            if(search == '' || search == '0'){
                $('input[name=\'search_file_title\']').addClass('red_border');
                return false;
            } else{
                $('input[name=\'search_file_title\']').removeClass('red_border');
            }
        
            var formdata = $('#files_search_form').serialize();


            $('.loader').show();
            $('body').addClass('body-overflow');
            
            
            $.ajax({
                type : 'post',
                url  : "{{ url('/service/file-manager/view') }}"+'/'+service_user_id,
                //data : { 'search' : search, '_token' : token },
                data : formdata,
                success : function(resp){
                    //alert(resp);
                    $('.searched-logged-files').html(resp);
                    $('input[name=\'search\']').val('');
                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                }
            });
        return false;
        });
    });
</script>

<script>
$(document).ready(function(){
    //save a new file
    $(document).on('click','.save-detail-btn',function(){
        var file_title = $('input[name=\'file_title\']').val();
        // file_title = jQuery.trim(file_title);

        var file_category = $('select[name=\'file_category\']').val();
        var service_user_id = $('input[name=\'service_user_id\']').val();
        var file_token = $('input[name=\'_token\']').val();
        var error = 0;

        if((file_title == '') || (file_title == null) ){ 
            //$('.field-reqiured').text('Field is requried');
            $('input[name=\'file_title\']').addClass('red_border');
            error = 1;
        } else{ 
            $('input[name=\'file_title\']').removeClass('red_border');
        }

        if(file_category == 'Select category'){ 
            $('select[name=\'file_category\']').parent().addClass('red_border');
            error = 1;
        } else{ 
            $('select[name=\'file_category\']').parent().removeClass('red_border');
        }
        
        if(error == 1){ 
            return false;
        }

        $('.loader').show();
        $('body').addClass('body-overflow');

        $.ajax({
            type : 'post',
            url  : "{{ url('/service/file-manager/add') }}",
            data : { 'file_title' : file_title, 'file_category' : file_category, '_token' : file_token, 'service_user_id' : service_user_id},
            success:function(resp){

                if(resp == '0'){
                    //alert('Sorry record could not be added');
                     $('span.popup_error_txt').text('Error Occured');
                     $('.popup_error').show();
                     $('.loader').hide();
                }
                else{
                    
                    //empty the input fields
                    $('input[name=\'file_title\']').val('');
                    $('select[name=\'file_category\']').val('0');
                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                   
                    //show success message
                    $('span.popup_success_txt').text('File Detail Added Successsfully');
                    $('.popup_success').show();
                    setTimeout(function(){$(".popup_success").fadeOut()}, 5000);
                }
            }   
        });     
        return false;
    });
});
</script>

<script>
    //in logged btn click get data
    $(document).ready(function(){
        $(document).on('click','.logged-plans', function(){
    
            // $('.logged-plans-confirm-btn').hide();
            var service_user_id = "{{ $service_user_id }}";
            $.ajax({
                type : 'get',
                url  : "{{ url('/service/file-manager/view') }}"+'/'+service_user_id,
                success : function(resp){
                    
                     $('.logged-plans-list').html(resp);
                }
            });
        });
        return false;
    });
</script>

<script>
    //delete a row
    $(document).ready(function(){
    
        $(document).on('click','.delete-logged-file', function(){
    
            var logged_file_id = $(this).attr('logged_file_id');
            // alert(logged_file_id); return false;
            $(this).addClass('active_record');
    
            var file_token = $('input[name=\'_token\']').val();
            
            /*$('.loader').show();
            $('body').addClass('body-overflow');*/

            $.ajax({
                type : 'get',
                url  : "{{ url('/service/file-manager/delete/') }}"+'/'+logged_file_id,
                data : { 'logged_file_id' : logged_file_id, '_token' : file_token },
                success : function(resp){
                    
                    // alert(resp); return false;

                    if(resp == 1) {
                    $('.active_record').closest('.delete-file').remove();

                    $('.loader').hide();
                    $('body').removeClass('body-overflow');

                    //show success delete message
                    $('span.popup_success_txt').text('File Deleted Successfully');                   
                    $('.popup_success').show();
                    setTimeout(function(){$(".popup_success").fadeOut()}, 5000);

                    } else{

                    //show delete message error
                    $('span.popup_error_txt').text('Error Occured');
                    $('.popup_error').show();

                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                    }
                }
            });
            return false;
        });
    });
</script>
