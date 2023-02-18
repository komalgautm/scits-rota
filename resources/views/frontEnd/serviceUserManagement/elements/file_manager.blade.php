
<link rel="stylesheet" href="{{ url('public/frontEnd/css/file-uploader/css/jquery.fileupload.css') }}">
<link rel="stylesheet" href="{{ url('public/frontEnd/css/file-uploader/css/jquery.fileupload-ui.css') }}">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript>
    <link rel="stylesheet" href="{{ url('public/frontEnd/css/file-uploader/css/jquery.fileupload-noscript.css') }}">
</noscript>
<noscript>
    <link rel="stylesheet" href="{{ url('public/frontEnd/css/file-uploader/css/jquery.fileupload-ui-noscript.css') }}">
</noscript>

<!-- fancybox -->
<link rel="stylesheet" href="{{ url('public/frontEnd/css/fancy-box/jquery.fancybox.css') }}">
<script src="{{ url('public/frontEnd/css/fancy-box/jquery.fancybox.js') }}"></script>
<!--<script src="{{ url('public/frontEnd/css/fancy-box/jquery.fancybox.min.js') }}"></script> -->
<script type="text/javascript" src="{{ url('public/frontEnd/js/jszip-utils.min.js') }}"></script>
<script type="text/javascript" src="{{ url('public/frontEnd/js/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ url('public/frontEnd/js/FileSaver.min.js') }}"></script>

<style type="text/css">
    #careTeamMembersModal .modal-content {
        border: medium none;
        box-shadow: none;
        float: left;
        width: 100%;
    }
    #careTeamMembersModal .select2-container {
        width: 100% !important;
    }
    #careTeamMembersModal .select2-container--default.select2-container--focus .select2-selection--multiple {
        max-height: 32px !important;
        overflow: auto;
        width: 95% !important;
    }
    #careTeamMembersModal .error {
        color: red;
    }
    #careTeamMembersModal .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 1px solid transparent;
    }
    .text-center {
        text-align: center;
        margin: 0px 5px;
    }

    .text-center .nav-link .icon {
        color: #1F88B5;
        font-size: 70px;
    }

    .nav li.active a {
        background-color: #fff !important;
        color: initial !important;
    }

    .modal-dialog {
        width: 800px;
    }

    /********* Drag And Drop css****** */
    /*! Image Uploader - v1.2.3 - 26/11/2019
 * Copyright (c) 2019 Christian Bayer; Licensed MIT */
@font-face{font-family:'Image Uploader Icons';src:url(../fonts/iu.eot);src:url(../fonts/iu.eot) format('embedded-opentype'),url(../fonts/iu.ttf) format('truetype'),url(../fonts/iu.woff) format('woff'),url(../fonts/iu.svg) format('svg');font-weight:400;font-style:normal}[class*=iui-],[class^=iui-]{font-family:'Image Uploader Icons'!important;speak:none;font-style:normal;font-weight:400;font-variant:normal;text-transform:none;line-height:1;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.fa fa-times:before{content:"\e900"}.fa fa-cloud-upload:before{content:"\e901"}.image-uploader{min-height:10rem;border:1px solid #1f88b563;position:relative}.image-uploader.drag-over{background-color:#f3f3f3}.image-uploader input[type=file]{width:0;height:0;position:absolute;z-index:-1;opacity:0}.image-uploader .upload-text{position:absolute;top:0;right:0;left:0;bottom:0;display:flex;justify-content:center;align-items:center;flex-direction:column}.image-uploader .upload-text i{display:block;font-size:3rem;color:#1f88b5;margin-bottom:.5rem}.image-uploader .upload-text span{display:block}.image-uploader.has-files .upload-text{display:none}.image-uploader .uploaded{padding:.5rem;line-height:0}.image-uploader .uploaded .uploaded-image{display:inline-block;width:calc(16.6666667% - 1rem);padding-bottom:calc(16.6666667% - 1rem);height:0;position:relative;margin:.5rem;background:#f3f3f3;cursor:default}.image-uploader .uploaded .uploaded-image img{width:100%;height:100%;object-fit:cover;position:absolute}.image-uploader .uploaded .uploaded-image .delete-image{display:none;cursor:pointer;position:absolute;top:.2rem;right:.2rem;border-radius:50%;padding:.3rem;line-height:1;background-color:rgba(0,0,0,.5);-webkit-appearance:none;border:none}.image-uploader .uploaded .uploaded-image:hover .delete-image{display:block}.image-uploader .uploaded .uploaded-image .delete-image i{display:block;color:#fff;width:1.4rem;height:1.4rem;font-size:1.4rem;line-height:1.4rem}@media screen and (max-width:1366px){.image-uploader .uploaded .uploaded-image{width:calc(20% - 1rem);padding-bottom:calc(20% - 1rem)}}@media screen and (max-width:992px){.image-uploader .uploaded{padding:.4rem}.image-uploader .uploaded .uploaded-image{width:calc(25% - .8rem);padding-bottom:calc(25% - .4rem);margin:.4rem}}@media screen and (max-width:786px){.image-uploader .uploaded{padding:.3rem}.image-uploader .uploaded .uploaded-image{width:calc(33.3333333333% - .6rem);padding-bottom:calc(33.3333333333% - .3rem);margin:.3rem}}@media screen and (max-width:450px){.image-uploader .uploaded{padding:.2rem}.image-uploader .uploaded .uploaded-image{width:calc(50% - .4rem);padding-bottom:calc(50% - .4rem);margin:.2rem}}
    .drop_area {
        padding: 10px;
    }

    .submit_btn {
        border: none;
        outline: none;
        background-color: #1f88b5;
        color: #fff;
        border-radius: 3px;
        padding: 5px 10px;
        margin-top: 10px;
    }
/* *********** Drag And Drop css******** */
.show-image {
    margin-bottom: 10px;
    margin-top:20px;
}

.float_left {
    height: 150px;
    width: 120px;
    position: relative;
}

.show-image .download_image {
    height: 100%;
    width: 100%;
    object-fit: cover;
    padding: 5px;
}

.show-image .close {
    font-size: 18px;
    border-radius: 30px;
    padding: 3px;
    color: #000;
    box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important;
    position: absolute;
    right: 0px;
    top: 0px;
}

.float_right .download_icon {
    border: none;
    outline: none;
    font-size: 25px;
    color: white;
    background-color: #1f88b5;
    padding: 2px 15px;
    border-radius: 5px;
    margin-left: 15px;
    
}

.float_right.col-md-2{
    float:right;
}

.back_opt {
    display: inline-block;
    width: 45px; 
    height: 45px;
    font-size: 30px;
    background-color: #1f88b5;
    color: #fff !important;
    cursor: pointer;
    border-radius: 50%;
    text-align: center;
    float:left;
}
i.fa.fa-file-pdf-o {
    font-size: 145px;
    color: #750f0f;
}
i.fa.fa-file-word-o {
    font-size: 145px;
    color: #3050f2;
}
</style>

<!--File Manager -->
<div class="modal fade" id="filemngrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> File Manager <span class="textfilename"></span></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs" id="myTab">
                            <?php foreach ($file_category as $key=>$value){ ?>
                                <li class="nav-item col-md-3" onclick="folderclick('<?=ucfirst($value->name)?>',<?=$value->id?>)">
                                    <div class="text-center">
                                        <a class="nav-link active" data-toggle="tab" aria-current="page" href="#t{{ $value->id }}">
                                        <i class="fa fa-folder-open icon" aria-hidden="true"></i>
                                        <p class="folder_name">{{ ucfirst($value->name) }}</p>
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                            
                        </ul>
                        <div class="tab-content">
                        <?php foreach ($file_category as $key=>$values){
                            $logged_plans = DB::table('su_file_manager')->select('id','file')->where('service_user_id',$service_user_id)->where('category_id',$values->id)->orderBy('id','desc')->get();
                            $totalimage = array();
                            foreach($logged_plans as $fileimg){
                                $fileimg = ServiceUserFilePath.'/'.$service_user_id.'/'.$fileimg->file;
                                array_push($totalimage,$fileimg);
                            }
                            //echo "<pre>";
                                $tot = implode(",",$totalimage);
                            //print_r($totalimage);    
                        ?>
                            <div class="tab-pane fade" id="t{{ $values->id }}">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="back_opt col-3" onclick="showfolders('<?=ucfirst($values->name)?>',<?=$values->id?>)">
                                            <i class="fa fa-angle-left"></i>
                                        </div>
                                        <!-- download -->
                                        <div class="float_right col-md-2">
                                            <div class="download_link text-center">
                                                <button type="button" class="download_icon" data-id<?=$values->id?>="<?php echo $tot;?>" onclick="create_zip(<?=$service_user_id?>,this,'<?=$values->name?>',<?=$values->id?>,'<?=$tot?>')"><i class="fa fa-download" aria-hidden="true"></i></button>
                                                <!-- <button type="button" class="download_icon" data-id<?=$values->id?>="<?php print_r($totalimage);?>" onclick="generateZIP()"><i class="fa fa-download" aria-hidden="true"></i></button> -->
                                            </div>
                                        </div>
                                        <!-- download -->
                                    </div>
                                </div>


                                <style>
                                    .link {
                                        min-height: 210px;
                                        box-shadow: 0px 0px 6px #cccccc;
                                        margin-bottom: 30px;
                                    }
                                    .uploadImg{
                                        height: 180px;
                                    }
                                    .uploadImg img{
                                        width: 100%;
                                        height: 100%;
                                    }
                                    .filename{
                                        display: block;
                                        padding: 0 6px;
                                        height: 20px;
                                        overflow: hidden;
                                    }
                                    a.wrinkled i {
                                        padding: 6px;
                                        height: 180px;
                                    }
                                    .show-image .close {
                                        right: 18px;
                                        top: 0px;
                                    }
                                    form#fileupload13 {
                                        padding-bottom: 10px;
                                    }
                                </style>
                               
                                    <div class="show-image row">
                                        <?php
                                        
                                        foreach($logged_plans as $imagevalues){
                                            $file_name = $imagevalues->file;
                                            $path = pathinfo($file_name);
                                            $ext  = $path['extension'];

                                            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                                                $icn_class = 'fa fa-file-image-o';
                                                $file_url  =  ServiceUserFilePath.'/'.$service_user_id.'/'.$imagevalues->file;
                                                // echo $file_url; die;
                                                $file      = '<a class="wrinkled" href="'.$file_url.'" target="_blank"><div class="uploadImg"><img src="'.$file_url.'" class="download_image" alt="img"></div><span class="filename">'.ucfirst($imagevalues->file).'</span> </a>';

                                            } else if($ext == 'pdf') {
                                                $icn_class = 'fa fa-file-pdf-o';
                                                $file_url  = ServiceUserFilePath.'/'.$service_user_id.'/'.$imagevalues->file;
                                                
                                                $file      = '<a class="wrinkled"  href="'.$file_url.'" target="_blank"><i class="'.$icn_class.'"></i><span class="filename">'.ucfirst($imagevalues->file).'</span></a>';
                                                                                
                                            } else if($ext == 'doc' || $ext == 'docx'  || $ext == 'wps' ) {
                                                $icn_class = 'fa fa-file-word-o';
                                                $file_url  = ServiceUserFilePath.'/'.$service_user_id.'/'.$imagevalues->file;
                                                $file      = '<a class="wrinkled"  href="'.$file_url.'" target="_blank"><i class="'.$icn_class.'"></i><span class="filename">'.ucfirst($imagevalues->file).'</span></a>';
                                                
                                            } else{
                                                $icn_class = 'fa fa-file-image-o';
                                                $file_url  =  ServiceUserFilePath.'/'.$service_user_id.'/'.$imagevalues->file;
                                                // echo $file_url; die;
                                                $file      = '<a class="wrinkled" href="'.$file_url.'" target="_blank"><div class="uploadImg"><img src="'.$file_url.'" class="download_image" alt="img"></div><span class="filename">'.ucfirst($imagevalues->file).'</span> </a>';
                                            }
                                        ?>
                                        
                                            <div class="col-md-3">
                                                <div class="link">
                                                    <i class="fa fa-times close" aria-hidden="true" onclick="deletelog('<?=base64_encode(convert_uuencode($imagevalues->id))?>')"></i>
                                                    <?=$file?>
                                                    <!-- <img src="<?= ServiceUserFilePath.'/'.$service_user_id.'/'.$imagevalues->file; ?>" class="download_image" alt="img"> -->
                                                </div>
                                            </div>
                                            <?php } ?>
                                        
                                        
                                    </div>
                                                                  
                               

                                    <form method="POST" name="form-example-1" id="fileupload1<?=$values->id?>" enctype="multipart/form-data">
                                        <div class="input-field">
                                            <label class="active">Photos</label>
                                            <div class="input-images-1" style="padding-top: .5rem;"></div>
                                            
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" name="file_category" id="file_category" value="{{ $values->id }}">
                                            <input type="hidden" name="service_userid" id="service_userid" value="<?=$service_user_id?>">
                                            <button class="submit_btn submit_files_btns<?=$values->id?>">Submit</button>
                                        </div>
                                        <div class="alert alert-success hide" role="alert">
                                            <span class="succ-text"></span>
                                        </div>  
                                    </form>
                            </div>
                                            <script>
                                                $('.submit_files_btns<?=$values->id?>').click(function(){
                                                    var file_category = $('input[name=\'file_category\']').val();
                                                    //alert(file_category)
                                                    var formData = new FormData( $("#fileupload1<?=$values->id?>")[0] );
                                                    //console.log(formData)
                                                    $.ajax({
                                                        url : "{{ url('/service/file-manager/add') }}",
                                                        type : 'post',
                                                        data:  formData,
                                                        async : false,
                                                        cache : false,

                                                        contentType : false,

                                                        processData : false,
                                                        success : function(resp) {
                                                            //console.log("resp");
                                                            //console.log(resp);
                                                            //return false;
                                                            
                                                            if(isAuthenticated(resp) == false){
                                                                $('#filemngrModal .progress-bar-success').css('width','0%');
                                                                return false;
                                                            }
                                                            if(resp==1){
                                                                $('.hide').css('display','block');
                                                                $('.succ-text').text("Document uploaded successfully");
                                                                $('.alert-success').show('slow','linear').delay(4000).fadeOut(function(){
                                                                    location.reload();
                                                                })
                                                            }
                                                        }
                                                    });
                                                })
                                            </script>
                            <?php } ?>
                            <script>
                                function deletelog(th){
                                    if(!confirm('{{ DEL_CONFIRM }}')){
                                        return false;
                                    }
                                    var logged_file_id = th;
                                    $.ajax({
                                        type : 'get',
                                        url  : "{{ url('/service/file-manager/delete/') }}"+'/'+logged_file_id,
                                        //data : { 'logged_file_id' : logged_file_id, '_token' : file_token },
                                        success : function(resp){
                                            //alert(resp); return false;
                                            if(isAuthenticated(resp) == false){
                                                return false;
                                            }
                                             

                                            if(resp == 'true') {
                                                location.reload();
                                                // $('.active_record').closest('.delete-file').remove();
                                                // //show success delete message
                                                // $('span.popup_success_txt').text('File Deleted Successfully');                   
                                                // $('.popup_success').show();
                                                // setTimeout(function(){$(".popup_success").fadeOut()}, 5000);
                                            } else{

                                                //show delete message error
                                                $('span.popup_error_txt').text('Error Occured');
                                                $('.popup_error').show();
                                            }
                                            $('.loader').hide();
                                            $('body').removeClass('body-overflow');
                                        }
                                    });
                                }
                            </script>
                            
                            <SCRIPT>

                            function create_zip(id,th,name,cateid,string) {
                                var links = string.split(",")
                                
                                var zip = new JSZip();
                                var count = 0;
                                var zipFilename = name+'-'+id+".zip";
                                links.forEach(function (url, i) {
                                        var filename = links[i];
                                        filename = filename.replace(/[\/\*\|\:\<\>\?\"\\]/gi, '').replace("https://itdevelopmentservices.com/socialcareitsolutions/public/images/serviceUserFiles/"+id+"/","");
                                        // loading a file and add it in a zip file
                                        JSZipUtils.getBinaryContent(url, function (err, data) {
                                        if (err) {
                                            throw err; // or handle the error
                                        }
                                        zip.file(filename, data, { binary: true });
                                        count++;
                                        if (count == links.length) {
                                            zip.generateAsync({ type: 'blob' }).then(function (content) {
                                            saveAs(content, zipFilename);
                                            });
                                        }
                                        });
                                    });
                                    }
                                
                            

                            </SCRIPT>
                            
                        </div>
                    </div>
       
                    <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12 serch-btns text-right"> -->
                        <!-- <button class="btn label-default active risk-add-btn show-upload" type="button"> Add New </button>
                        <button class="btn label-default risk-logged-btn logged-plans" type="button"> Logged Files </button>
                        <button class="btn label-default risk-search-btn" type="button"> Search </button> -->
                        <!-- <button class="btn label-default add-new-btn show-upload active" type="button"> Add New </button>
                        <button class="btn label-default logged-btn logged-plans" type="button"> Logged files </button>
                        <button class="btn label-default search-btn" type="button"> Search </button> -->
                    <!-- </div> -->

                    <!-- Add new Details -->
                    <!-- <div class="add-new-box risk-tabs">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="m-t-0 m-b-20 clr-blue fnt-20"> Add New - Details </h3>
                        </div> -->

                        <!-- alert messages -->
                        @include('frontEnd.common.popup_alert_messages')

                        <!-- 1st field -->
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Title: </label>
                                <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                    <div class="input-group popovr">
                                        <input type="text" name="file_title" required class="form-control add_title" placeholder="title" />
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- 2nd field -->
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Category: </label>
                                <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                    <div class="input-group popovr m-l-10">
                                        <div class="select-style">
                                            <select name="file_category" class="add_category">
                                                <option value="">Select Category </option>
                                                <?php foreach ($file_category as $key=>$value){ ?>
                                                <option value='{{ $value->id }}'> {{ ucfirst($value->name) }} </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                     
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 hide-upload custom-margin">
                            <form id="fileupload1" action="" method="POST" enctype="multipart/form-data"> -->
                      
                                <!-- The table listing the files available for upload/download -->
                                <!-- <div class="cus-height">
                                    <table role="presentation" class="table table-striped">
                                        <tbody class="files">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="CUSTOM-TEXT">
                                    <p>Click add files and navigation to the file location in the open file dialogue.</p>
                                </div>
                                <div class="row fileupload-buttonbar modal-footer m-t-0">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <!-- <span class="btn btn-success add_files_btn">
                                            <i class="fa fa-plus"></i>
                                            <span>Add files...</span> -->
                                            <!-- <input type="file" name="files[]" multiple id="inputImageUpload" > -->
                                        <!-- </span>
                                        <input type="file" name="su_files[]" multiple id="inputImageUpload" style="display:none" > -->
                                         <!--   start -->
                                        <!-- <button type="submit" class="btn btn-primary start submit_files_btn">
                                            <i class="fa fa-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel_full_upload"> -->
                                            <!-- <i class="glyphicon glyphicon-ban-circle"></i> -->
                                            <!-- <i class="fa fa-ban"></i>
                                            <span>Cancel upload</span>

                                        </button> -->
                                        <!-- The global file processing state -->
                                        <!-- <span class="fileupload-process"></span>
                                    </div>
                                    
                                </div>
                            </form> -->
                        </div> 
                    </div>

                    <!-- Logged Files -->
                    <!-- <div class="logged-box risk-tabs file-logged-box">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h3 class="m-t-0 m-b-20 clr-blue fnt-20"> Logged files </h3>
                        </div> -->
                        <!--logged files list shown here!-->
                        <!-- alert messages -->
                        @include('frontEnd.common.popup_alert_messages')
                        <!-- <div class="col-md-12 col-sm-12 col-xs-12 logged-plans-list">      -->
                        <!-- Logged files shown using ajax -->
                        </div>
                    </div>
                   
                   <!-- Search Box -->
                    <!-- <div class="search-box risk-tabs">
                        <form method="post" action="" id="files_search_form">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3 class="m-t-0 m-b-20 clr-blue fnt-20"> Search </h3>
                            </div> -->

                            <!-- 1st field -->
                            <!-- <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                    <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Title: </label>
                                    <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                        <div class="input-group popovr  m-l-10">
                                            <input type="text" name="search_file_title" class="form-control" placeholder="Enter Title" maxlength="255"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 cog-panel">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0 add-rcrd">
                                    <label class="col-md-1 col-sm-1 col-xs-12 p-t-7"> Category: </label>
                                    <div class="col-md-11 col-sm-11 col-xs-12 r-p-0">
                                        <div class="input-group popovr m-l-10">
                                            <div class="select-style">
                                                <select name="search_file_category">
                                                    <option value="">All Category </option>
                                                    <?php foreach ($file_category as $key=>$value){ ?>
                                                    <option value='{{ $value->id }}'> {{ ucfirst($value->name) }} </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="searched-logged-files cus-height" style="padding-left:34px"> -->
                            <!-- Using Ajax -->
                            </div>
                             <!-- p-b-0 -->
                            <!-- <div class="modal-footer m-t-0  recent-task-sec">
                                <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true"> Cancel </button>
                                <button class="btn btn-warning file_details_submit search_files_btn" type="button"> Confirm </button>
                            </div>
                        </form> 
                    </div> -->
                </div>
            </div>
         </div>
    </div>
</div>

<!-- CareTeam Members for fileManager Modal Start -->
<div class="modal fade" id="careTeamMembersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <a class="close mdl-back-btn" href="" data-toggle="modal" data-dismiss="modal" data-target="#filemngrModal">
                    <i class="fa fa-arrow-left" title=""></i>
                </a>
                <h4 class="modal-title">Send Email</h4>
            </div>
            <div class="modal-body" >
                <form method="post" action="{{ url('/service/file-manager/email') }}" id="sel_email_member">
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0">
                        <label class="col-md-2 col-sm-2 col-xs-12 p-t-7"> Care team members: </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <div class="select-style">
                                <select name="sel_care_team_id[]" class="team_member_select2" multiple="" />
                                    @foreach($care_team as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group col-md-12 col-sm-12 col-xs-12 p-0">
                        <label class="col-md-2 col-sm-2 col-xs-12 p-t-7"> Other email: </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" class="form-control" placeholder="" name="other_send_email" />
                        </div>
                    </div> -->
                    
                    <div class="form-group modal-footer m-t-0 modal-bttm">
                        <button class="btn btn-default" type="button" data-dismiss="modal" aria-hidden="true"> Cancel </button>
                        <input type="hidden" name="file_id" value="" id="log_file_id">
                        <input type="hidden" name="service_user_id" value="{{ $service_user_id }}" id="log_file_id">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-warning" type="submit"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- CareTeam Members for fileManager Modal End -->


<script >
    //(function($) {
    $(document).ready(function(){
        /*$('ul.pagination li.active')
            .prev().addClass('show-mobile')
            .prev().addClass('show-mobile');
        $('ul.pagination li.active')
            .next().addClass('show-mobile')
            .next().addClass('show-mobile');
        $('ul.pagination')
            .find('li:first-child, li:last-child, li.active')
            .addClass('show-mobile');*/
    //})(jQuery);
    });
</script>

<script>
    // start butoon i.e. upload all files
    $(document).ready(function(){
      
        var names = [];
        var file_index = 0;

        $(document).on('click','.submit_files_btn', function(){
            
            var file_category_id = $('input[name=\'file_category\']').val();
            alert(file_category_id);
            var formData = new FormData();
            //console.log(names);
            var total_files = names.length;
            if(total_files == 0){ // if no image is available to upload in list then do not run ajax
                return false;
            }
            // console.log(names);
            // console.log(total_files);
            
            var no_image = 0;
            for(var i = 0; i < total_files; i++ ){
                
                //sending files from the names array
                formData.append('files['+i+']', names[i]);

                if(names[i] != '') { //checking if keys are not empty
                    no_image++;
                }
            }

            // if no image is available to upload in list then do not run ajax
            if(no_image == 0) {
                return false;
            }

            formData.append('file_category_id', file_category_id);
            formData.append('service_user_id', "{{ $service_user_id }}");

            $('#filemngrModal .progress-bar-success').css('width','100%');
           
            $.ajax({
                url : "{{ url('/service/file-manager/add') }}",
                type : 'post',
                data:  formData,
                dataType : "json",
                processData : false,
                contentType : false,
                cache : false,
                success : function(resp) {
                    //console.log(resp);
                    
                    if(isAuthenticated(resp) == false){
                        $('#filemngrModal .progress-bar-success').css('width','0%');
                        return false;
                    }

                    $(resp).each(function(index) {
                        var data = $(this);
                        //console.log(data);
                        var response  = data[0].response;
                        var save_id   = data[0].save_id;
                        var file_index_value = data[0].file_index;
                        var file_name = data[0].file_name;
                        var row = $("tr[file_index='"+file_index_value+"']");

                        if(response == true){    
                            row.attr('save_id',save_id);
                            row.find('p.name').text(file_name);
                            row.find('.file_actions').html('<button class="btn btn-danger delete delete_file_btn" > <i class="fa fa-trash"></i> <span>Delete</span> </button>');
                            row.find('.progress-striped').remove();
                            names[file_index_value] = ''; //remove this image from image names array
                            //$('#inputImageUpload').val('');
                            //names = [];

                        } else{ 
                            row.find('.error').text("{{ COMMON_ERROR }}");
                            row.find('.progress-bar-success').css('width','0%');
                        } 
                    });
                }
            });
        return false;
        });

        // cancel and remove all the files which was in upload list. 
        $(document).on('click','.cancel_full_upload', function(){
            names = [];
            file_index = 0;
            $('.files').html(''); //make remove all selected files from div 
            return false;
        });

        // click on add file button > open select files
        $('.add_files_btn').click(function(){
            $("#inputImageUpload").click();
        });

        // when new files are selected on clicking on add files button
        $("#inputImageUpload").change(function(){
            var input = $(this)[0];
            var files = $(input.files);
            var invalid     = 0;

            files.each(function(index){
                
                var inp         = $(this);
                var filename    = inp.prop('name');
                var filename_arr= filename.split('.');
                var ext         = filename_arr.pop();
                ext             = ext.toLowerCase();
                
                if(ext == 'jpg' || ext == 'jpeg' || ext == 'png' || ext == 'pdf' || ext == 'doc' || ext == 'docx' || ext == 'wps') {
                    var filesize = inp.prop('size'); //bytes
                    var unit = 'B';
                    
                    if(filesize > 1048576){
                        filesize = filesize/1048576;
                        filesize = filesize.toFixed(2);
                        unit = 'MB';                    
                    } else if(filesize > 1024){
                        filesize = filesize/1024;
                        filesize = filesize.toFixed(2);
                        unit = 'KB';
                    } 
                    names.push(input.files[index]);

                    var reader = new FileReader();
                    reader.onload = function (e) 
                    {        
                        if(ext == 'jpg' || ext == 'jpeg' || ext == 'png') {
                            var preview = '<span class="preview"><image width="80" height="60" src="'+e.target.result+'" alt="No preview" /></span>';
                            var td_class = '';

                        } else if(ext == 'pdf') {
                            var preview = '<span class="preview" style="font-size:55px"><i class="fa fa-file-pdf-o"></i></span>';
                            var td_class = 'padding-top:0px';

                        } else if(ext == 'doc' || ext == 'docx'  || ext == 'wps' ) {
                            var preview = '<span class="preview" style="font-size:55px"><i class="fa fa-file-word-o"></i></span>';
                            var td_class = 'padding-top:0px';
                            
                        } else{
                            var preview = '<span class="preview"><image width="80" height="60" src="'+e.target.result+'" alt="No preview2" /></span>';
                            var td_class = 'padding-top:0px';
                        }
    
                      $('.files').append('<tr class="template-upload fade in" file_index="'+file_index+'" save_id="" > <td style="'+td_class+'">'+preview+' </td> <td><p class="name">'+filename+'</p> <strong class="error text-danger"></strong> </td> <td> <p class="size">'+filesize + unit +'</p> <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div> </td> <td  class="file_actions"> <button class="btn btn-primary start_btn"> <i class="fa fa-upload"></i> <span>Start</span> </button> <button class="btn btn-warning cancel_btn"> <i class="fa fa-ban"></i> <span>Cancel</span> </button> </td> </tr>');
                      file_index++;
                   };
                   reader.readAsDataURL(input.files[index]); 
                } else{ 
                    invalid = 1;
                }
            });
        
            if(invalid == 1){ //if any of the selected file was not of following formats then show this message.
                alert('Only .jpg,jpeg,png,pdf,doc,docx,wps formats are allowed.')
            }
        });        
        
        //SINGLE FILE UPLOAD
        
        // upload single file
        $(document).on('click','.start_btn', function(){

            var file_category_id = $('select[name=\'file_category\']').val();
            if(file_category_id == ''){
                $('select[name=\'file_category\']').parent().addClass('red_border');
                return false;
            } else{
                $('select[name=\'file_category\']').parent().removeClass('red_border');                
            }

            var row = $(this).closest('tr');
            var file_name = row.find('p.name').text();
            var file_index_value = row.attr('file_index');
          
            var formData = new FormData();
            formData.append('file', names[file_index_value]);
            formData.append('file_category_id', file_category_id);
            formData.append('service_user_id', "{{ $service_user_id }}");

            row.find('.progress-bar-success').css('width','100%');
           
            $.ajax({
                url : "{{ url('service/file-manager/upload/add') }}",
                type : 'post',
                data:  formData,
                dataType : "json",
                processData : false,
                contentType : false,
                cache : false,
                success : function(resp) {
                    if(isAuthenticated(resp) == false){
                        row.find('.progress-bar-success').css('width','0%');
                        return false;
                    }

                    var response = resp['response'];
                    var save_id  = resp['save_id'];
                    var file_name  = resp['file_name'];

                    if(response == true){ 
                        row.find('.progress-striped').remove();
                        row.attr('save_id',save_id);
                        row.find('p.name').text(file_name);

                        names[file_index_value] = ''; //remove this image from image names array
                                                
                        row.find('.file_actions').html('<button class="btn btn-danger delete delete_file_btn" > <i class="fa fa-trash"></i> <span>Delete</span> </button>');
                     
                    } else{ 
                        //$('.progress-bar-success').css('width','0%');
                        row.find('.progress-bar-success').css('width','0%');
                        alert('Some Error Occured. Please try again after some time.');
                    }
                }
            });
        return false;
        });

        //cancel file which is in the upload list and is not uploaded yet
        $(document).on('click','.cancel_btn', function(){
            
            var row = $(this).closest('tr');
            var file_name = row.find('p.name').text();
            file_index_value = row.attr('file_index');
            //names.pick_and_remove(file_index_value);

            names[file_index_value] = '';
            //console.log(names[file_index_value]);           
            row.fadeOut();           
            return false;
        });

        // delete uploaded files (delete file from db and remove it from upload list)           
        $(document).on('click','.delete_file_btn', function(){
            var row = $(this).closest('tr');
            var save_id = row.attr('save_id');
            var file_index = row.attr('file_index');
            
            $.ajax({
                url : "{{ url('/service/file-manager/delete') }}"+'/'+save_id,
                type : 'get',
                success:function(resp){
                    if(isAuthenticated(resp) == false){
                        return false;
                    }

                    if(resp == 'true'){
                        row.fadeOut();  
                    } else{
                        alert('Some error occured. Please try again after some time.');
                    }
                }
            });
            return false;
        });
    });
</script>



<script>
    //click search btn
    $(document).ready(function(){

        $('input[name=\'search_file_title\']').keydown(function(event) { 
            var keyCode = (event.keyCode ? event.keyCode : event.which);   
            if (keyCode == 13) {
                $('.search_files_btn').click();        
                return false;
            }
        });
        
        $(document).on('click','.search_files_btn', function(){

            var search = $('input[name=\'search_file_title\']').val();
            var search_file_category = $('select[name=\'search_file_category\']').val();
            //alert(search_file_category); return false;
            // alert(service_user_id); return false; 
            search = jQuery.trim(search);

            if(search == '' && search_file_category == ''){
                //alert('Please select at least o')
                return false;
            }

            /*if(search == '' || search == '0'){
                $('input[name=\'search_file_title\']').addClass('red_border');
                return false;
            } else{
                $('input[name=\'search_file_title\']').removeClass('red_border');
            }

            if(search_file_category == ''){
                $('input[name=\'search_file_category\']').parent().addClass('red_border');
                return false;
            } else{
                $('input[name=\'search_file_category\']').parent().removeClass('red_border');
            }*/

            var service_user_id = "{{ $service_user_id }}";
         
            $('.loader').show();
            $('body').addClass('body-overflow');
            
            $.ajax({
                type : 'get',
                url  : "{{ url('/service/file-managers') }}"+'/'+service_user_id+'?search='+search+'&category='+search_file_category,
                success : function(resp){
                    if(isAuthenticated(resp) == false){
                        return false;
                    }
                    //alert(resp);
                    if(resp == ''){
                        $('.searched-logged-files').html('No Files found.');
                    } else{
                        $('.searched-logged-files').html(resp);
                    }
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
    //in logged btn click get data
    $(document).ready(function(){
        $(document).on('click','.logged-plans', function(){
            
            $('.loader').show();
            $('body').addClass('body-overflow');

            $('.hide-upload').hide();
            // $('.logged-plans-confirm-btn').hide();
            var service_user_id = "{{ $service_user_id }}";
            $.ajax({
                type : 'get',
                url  : "{{ url('/service/file-managers') }}"+'/'+service_user_id,
                success : function(resp){  
                    if(isAuthenticated(resp) == false){
                        return false;
                    } 
                    if(resp == '') {
                        $('.logged-plans-list').html('<div class="text-center p-b-20" style="width:100%">No Records found.</div>');    
                    } else {
                        $('.logged-plans-list').html(resp);
                    }

                    $("[data-fancybox]").fancybox({
                        // Options will go here
                    });
                    // $('.logged-plans-list').html(resp);
                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                }
            });
        });
        return false;
    });
</script>

<script>
   
    $(document).ready(function(){
        
        //delete a row
        $(document).on('click','.delete-logged-file', function(){
            
            if(!confirm('{{ DEL_CONFIRM }}')){
                return false;
            }

            var logged_file_id = $(this).attr('logged_file_id');
            //alert(logged_file_id); return false;
            $(this).addClass('active_record');
    
            $('.loader').show();
            $('body').addClass('body-overflow');

            $.ajax({
                type : 'get',
                url  : "{{ url('/service/file-manager/delete/') }}"+'/'+logged_file_id,
                //data : { 'logged_file_id' : logged_file_id, '_token' : file_token },
                success : function(resp){
                    if(isAuthenticated(resp) == false){
                        return false;
                    }
                    // alert(resp); return false;

                    if(resp == 'true') {
                        $('.active_record').closest('.delete-file').remove();
                        //show success delete message
                        $('span.popup_success_txt').text('File Deleted Successfully');                   
                        $('.popup_success').show();
                        setTimeout(function(){$(".popup_success").fadeOut()}, 5000);
                    } else{

                        //show delete message error
                        $('span.popup_error_txt').text('Error Occured');
                        $('.popup_error').show();
                    }
                    $('.loader').hide();
                    $('body').removeClass('body-overflow');
                }
            });
            return false;
        });

        $('.show-upload').click(function(){
            $('.hide-upload').show();
        });
        
        //email to careTeam members
        $(document).on('click','.send_email', function() {
            
            var logged_file_id = $(this).attr('logged_file_id');
            
            $('#log_file_id').val(logged_file_id);
            $('#filemngrModal').modal('hide');
            $('#careTeamMembersModal').modal('show');

        });
        
    });
</script>

<script>
    //pagination of file manager
    $(document).on('click','.file_mngr_paginate .pagination li',function(){
        var new_url = $(this).children('a').attr('href');
        if(new_url == undefined){
            return false;
        }
        
        $('.loader').show();
        $('body').addClass('body-overflow');

        $.ajax({
            type : 'get',
            url  : new_url,
            success:function(resp){
                $('.logged-plans-list').html(resp);
                //$('#healthmodal').modal('show');
                $('.loader').hide();
                $('body').removeClass('body-overflow');
            }
        });
        return false;
    });
</script>

<script type="">
    
    //  $(document).ready(function(){

    //     $(document).on('.wrinkled', function(){
    //         $(this).closest('body').find('.fancybox-content').addClass('testing');
    //     });
    // });

    // function printDiv() {

    //     var  id_print = $('.fancybox-container').attr('id');
    //     console.log(id_print);
    //     var divToPrint=document.getElementById(id_print);

    //     var newWin=window.open('','PRINT', 'height=400,width=600');

    //     newWin.document.open();

    //     newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

    //     newWin.print();
    //     //newWin.document.close();
    //     newWin.close();
    //     return true;

    //     //setTimeout(function(){newWin.close();},1000);

    // }
    
    
</script>
<script type="text/javascript">
//var  id_print = $('.fancybox-container').attr('id');
//console.log(id_print);
// function printDiv(divName) {
//      var printContents = document.getElementById(divName).innerHTML;
//      var originalContents = document.body.innerHTML;
//     alert(printContents);
//      document.body.innerHTML = printContents;

//      window.print();

//      document.body.innerHTML = originalContents;
// }
</script>


<script >
    //select options 
    $(document).ready(function(){
        $(".team_member_select2").select2({
              // dropdownParent: $('#addshiftmodal'),
            placeholder: "Select Care Team Member"
        });
     });
</script>

<script type="text/javascript">
   $(function() {
        $("#sel_email_member").validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.insertAfter(element.parent());
            },
            rules: {
                'sel_care_team_id[]': {
                    required: true
                }
            },
            messages: {
                'sel_care_team_id[]': {
                    required: "This field is required."
                }
            },
            submitHandler: function(form) {
              form.submit();
            }
        })
        return false;   
    });
</script>
<!-- Drag and Drop JS -->
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> --}}
        <script>
            /*! Image Uploader - v1.2.3 - 26/11/2019
 * Copyright (c) 2019 Christian Bayer; Licensed MIT */
!function(e){e.fn.imageUploader=function(t){let n,i={preloaded:[],imagesInputName:"images",preloadedInputName:"preloaded",label:"Drag & Drop files here or click to browse",extensions:[".jpg",".jpeg",".png",".gif",".svg",".pdf",".docx"],mimes:["image/jpeg","image/png","image/gif","image/svg+xml"],maxSize:void 0,maxFiles:void 0},a=this,s=new DataTransfer;a.settings={},a.init=function(){a.settings=e.extend(a.settings,i,t),a.each(function(t,n){let i=o();if(e(n).append(i),i.on("dragover",r.bind(i)),i.on("dragleave",r.bind(i)),i.on("drop",p.bind(i)),a.settings.preloaded.length){i.addClass("has-files");let e=i.find(".uploaded");for(let t=0;t<a.settings.preloaded.length;t++)e.append(l(a.settings.preloaded[t].src,a.settings.preloaded[t].id,!0))}})};let o=function(){let t=e("<div>",{class:"image-uploader"});n=e("<input>",{type:"file",id:a.settings.imagesInputName+"-"+h(),name:a.settings.imagesInputName+"[]",accept:a.settings.extensions.join(","),multiple:""}).appendTo(t);e("<div>",{class:"uploaded"}).appendTo(t);let i=e("<div>",{class:"upload-text"}).appendTo(t);e("<i>",{class:"fa fa-cloud-upload"}).appendTo(i),e("<span>",{text:a.settings.label}).appendTo(i);return t.on("click",function(e){d(e),n.trigger("click")}),n.on("click",function(e){e.stopPropagation()}),n.on("change",p.bind(t)),t},d=function(e){e.preventDefault(),e.stopPropagation()},l=function(t,i,o){let l=e("<div>",{class:"uploaded-image"}),r=(e("<img>",{src:t}).appendTo(l),e("<button>",{class:"delete-image"}).appendTo(l));e("<i>",{class:"fa fa-times"}).appendTo(r);if(o){l.attr("data-preloaded",!0);e("<input>",{type:"hidden",name:a.settings.preloadedInputName+"[]",value:i}).appendTo(l)}else l.attr("data-index",i);return l.on("click",function(e){d(e)}),r.on("click",function(t){d(t);let o=l.parent();if(!0===l.data("preloaded"))a.settings.preloaded=a.settings.preloaded.filter(function(e){return e.id!==i});else{let t=parseInt(l.data("index"));o.find(".uploaded-image[data-index]").each(function(n,i){n>t&&e(i).attr("data-index",n-1)}),s.items.remove(t),n.prop("files",s.files)}l.remove(),o.children().length||o.parent().removeClass("has-files")}),l},r=function(t){d(t),"dragover"===t.type?e(this).addClass("drag-over"):e(this).removeClass("drag-over")},p=function(t){d(t);let i=e(this),o=Array.from(t.target.files||t.originalEvent.dataTransfer.files),l=[];e(o).each(function(e,t){a.settings.extensions&&!g(t)||a.settings.mimes&&!c(t)||a.settings.maxSize&&!f(t)||a.settings.maxFiles&&!m(l.length,t)||l.push(t)}),l.length?(i.removeClass("drag-over"),u(i,l)):n.prop("files",s.files)},g=function(e){return!(a.settings.extensions.indexOf(e.name.replace(new RegExp("^.*\\."),"."))<0)||(alert(`The file "${e.name}" does not match with the accepted file extensions: "${a.settings.extensions.join('", "')}"`),!1)},c=function(e){return!(a.settings.mimes.indexOf(e.type)<0)||(alert(`The file "${e.name}" does not match with the accepted mime types: "${a.settings.mimes.join('", "')}"`),!1)},f=function(e){return!(e.size>a.settings.maxSize)||(alert(`The file "${e.name}" exceeds the maximum size of ${a.settings.maxSize/1024/1024}Mb`),!1)},m=function(e,t){return!(e+s.items.length+a.settings.preloaded.length>=a.settings.maxFiles)||(alert(`The file "${t.name}" could not be added because the limit of ${a.settings.maxFiles} files was reached`),!1)},u=function(t,n){t.addClass("has-files");let i=t.find(".uploaded"),a=t.find('input[type="file"]');e(n).each(function(e,t){s.items.add(t),i.append(l(URL.createObjectURL(t),s.items.length-1),!1)}),a.prop("files",s.files)},h=function(){return Date.now()+Math.floor(100*Math.random()+1)};return this.init(),this}}(jQuery);
        </script>
        <script>
    $(function () {

        $('.input-images-1').imageUploader();

        let preloaded = [
            {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            {id: 2, src: 'https://picsum.photos/500/500?random=2'},
            {id: 3, src: 'https://picsum.photos/500/500?random=3'},
            {id: 4, src: 'https://picsum.photos/500/500?random=4'},
            {id: 5, src: 'https://picsum.photos/500/500?random=5'},
            {id: 6, src: 'https://picsum.photos/500/500?random=6'},
        ];

        $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
        });

        $('form').on('submit', function (event) {

            // Stop propagation
            event.preventDefault();
            event.stopPropagation();

            // Get some vars
            let $form = $(this),
                $modal = $('.modal');

            // Set name and description
            $modal.find('#display-name span').text($form.find('input[id^="name"]').val());
            $modal.find('#display-description span').text($form.find('input[id^="description"]').val());

            // Get the input file
            let $inputImages = $form.find('input[name^="images"]');
            if (!$inputImages.length) {
                $inputImages = $form.find('input[name^="photos"]')
            }

            // Get the new files names
            let $fileNames = $('<ul>');
            for (let file of $inputImages.prop('files')) {
                $('<li>', {text: file.name}).appendTo($fileNames);
            }

            // Set the new files names
            $modal.find('#display-new-images').html($fileNames.html());

            // Get the preloaded inputs
            let $inputPreloaded = $form.find('input[name^="old"]');
            if ($inputPreloaded.length) {

                // Get the ids
                let $preloadedIds = $('<ul>');
                for (let iP of $inputPreloaded) {
                    $('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
                }

                // Show the preloadede info and set the list of ids
                $modal.find('#display-preloaded-images').show().html($preloadedIds.html());

            } else {

                // Hide the preloaded info
                $modal.find('#display-preloaded-images').hide();

            }

            // Show the modal
            $modal.css('visibility', 'visible');
        });

        // Input and label handler
        $('input').on('focus', function () {
            $(this).parent().find('label').addClass('active')
        }).on('blur', function () {
            if ($(this).val() == '') {
                $(this).parent().find('label').removeClass('active');
            }
        });

        // Sticky menu
        let $nav = $('nav'),
            $header = $('header'),
            offset = 4 * parseFloat($('body').css('font-size')),
            scrollTop = $(this).scrollTop();

        // Initial verification
        setNav();

        // Bind scroll
        $(window).on('scroll', function () {
            scrollTop = $(this).scrollTop();
            // Update nav
            setNav();
        });

        function setNav() {
            if (scrollTop > $header.outerHeight()) {
                $nav.css({position: 'fixed', 'top': offset});
            } else {
                $nav.css({position: '', 'top': ''});
            }
        }
    });
</script>
<script>
    function folderclick(name,id){
        //alert(name)
        //alert(id)
        $('#myTab').hide();
        $('.textfilename').text('('+name+')')
        $('#t'+id).show();
    }
    function showfolders(name,id){
        $('#myTab').show();
        $('#t'+id).hide();
        $('.textfilename').text('')
    }
</script>
