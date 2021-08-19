<div class="row">

    <div class="col-md-10 offset-md-1">
        <div class="settings">
            <div style="float:right">
            <a href="#" class="d-inline" id="closeedit" data-toggle="tooltip" data-placement="top" title="Save"><i class="material-icons">check</i></a>
                <a href="#" class="d-inline" id="closeedit" data-toggle="tooltip" data-placement="top" title="Cancel"><i class="material-icons">close</i></a>
            </div>
            <div class="content">
               
<!--                 <div class="upload">
                    <div class="data">
                        <label>
                            <input onclick="coverImageSubmit();">
                            <span class="btn button">Upload banner</span>
                        </label>
                    </div>
                    <p>For best results, use an image at least 1500px by 2000px in either .jpg or .png format!</p>
                </div>
 -->
                <h1>Model Settings</h1>
               <!-- <h4>Profile Type</h4>    
                <h4>Visibility</h4>    -->

                <form action="/model/set_prices" method="POST">
                    @csrf


                    <div class="categories" id="accordionSettings">
                    <h1>Private Content Settings</h1>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Start of Snapchat -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingOne" data-toggle="collapse"
                                   data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="material-icons md-30 online">person_outline</i>
                                    <div class="data">
                                        <h5>Private Photos</h5>
                                        <p>Monetize private photos</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseOne" aria-labelledby="headingOne"
                                     data-parent="#accordionSettings">
                                    <div class="content">
                                       

                                    <div class="set">
                                        <div class="details">
                                            <h5>Private Content</h5>
                                            <p>You can set a price/month for Private photos.</p>
                                            <p>Leave price 0.00 to use without monetization.</p>                             
                                            <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address" checked>
                                            <label class="custom-control-label" for="same-address">Auto approve all private followers.</label>
                                            </div>
                                        </div>
                                        <label class="field profile">
                                            <input type="text" class="form-control" id="vip-foxxy-price" name="VIP"
                                                placeholder="0.00" value="{{ $model->getPricing(ProductType::$VIP)->price == null ? '' : $model->getPricing(ProductType::$VIP)->price }}" {{ PayPalToken::hasTokens(Auth::user()->id) ? '' : 'readonly' }}>
                                        </label>
                                    </div>


                                    </div>
                                </div>
                            </div>
                            <!-- End of Snapchat -->


                            <!-- Start of Snapchat -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingTwo" data-toggle="collapse"
                                   data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <i class="material-icons md-30 online">person_outline</i>
                                    <div class="data">
                                        <h5>Snapchat</h5>
                                        <p>Enable and monetize Snapchat</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                     data-parent="#accordionSettings">
                                    <div class="content">
                                       
              
                                            <div class="set">
                                                <div class="details">
                                                    <h5>Private Snapchat Subscriber</h5>
                                                    <p>You can set a price/month for Snapchat (we send you emails when to add and unadd the username when their subscription starts and ends!)</p>
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="same-address" checked>
                                                    <label class="custom-control-label" for="same-address">Auto approve all private snapchat requests.</label>
                                                    </div>
                                                </div>
                                                
                                                <label class="field profile">
                                                    <input type="text" class="form-control" id="vip-snapchat-username" name="SNAPCHAT_USERNAME"
                                                        placeholder="Username">
                                                </label>
          
                                                <label class="field profile">
                                                    <input type="text" class="form-control" id="vip-snapchat-price" name="SNAPCHAT"
                                                        placeholder="0.00" value="{{ $model->getPricing(ProductType::$SNAPCHAT)->price == null ? '' : $model->getPricing(ProductType::$SNAPCHAT)->price }}"  {{ PayPalToken::hasTokens(Auth::user()->id) ? '' : 'readonly' }}>
                                                </label>
                                            </div>                                           
                            


                                    </div>
                                </div>
                            </div>
                            <!-- End of Snapchat -->


                            <!-- Start of Messages -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingThree" data-toggle="collapse"
                                   data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <i class="material-icons md-30 online">person_outline</i>
                                    <div class="data">
                                        <h5>Messages</h5>
                                        <p>Enable and monetize messages</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                                     data-parent="#accordionSettings">
                                    <div class="content">
                                       

                     
                                        <div class="set">
                                            <div class="details">
                                                <h5>Private Messages</h5>
                                                <p>You can set a price for messages and replies to your inbox. Reply discression up to you.</p>
                                                <p>Leave price 0.00 to use private without monetization.</p>
                                                <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="same-address" checked>
                                                <label class="custom-control-label" for="same-address">Auto approve all private messages.</label>
                                                </div>                           
                                            </div>
                                            <label class="field profile">
                                                <input type="text" class="form-control" id="vip-message-price" name="MESSAGE"
                                                    placeholder="0.00" value="{{ $model->getPricing(ProductType::$MESSAGE)->price == null ? '' : $model->getPricing(ProductType::$MESSAGE)->price }}" {{ PayPalToken::hasTokens(Auth::user()->id) ? '' : 'readonly' }}>
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- End of Snapchat -->



                    </div>
                </div>
            </div>

                <div class="set">
                    <div class="details" style="max-width: 80%;">
                        <h5>Connect PayPal Account</h5>
                        <p>Connect your PayPal account so you can start making money!</p>
                    </div>
                    @if(PayPalToken::hasTokens(Auth::user()->id) === false)
                        <label class="field profile" style="margin-right: 3em;width: 100%;">
                            <span id="cwppButton"></span>
                        </label>
                    @else
                        <label class="field profile">
							<button class="btn connected-button button-icon-left" data-toggle="tooltip" data-placement="top" title="PayPal Enabled"><i class="material-icons">check</i> Connected</button>
                        </label>
                    @endif
                </div>

                    <button type="submit" class="btn button" onclick="showLoader('Updating prices.', 'This can take up to 5 minutes. Please be patient.')">Save</button>
                </form>
            </div>


        </div>
    </div>

    <!-- end col -->
</div>

@include('profile/image/upload_banner_image')

