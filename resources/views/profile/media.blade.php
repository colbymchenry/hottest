@extends('layouts.app-fox')

@section('content')
<div class="row">
        <div class="col-md-8 offset-md-2">
                <!-- Modal content-->
                <div class="mx-auto portrait mb-20" id="width-open">
            
                        <div class="row">

                            <!-- start -->
                            <div class="grid-item anime-item work-item col-12 private public modal-ui-open">
                                <div class="flame-it-modal">
                                    <i class="material-icons">whatshot</i>
                                </div>
                                <div class="box modal-uio-trigger portrait" id="imgMain">

                                    <div class="box-cover">
                                        <div class="modal-img url-open portrait" id="url-open" style="background-image: url('http://162.243.166.8/images/15cbae1327282b.jpg')"></div>
                                        <div class="box-hover">
                                            <!-- <span class="status">
                                                <i class="material-icons">lock</i>
                                            </span>-->
                                        </div>
                                        <!-- VIP -->
                                        <div class="main-details" id="img-popup-overlay" style="visibility: hidden;">
                                            <div class="icons-row">
                                                <div class="icons-column">
                                                    <i class="material-icons">lock</i> VIP
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END VIP -->
                                    </div>
                                </div>
                            </div>
                            <!-- / -->

                        </div>





                        <div class="tab-imgview">
                            
                            <a href="#" class="edit-img close-modal">edit</a>
                        
                            <a href="#" class="fav-modal active"><i class="material-icons" title="favorite">favorite</i></a>
                        

                            <div class="field">
                            <p>Miss Julianne</p>  
                                <h5 class="description-open mb-2"></h5>
                                
                                <p class="time-open">2 weeks ago</p>
                            </div>
                            <div class="field">
                                <div class="tags">
                                </div>
                            </div>


                        </div>
                    
                        <div class="tab-imgedit">
                            <a href="#" class="edit-img close-modal">close</a>

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

                            <div class="btn-group toggle-tab" data-toggle="buttons" id="edit-image-type">
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

                            <div class="field">
                                <label for="edit-image-tags">Tags (seperate with comma)</label>
                                <input type="text" data-role="tagsinput" class="form-control" id="edit-image-tags" />
                            </div>

                            <!-- Preview-->
                        <!-- <div id='preview'><img src='{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}' class='img-fluid'></div>-->
                            <div class="set">
                                <div class="details">
                                    <p>Set profile banner</p>

                                </div>
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>


                            <button type="button" class="btn button edit-img" onclick="editImage()">Save</button>

                            <button type="button" class="btn w-100 btn-link" onclick="deleteImage()">Delete</button>



                        </div>
                        


                    </div>
             
        </div>
    </div>
</div>





@endsection