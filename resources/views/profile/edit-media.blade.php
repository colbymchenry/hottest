<!-- Modal -->
<div id="uploadModal" class="modal fade modal-upload" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
            <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
                <!-- Form --><!--
							<form method='post' action='' enctype="multipart/form-data">
							Select file : <input type='file' name='file' id='file' class='form-control' ><br>
							<input type='button' class='btn btn-info' value='Upload' id='upload'>
                            </form>-->
                <div class="row">
                    <!-- Public Item -->
                    <div class="grid-item anime-item col-12 work-item public">
                        <a class="box work-image image-popup-vertical-fit"
                           href="{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}"
                           title="Photo Description">
                            <div class="box-cover">
                                <div class="box-img"
                                     style="background-image: url('{{ asset('dist/users/01_miss_julianne/uploads/photo4.jpg') }}')"></div>
                                
                            </div>
                        </a>
                        <a href="work-single-page.html" data-type="page-transition">
                            <div class="work-info">
                                <div class="box-inner">
                                    <span class="box-inner__cat">2 weeks ago</span>
                                    <h4 class="box-inner__title">546 <i class="material-icons">favorite</i></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- /Private Item -->
                </div>
                <div class="btn-group toggle-tab" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" name="options" id="option1" checked><div class="material-icons">lock_open</div>Public
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2"><div class="material-icons">lock</div>VIP
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2"><div class="material-icons">block</div>Unlisted
                    </label>                            
                </div>               

                <div class="field">
                    <label for="imagetitle">Title</label>
                    <input type="text" class="form-control" id="imagetitle"
                           required="true">
                </div>

                <div class="field">
                    <label for="imagetitle">Tags (seperate with comma)</label>
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

            <!-- TODO: When are these used? bc view-image seems to have the same stuff -->
                <button type="button" class="btn button" onclick="editImage()">Save</button>

                <button type="button" class="btn w-100 btn-link" onclick="deleteImage()">Delete</button>

            </div>

        </div>

    </div>
</div>