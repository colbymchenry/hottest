<div class="modal-dialog modal-dialog-centered width-upload dark" id="width-upload">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
                <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
            </div>
        <div class="modal-body">
     <!--    <a href="{{ url('/uploads') }}"><i class="material-icons">photo</i> Unlisted Uploads</a>-->

            <div class="row mb-20">

                <!-- Featured Item (shows for all) -->
                <div class="grid-item anime-item work-item col-12 private public">
                <div class="box edit-modal upload-image" id="uploadMain">
                <!--- padding-top must change dpending on photo height... also, remove data-toggle continues below-->
                <!--  "upload-image" toggles to edit-image or locked-image or nothing if being sent as public-->
                    <div class="box-cover" onclick="imageSubmit()">
                        <div id="model-upload-prev" class="modal-img url-upload" style="background-image: url('')"></div>
                        <div id="model-upload-prev-overlay" class="box-hover">
                            <!-- <span class="status">
                                <i class="material-icons">lock</i>
                            </span>-->
                        </div>
                        <div class="main-details">

                                <div class="icons-row"><!--
                                    <div class="icons-column">
                                            <div class="name">Miss Julianne</div>
                                    </div>-->	
                                  <!--  <div class="icons-column">
                                            <i class="material-icons">lock_open</i> Public
                                    </div>	       -->                               								   							   
                                </div>
                            </div>                             
                    </div>
                </div>

                </div>
                <!-- / -->

         
                </div>
                <div id="upload-image-type" class="btn-group toggle-tab mb-20" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="public"><div class="material-icons">lock_open</div>Public
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="vip"><div class="material-icons">lock</div>Private
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="unlisted"><div class="material-icons">block</div>Unlisted
                    </label>                            
                </div>  
                <!--<div class="row">
                    <div class="col-2">
                        <label class="btn btn-link" value="270" onClick="rotateImage(this.value);" style="text-align:right;text-decoration:none">
                            <div class="material-icons">rotate_left</div><span class="mobile-gone">Rotate</span>
                        </label>  
                    </div>   
                    <div class="col-8 btn-group toggle-tab" data-toggle="buttons">               
                        <label class="btn btn-primary square-btn">
                            <input type="radio" name="square"><div class="material-icons">crop_square</div>Square
                        </label>
                        <label class="btn btn-primary portrait-btn">
                            <input type="radio" name="portrait"><div class="material-icons">crop_portrait</div>Portrait
                        </label>
                        <label class="btn btn-primary landscape-btn">
                            <input type="radio" name="wide"><div class="material-icons">crop_5_4</div>Wide
                        </label>  
                    </div>
                    <div class="col-2">
                        <button class="btn btn-link" value="90" onClick="rotateImage(this.value);" style="text-align:left;text-decoration:none">
                            <div class="material-icons">rotate_right</div><span class="mobile-gone">Rotate</span>
                        </button>                           
                    </div>   
                </div>-->

            
                <div class="field">
                    <label for="upload-image-description">Title</label>
                    <input id="upload-image-description" type="text" class="form-control"
                           required="true">
                </div>

                <div class="field mb-20">
                    <label for="upload-image-tags">Tags (seperate with comma)</label>
                    <input id="upload-image-tags" type="text" data-role="tagsinput" class="form-control" />
                </div>
                
                <div class="field">
                    <button onclick="submitImage()" id="upload-image-btn" type="button" class="btn button">Upload</button>
                    <button type="button" class="btn w-100 btn-link">Cancel</button>
                </div>


        </div>
    </div>
    <!-- end Modal -->
</div>

{{ Form::open(['route' => 'upload_image', 'files' => true, 'id' => 'image_form', 'class' => 'hidden', 'method' => 'post']) }}
@csrf
@honeypot
{{ Form::label('image', 'User Photo',['class' => 'control-label']) }}
{{ Form::file('user_photo', ['id' => 'image_input', 'accept' => 'image/*']) }}
{{ Form::text('type', 'Type', ['id'=>'upload-img-type',  'value' => 'public']) }}
{{ Form::text('tags', 'Tags', ['id'=>'upload-img-tags',  'value' => '']) }}
{{ Form::text('description', 'Description', ['id'=>'upload-img-description',  'value' => '']) }}
{{Form::submit('Save', ['class' => 'btn btn-success']) }}

{{ Form::close() }}