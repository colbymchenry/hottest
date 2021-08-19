@extends('layouts.app-fox')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="tab-profile">
                <div class="profile">

                    <div class="row view-mainbill">

                    <!-- start -->
                    <div class="grid-item col-12 private public mainbill">
                     
                      
                        <!--<div class="title mobile-gone" data-toggle="modal" data-target="#SettingsModal">
                            <div class="edit-username">
								<span><i class="fas fa-plus-circle"></i></span> 
                            </div>                            
                            <h1>Username</h1>
                        </div>-->
                        
                            <div class="box-profile banner-image mb-20">
                                
                                <div class="box-cover profile">
                                    <div class="box-img-profile"
                                         style="background-image: url('')"></div>

                                        <div class="box-hover">
                                                <span class="verified" data-toggle="tooltip" data-placement="top"
                                                    title="Verified">
                                                        <i class="material-icons">check</i>
                                                    </span>
                                        </div>
                                        <button class="btn snp disabled" data-toggle="modal" data-target="#SnapChatModal" id="SnapChatButton">  <!-- when save clicked for private show the settings popup modal, to add paypal and set a price, or an add later button maybe -->
                                                
                                                <div class="edit-add" id="snp-add">
													<span><i class="fas fa-plus-circle"></i></span>
                                                </div>
                                                <div class="cost hidden" id="snp-cost">
													<span><i class="fas fa-star"></i></span>
                                                </div>
                                                
                                                <span class="fab fa-snapchat-ghost"></span>
                                        </button>
                                        <button class="btn msg disabled" data-toggle="modal" data-target="#MessageModal" id="MessageButton"> <!-- when save clicked for private show the settings popup modal, to add paypal and set a price, or an add later button maybe -->
                                                                                      
                                                <div class="edit-add" id="msg-add">
													<span><i class="fas fa-plus-circle"></i></span>
                                                </div>
                                                <div class="cost hidden" id="msg-cost">
													<span><i class="fas fa-star"></i></span>
                                                </div>
                                                
                                                <span class="fas fa-comment"></span>
                                        </button>

                                    <div class="photo" id="avatar-div"> 
                                        <div class="edit-pic">
											<span><i class="fas fa-plus-circle"></i></span> <!-- replace fa-plus-circle with fa-check if done right (can also add class 'done' to div "edit-pic", to show green)--->
                                        </div> 
                                        <img class="avatar-xxl edit"
                                             src="{{ asset('images/defaults/user_logo3.png') }}"
                                             alt="Modelname">
                                    </div>

                                    <div class="box-inner-model">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-12">
                                                
                                                <h2>Username</h2>
                                                    <button id="follow-btn" data-toggle="modal" data-target="#PrivateSettingsModal"
                                                            class="settings-button bg-private button-icon-right"> 
                                                        Private Settings
                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                        <div class="row mb-20">
                            <!-- Upload -->
                            <div class="grid-item anime-item work-item col-4 private public">
                            <div class="edit-upload">
								<span><i class="fas fa-plus-circle"></i></span> <!-- replace fa-plus-circle with fa-check if done right -->
                            </div> 
                                <div class="box edit-modal upload-image">
                                    <div class="box-cover" onclick="imageSubmit()"> <!-- when added as private and price hasnt been setup, show a popup the settings modal (to set a price and link paypal), or an add later button maybe -->
                                        <div class="modal-img" style="background-image: url('')"></div>
                                        <div class="box-hover">
                                            <!-- <span class="status">
                                                <i class="material-icons">lock</i>
                                            </span>-->
                                        </div>
                                        <div class="main-details">
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                            <!-- / -->
                            <!-- Upload -->
                            <div class="grid-item anime-item work-item col-4 private public">
                            <div class="edit-upload">
								<span><i class="fas fa-plus-circle"></i></span> <!-- replace fa-plus-circle with fa-check if done right -->
                            </div>                                
                                <div class="box edit-modal upload-image">
                                    <div class="box-cover" onclick="imageSubmit()"> <!-- when added as private and price hasnt been setup, show a popup the settings modal (to set a price and link paypal), or an add later button maybe -->
                                        <div class="modal-img" style="background-image: url('')"></div>
                                        <div class="box-hover">
                                            <!-- <span class="status">
                                                <i class="material-icons">lock</i>
                                            </span>-->
                                        </div>
                                        <div class="main-details">
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                            <!-- / -->
                             <!-- Upload -->
                             <div class="grid-item anime-item work-item col-4 private public">
                                <div class="edit-upload">
								<span><i class="fas fa-plus-circle"></i></span> <!-- replace fa-plus-circle with fa-check if done right -->
                                </div>                                 
                                <div class="box edit-modal upload-image">
                                    <div class="box-cover" onclick="imageSubmit()"> <!-- when added as private and price hasnt been setup, show a popup the settings modal (to set a price and link paypal), or an add later button maybe -->
                                        <div class="modal-img" style="background-image: url('')"></div>
                                        <div class="box-hover">
                                            <!-- <span class="status">
                                                <i class="material-icons">lock</i>
                                            </span>-->
                                        </div>
                                        <div class="main-details">
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                            <!-- / -->                           
                        </div>
                       <!-- <div class="row">
                            <div class="col-12 mb-20">
                            <button class="btn create-button disabled">Create Model Page</button>
                            </div>
                        </div>-->

                    </div>
                </div>
            </div>
            
   


        </div>
    </div>


@endsection

@section('js_after')

<script type="text/javascript">
    $(window).on('load',function(){
        $('#CreateModal').modal('show');
    });
</script>



@endsection