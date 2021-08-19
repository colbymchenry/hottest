<!-- Modal -->
<div id="AccountTypeModal" class="modal fade" role="dialog">

    <div class="modal-dialog modal-dialog-centered text-center">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            
                <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
            </div>
         
            <div class="modal-body">
             
                                        
            <p class="mb-20">Profile Type</p>
                                        <div id="account-type" class="btn-group toggle-tab mb-20" data-toggle="buttons">
                                         
                                            <button class="btn btn-primary active mb-20" id="change-user-btn">
                                                <input type="radio" name="user" id="change-user" value="user">
                                                <div class="material-icons">person</div>
                                                User
                                            </button>
                                            <button class="btn btn-primary mb-20" id="change-model-btn">
                                                <input type="radio" name="model" id="change-model" value="model">
                                                <div class="material-icons">stars</div>
                                                Model
                                            </button>
                                        </div>
                                        <div id="fold-agent">
                                            
                                            <a href="{{ url('/model/username') }}" id="change-btn" class="btn create-button mb-20 disabled">Update Profile</a>
                                            <a data-dismiss="modal" aria-label="Cancel" class="btn btn-link">Cancel</a>
                                        </div>

                     
            </div>
        </div>
    </div>
</div>

