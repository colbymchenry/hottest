<!-- Modal -->
<div id="SnapChatModal" class="modal fade" role="dialog"> 
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
            </div>
            <div class="modal-body modal-edit">

                <h4 class="text-center">Snapchat</h4>
                <hr>
                @if(Auth::user()->name == $model->getUser()->name)
                <div id="snapchat-type" class="btn-group toggle-tab mb-20" data-toggle="buttons">
                    <hr>
                    <label class="btn btn-primary" id="snapchatPublic-btn">
                        <input type="radio" name="public" id="snap-public" value="snap-public"><div class="material-icons">lock_open</div>Public
                    </label>
                    <label class="btn btn-primary {{ $model->getPricing(ProductType::$SNAPCHAT) != null ? 'active focus' : '' }}" id="snapchatPrivate-btn">
                        <input type="radio" name="private" id="snap-private" value="snap-private"><div class="material-icons">lock</div>Private
                    </label>
                    <label class="btn btn-primary {{ $model->getPricing(ProductType::$SNAPCHAT) != null ? '' : 'active focus' }}" id="snapchatUnlisted-btn">
                        <input type="radio" name="unlisted" id="snap-unlisted" value="snap-unlisted"><div class="material-icons">block</div>Unlisted
                    </label>    
                    <hr>                        
                </div> 
                <hr>
                <div class="field mb-20" id="snapchat-add-username" style="display:none;">
                <p class="mb-20">Allow users to see your Snapchat and add you.</p>
                    
                    <input type="text" class="form-control"
                           required="true" placeholder="Username">
                </div>

                <div class="field mb-20" id="snapchat-add-cost" style="display:none;">
                <p class="mb-20">Monthly subscription to Snapchat. Get notified when to add/unadd a snapchat username.</p>
                    
                    <!--<input type="text" class="form-control"
                           required="true" placeholder="10.00" >-->
                </div>

                <button type="button" class="btn button save-button">Save</button>

                @else
                    <!-- if public -->
                    <div class="field mb-20">
                        <input type="text" class="form-control"
                           required="true" value="MissJulianne65" readonly>
                    </div>
                    <div class="field">
                        <a href="https://snapchat.com/add/robdg" target="_blank" class="btn button">Quick Add</a>
                    </div>

                    <!-- if private, add payment gateway first -->

                    <!-- insert subscrube button -->

                @endif
            </div>
        </div>
    </div>
</div>
