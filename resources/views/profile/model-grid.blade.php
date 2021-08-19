<!-- Grid -->
<div class="box-grid profile-grid row">

    <div class="grid-sizer col-4"></div>

   
     @if(((count($images)) < 4) && (Auth::user()->name == $model->getUser()->name))

                    @for ($i = 0 + (count($images)); $i < 3; $i++)
                    
                    <!-- Upload -->
                    <div class="grid-item anime-item work-item col-4 private public" data-toggle="modal" data-target="#uploadImageModal" id="{{ $i }}">
                           <!-- <div class="edit-upload">
								<span><i class="fas fa-plus-circle"></i></span> 
                            </div> -->
                                <div class="box edit-modal upload-image">
                                    <div class="box-cover"> 
                                        <div class="modal-img" style="background-image: url('')"></div>
                                        <div class="box-hover">
                                            <!-- <span class="status">
                                                <i class="material-icons">lock</i>
                                            </span>-->
                                        </div>
                                                               
                                    </div>
                                </div>
                            </div>
                    <!-- / -->
                    @endfor
                    
    @endif

    @foreach($images as $image)
        <div class="grid-item anime-item work-item col-4 {{ $image->isLiked() ? "liked" : "" }} {{ $image->vip ? "vip" : "public" }}"
             id="img{{ $image->id }}t">
            @if(!$image->vip || ($image->vip && $vip_access))
                <div class="flame-it mobile-gone" id="img{{ $image->id }}d" data-idd="img{{ $image->id }}t">
                    <i class="material-icons">whatshot</i>
                </div>
            @endif

            @if($image->vip && $vip_access)
                <div class="box modal-ui-trigger" id="img{{ $image->id }}" data-idt="img{{ $image->id }}t"
                     data-iddo="img{{ $image->id }}d" data-idto="img{{ $image->id }}to" data-model="{{ $image->model_id }}"
                     data-description="{{ $image->description }}" data-time="{{ $image->getTimeAgo() }}"
                     data-height="{{ $image->height }}" data-width="{{ $image->width }}" data-tags="{{ $image->tags }},"
                     data-url="{{ $image->getLink() }}" data-vip="{{ $image->vip }}" data-access="{{ $vip_access }}">
                    <div class="box-cover">
                        <div class="box-img" style="background-image: url('{{ $image->getLink() }}')"></div>
                        <div class="box-hover">
                            <!-- <span class="status">
                                 <i class="material-icons">lock</i>
                             </span>-->
                        </div>

                        <div class="main-details">
                            <div class="icons-row"><!--
                                            <div class="icons-column">
                                                    <div class="name">Miss Julianne</div>
                                            </div>-->
                                <div class="icons-column">
                                    <i class="fas fa-star"></i> VIP
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mobile-gone">
                    <div class="work-info">
                        <div class="box-inner">
                            <h4 class="box-inner__search">{{ $model->getUser()->name }}</h4>
                            <p class="box-inner__title">{{ $image->getTimeAgo() }}</p>
                        </div>
                    </div>
                </div>
            @elseif(!$image->vip)
                <div class="box modal-ui-trigger" id="img{{ $image->id }}" data-idt="img{{ $image->id }}t"
                     data-ido="img{{ $image->id }}o" data-description="{{ $image->description }}" data-model="{{ $image->model_id }}"
                     data-time="{{ $image->getTimeAgo() }}" data-height="{{ $image->height }}"
                     data-width="{{ $image->width }}" data-tags="{{ $image->tags }}," data-url="{{ $image->getLink() }}"
                     data-vip="{{ $image->vip }}" data-access="{{ $vip_access }}">
                    <div class="box-cover">
                        <div class="box-img" style="background-image: url('{{ $image->getLink() }}')"></div>
                        <div class="box-hover">
                            <!-- <span class="status">
                                 <i class="material-icons">lock</i>
                             </span>-->
                        </div>


                    </div>
                </div>

                <div class="mobile-gone">
                    <div class="work-info">
                        <div class="box-inner">
                            <h4 class="box-inner__search">{{ $model->getUser()->name }}</h4>
                            <p class="box-inner__title">{{ $image->getTimeAgo() }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a href="#" class="box locked-image modal-ui-trigger">
                    <div class="box-cover locked">
                        <div class="box-img" style="background-image: url('')"></div>
                        <div class="box-hover">
                            <!-- <span class="status">
                                 <i class="material-icons">lock</i>
                             </span>-->
                             
                        </div>
                        <div class="main-details">
                            <div class="icons-row"><!--
                                            <div class="icons-column">
                                                    <div class="name">Miss Julianne</div>
                                            </div>-->
                                <div class="icons-column">
                                    <i class="fas fa-star"></i> VIP
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>
@endforeach
<!-- / -->




</div>