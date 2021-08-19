	<!-- Grid -->
    <div class="box-grid feed-grid row">
			   
               <div class="grid-sizer col-4"></div>
                      


               @for ($i = 0; $i < 10; $i++)

               <div class="grid-item anime-item work-item col-4 private public {{ $i }}" id="img41t">
                
                        <div class="box modal-ui-trigger" id="img41" data-idt="img41t" data-ido="img41o" data-description="" data-time="2 days ago" data-height="1024" data-width="689" data-tags="," data-url="http://162.243.166.8/images/15ca6fe65823ca.jpg" data-vip="0" data-access="">
                            <div class="box-cover unlisted">
                                <div class="box-img" style="background-image: url('http://162.243.166.8/images/25cb6b7b2328a1.jpg')"></div>
                                <div class="box-hover">

                                </div>

                                        <div class="main-details">
       
                                           <div class="icons-row">	
                                               <div class="icons-column">
                                                       <i class="material-icons">cancel</i> <span class="mobile-gone">Unlisted</span>
                                               </div>	 
                                               <div class="icons-column">
                                                       <i class="material-icons">edit</i> <span class="mobile-gone">Edit</span>
                                               </div>                                                                            								   							   
                                           </div>
                                       </div> 

                            </div>
                        </div>

                        <div class="mobile-gone">
                            <div class="work-info">
                                <div class="box-inner">
                                    <h4 class="box-inner__search"></h4>
                                    <p class="box-inner__title"></p>
                                </div>
                            </div>
                        </div>
                   </div>

        


                    
                      
                      @endfor
         
               
       </div>