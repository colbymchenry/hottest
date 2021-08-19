<!-- Modal -->
<div id="MessageModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        @if(Auth::user()->name == $model->getUser()->name)
        <div class="modal-content">
            <div class="modal-header">
                <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Messages</h4>
                <hr>
                    <div id="upload-image-type" class="btn-group toggle-tab mb-20" data-toggle="buttons">
                        <label class="btn btn-primary" id="messagePublic-btn">
                            <input type="radio" name="message-public" id="message-public" value="snap-public">
                            <div class="material-icons">lock_open</div>
                            Public
                        </label>
                        <label class="btn btn-primary {{ $model->getPricing(ProductType::$MESSAGE) != null ? 'active focus' : '' }}" id="messagePrivate-btn">
                            <input type="radio" name="message-private" id="message-private" value="snap-private">
                            <div class="material-icons">lock</div>
                            Private
                        </label>
                        <label class="btn btn-primary {{ $model->getPricing(ProductType::$MESSAGE) != null ? '' : 'active focus' }}" id="messageUnlisted-btn">
                            <input type="radio" name="message-unlisted" id="message-unlisted" value="snap-unlisted">
                            <div class="material-icons">block</div>
                            Unlisted
                        </label>
                    </div>

                    <hr>

                    <div class="field mb-20" id="message-cost" style="display:none;">
                        <p class="mb-20">Pay per message. Member must pay to unlock send for each message.</p>
                       <!-- <input type="text" class="form-control mb-20" id="edit-image-description"
                               required="true" placeholder="2.00">-->
                    </div>

                    <div class="field mb-20" id="message-open" style="display:none;">
                        <p class="mb-20">Any user can message you.</p>
                    </div>

                    <button type="button" class="btn button save-button">Save</button>
            </div>
        </div>
                @else
                <div class="requests">
                    <div class="title">
                        <h1>Private chat</h1>
                        <button type="button" class="btn" data-dismiss="modal" aria-label="Close" id="close-chat-button"><i class="material-icons">close</i></button>
                    </div>
                    <div class="content">
                        <form id="create-chat-popup">
                            <div class="form-group">
                                <label for="participant">Recipient:</label>
                                <input type="text" class="form-control" id="participant" placeholder="Search model..." autocomplete="off" required>
                                <div class="user noselect" id="recipient" data-id="1">            
                                    <img class="avatar-sm" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}" alt="avatar">                
                                        <h5>Miss Julianne</h5>            
                                    <button class="btn"><i class="material-icons">close</i></button>        
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="topic">Topic:</label>--}}
                                {{--<input type="text" class="form-control" id="topic" placeholder="What's the topic?" required="">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="text-control" id="chat-message" placeholder="Send your appropriate message..." required></textarea>
                            </div>


                            @if(isset($model))
                            <div class="form-group">  
                            <label for="message">Tip:</label>                           
                                    <div class="row tokens-around mb-20">
                                    
                                        <div class="col-4">
                                            <div class="tokens-container locked">	
                                                <div class="tip">
                                                    <i class="fas fa-gift"></i>
                                                <!-- if not paid <i class="fas fa-lock"></i> -->
                                                </div>	                                                                       
                                                <div class="tip-control">{{ $model->getPricing(ProductType::$MESSAGE)->price }}</div>
                                                <i class="fas fa-star tip-icon"></i>			
                                            </div> 
                                        </div>   
                                        <div class="col-4">                                                     
                                            <div class="tokens-container locked">	
                                                <div class="tip">
                                                    <i class="fas fa-gift"></i>
                                                <!-- if not paid <i class="fas fa-lock"></i> -->
                                                </div>	                                                                       
                                                <div class="tip-control">{{ ($model->getPricing(ProductType::$MESSAGE)->price) * 2 }}</div>
                                                <i class="fas fa-star tip-icon"></i>			
                                            </div>    
                                        </div>                                        
                                        <div class="col-4">                                                                                
                                            <div class="tokens-container locked">	
                                                <div class="tip">
                                                    <i class="fas fa-gift"></i>
                                                <!-- if not paid <i class="fas fa-lock"></i> -->
                                                </div>	                                                                       
                                                <div class="type-control"><input type="text" class="input-control" autofocus/>{{ $model->getPricing(ProductType::$MESSAGE)->price }}</div>
                                                <i class="fas fa-star tip-icon"></i>			
                                            </div> 
                                        </div>                                      
                                    </div>                           
                                

                                
                            </div>

                            @endif
                            <button type="submit" class="btn button w-100">Start New Chat</button>



                        </form>
                    </div>
                </div>
        
                    
                @endif
    </div>
</div>
