
<div class="modal-dialog modal-dialog-centered width-open" id="width-open">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-body">
            <div class="row">

                <!-- start -->
                <div class="grid-item anime-item work-item col-12 private public modal-ui-open">
                    <div class="flame-it-modal">
                        <i class="material-icons">whatshot</i>
                    </div>
                    <div class="box modal-uio-trigger" id="imgMain">

                        <div class="box-cover">
                            <div class="modal-img url-open" id="url-open"></div>
                            <div class="box-hover">
                                <!-- <span class="status">
                                    <i class="material-icons">lock</i>
                                </span>-->
                            </div>
                            <!-- VIP -->
                            <div class="main-details" id="img-popup-overlay" style="visibility: hidden;">
                                <div class="icons-row">
                                    <div class="icons-column">
                                        <i class="material-icons">lock</i> Private
                                    </div>
                                </div>
                            </div>
                            <!-- END VIP -->
                        </div>
                    </div>
                </div>
                <!-- / -->

            </div>




            @if (strpos(Request::path(), 'open') == false)


            <div class="tab-imgview">
                <div class="tab-ficture mb-2">
                @if(isset($model) && $model->getUser()->id === Auth::user()->id)
                <a href="#" class="edit-img close-modal">settings</a>
                @else
                <a href="#" class="fav-modal active"><i class="material-icons" title="favorite">favorite</i></a>
                @endif
                <a href="{{ url('/model/username/media') }}" class="fav-modal mr-1"><i class="material-icons" title="link">link</i></a>
                    @if(isset($model))
                    <a href="/model/{{ $model->getUser()->name }}" class="">{{ $model->getUser()->name }}</a>  
                    @endif
                </div>
                <p class="description-open"></p>
                <p class="time-open"></p>
                <div class="field">
                    <div class="tags">
                    </div>
                </div>


            </div>
            @if(isset($model) && $model->getUser()->id === Auth::user()->id)
            <div class="tab-imgedit">
              <div class="tab-ficture-open">
                <a href="#" class="edit-img close-modal">close</a>
                
                <a href="#" class="setbanner">Set as Banner</a> 
            </div>  
                <!-- Modal content-->

            <!--
                <div class="row">
               
                    <div class="grid-item anime-item col-md-8 offset-md-2 col-lg-12 offset-lg-0 work-item public">
                        <a class="box"
                           href="{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}"
                           title="Photo Description">
                            <div class="box-cover">
                                <div class="box-img"
                                     style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}')"></div>
                                
                            </div>
                        </a>
                        <a href="#">
                        <div class="work-info">
                            <div class="box-inner">
                                <h4 class="box-inner__search"><i class="material-icons">search</i></h4>
                            </div>
                        </div>
                    </a>
                    </div>
              
                </div>-->
             
                <div class="btn-group toggle-tab mt-3" data-toggle="buttons" id="edit-image-type">
                    <label class="btn btn-primary active" data-type="public">
                        <input type="radio" name="options" id="option1" checked><div class="material-icons">lock_open</div>Public
                    </label>
                    <label class="btn btn-primary" data-type="vip">
                        <input type="radio" name="options" id="option2"><div class="material-icons">lock</div>VIP
                    </label>
                    <label class="btn btn-primary" data-type="unlisted">
                        <input type="radio" name="options" id="option2"><div class="material-icons">block</div>Unlisted
                    </label>
                </div>

                <div class="field">
                    <label for="edit-image-description">Title</label>
                    <input type="text" class="form-control" id="edit-image-description"
                           required="true">
                </div>

                <div class="field mb-20">
                    <label for="edit-image-tags">Tags (seperate with comma)</label>
                    <input type="text" data-role="tagsinput" class="form-control" id="edit-image-tags" />
                </div>

                <!-- Preview-->
            <!-- <div id='preview'><img src='{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}' class='img-fluid'></div>-->

                <!--<div class="set">
                    <div class="details">
                        <p>Set profile banner</p>

                    </div>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>-->

                <button type="button" class="btn button edit-img" onclick="editImage()">Update Image</button>

                <button type="button" class="btn w-100 btn-link" onclick="deleteImage()">Delete</button>



            </div>
            @endif

            @endif

        </div>
    </div>

</div>