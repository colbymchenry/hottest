<!-- Start of Create Chat -->
<div class="modal fade" id="creditsModal" tabindex="-1" role="dialog" aria-hidden="true">
<button type="button" class="btn desktop-gone" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>

<div class="modal-dialog modal-dialog-credits" role="document">
		<div class="requests">
			<div class="modal-header mobile-gone">
				<button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i></button>
			</div>
			<div class="content add-funds text-center">
                <h4>Credits</h4>
                <h1 class="color-private" id="credits-balance-popup">{{ Auth::user()->credits }}</h1>
                <p class="credits-alert {{ $price > Auth::user()->credits ? '' : 'hidden' }}" id="credits-needed-alert">Add <span>{{ $price - Auth::user()->credits }}</span> more credits to see that message.</p>

				<div class="mb-20">
                <div class="row tokens-around" id='credits-options'>
               
                    <div class="col-4">
                        <button class="btn tokens-container dropshad" data-amount="5">	
                            <div class="cost">
								<span><i class="fas fa-plus"></i></span>
                            </div>												
							<div class="price-control">5</div>
							<i class="fas fa-star icon"></i>			
                        </button>
                    
                    </div>
                    <div class="col-4">
                        <button class="btn tokens-container dropshad active" data-amount="25">	
                            <div class="cost">
								<span><i class="fas fa-plus"></i></span>
                            </div>	                           												
							<div class="price-control">25</div>
							<i class="fas fa-star icon"></i>			
                        </button>
                     
                    </div>
                    <div class="col-4">
                        <button class="btn tokens-container dropshad" data-amount="100">	
                            <div class="cost">
								<span><i class="fas fa-plus"></i></span>
                            </div>	                          												
							<div class="price-control">100</div>
							<i class="fas fa-star icon"></i>			
                        </button>
                     
                    </div>

                </div>
               
                <!--
                    <div class="btn-group toggle-tab" id='credits-options' data-toggle="buttons">
                        
                        <div class="btn add-tokens-button" data-amount="5">
                            <input type="radio" name="add5"><i class="material-icons">star_border</i> 5</input>
                        </div>
                        <div class="btn add-tokens-button" data-amount="25">
                            <input type="radio" name="add10"><i class="material-icons">star_border</i> 25</input>
                        </div>
                        <div class="btn add-tokens-button" data-amount="100">
                            <input type="radio" name="add25"><i class="material-icons">star_border</i> 100</input>
                        </div>                            
                    </div>-->
                </div>
                <p><small>$1 USD per credit (one time payment)</small></p>
            </div>
		</div>
	</div>
</div>