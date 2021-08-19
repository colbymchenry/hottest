<!-- Modal -->
<div id="PrivateSettingsModal" class="modal fade" role="dialog">

    <div class="modal-dialog modal-dialog-centered">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header"><h5>VIP Settings</h5>
                <a data-dismiss="modal" aria-label="Cancel" class="close-modal"><i class="material-icons">close</i></a>
            </div>
         
            <div class="modal-body">
                <form action="/model/set_prices" method="POST">
                @csrf
                            <div class="content no-layer">
                                
                                        <div class="set">
                                            <div class="details">
                                                <h5>Photos <button class="btn btn-link">verify age</button></h5>
                                                <p>Enable private monthly subscription photos.</p><!-- popup first age verify then popup paypal add then popup price for subscription then check the box here  -->
                                            </div>
                                            <label class="field profile">
                                                <input type="text" class="form-control" id="vip-foxxy-price" name="VIP"
                                                       placeholder="0.00" value="{{ $model->getPricing(ProductType::$VIP)->price == null ? '' : $model->getPricing(ProductType::$VIP)->price }}" {{ PayPalToken::hasTokens(Auth::user()->id) ? '' : 'readonly' }}>
                                            </label>
                                        </div>                              
                                        <div class="set">
                                            <div class="details">
                                                <h5>Snapchat</h5>
                                                <p>Enable private monthly subscription snapchat.</p>
                                            </div>
                                            <label class="field profile">
                                                <input type="text" class="form-control" id="vip-snapchat-price" name="SNAPCHAT"
                                                       placeholder="0.00" value="{{ $model->getPricing(ProductType::$SNAPCHAT)->price == null ? '' : $model->getPricing(ProductType::$SNAPCHAT)->price }}"  {{ PayPalToken::hasTokens(Auth::user()->id) ? '' : 'readonly' }}>
                                            </label>
                                        </div>
                                        <div class="set">
                                            <div class="details">
                                                <h5>Messages</h5>
                                                <p>Enable private paid direct messages.</p>
                                            </div>
                                            <label class="field profile">
                                                <input type="text" class="form-control" id="vip-message-price" name="MESSAGE"
                                                       placeholder="0.00" value="{{ $model->getPricing(ProductType::$MESSAGE)->price == null ? '' : $model->getPricing(ProductType::$MESSAGE)->price }}" {{ PayPalToken::hasTokens(Auth::user()->id) ? '' : 'readonly' }}>
                                            </label>
                                        </div>                            
                                        <div class="set paypal">
                                            <div class="details">
                                                <h5>Paypal</h5>
                                                <p>Connect your paypal account to earn daily payouts from private content.</p>
                                            </div>

                                            @if(PayPalToken::hasTokens(Auth::user()->id) === false)
                                                <span id="cwppButton"></span>
                                            @else
                                                <label class="field profile">
                                                    <button class="btn connected-button button-icon-left" data-toggle="tooltip" data-placement="top" title="PayPal Enabled"><i class="material-icons">check</i> Connected</button>
                                                </label>
                                            @endif
                                            <!--
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>-->
                                        </div>
                                        <button type="submit" class="btn button" onclick="showLoader('Updating prices.', 'This can take up to 5 minutes. Please be patient.')">Save</button>



                            </div>
                </form>

                        <!-- redirect to once uplaoded, we can confirm later and put in TOS that they garuntee ID is real and all uploaded content is owned by them -->

            </div>
        </div>
    </div>
</div>

