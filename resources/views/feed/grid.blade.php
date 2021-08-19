
              @foreach ($models as $model)
                @foreach ($model->getPublicPhotos() as $photo)
              <div class="grid-item anime-item work-item col-12 private public" id="img41t">
                    <div class="flame-it mobile-gone" id="img41d" data-idd="img41t">
                            <i class="material-icons">whatshot</i>
                        </div>
                
                        <div class="box modal-ui-trigger" id="img8" data-idt="img8t" data-ido="img8o" data-description="" data-time="2 days ago" data-height="1024" data-width="689" data-tags="," data-url="{{ $photo->getLink() }}" data-vip="0" data-access="">
                            <div class="box-cover">
                                <div class="box-img" style="background-image: url('{{ $photo->getLink() }}')"></div>
                                <div class="box-hover">
                                    <!-- <span class="status">
                                        <i class="material-icons">lock</i>
                                    </span>-->
                                </div>

                                <div class="main-details">
                                    <div class="icons-row">
                                                    <div class="icons-column">
                                                        <div class="name"><a href="/model/{{ $model->getUser()->name }}">{{ $model->getUser()->name }}</a></div>
                                                    </div>
                                        <div class="icons-column">
                                            @if($photo->vip)
                                            <i class="material-icons">lock</i> VIP
                                            @endif
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
                   @endforeach              
               @endforeach

              