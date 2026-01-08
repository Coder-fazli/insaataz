<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar">
    <div class="row">
        <div class="col-md-6 product-single-gallery mb-md-0">
            <div class="product-slider-container">
                <div class="label-group">
                    @if($product->is_best_seller)
                        <div class="product-label label-hot">{{__('site.best_seller')}}</div>
                    @endif
                </div>

                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                    @foreach($photos as $photo)
                        <div class="product-item">
                            <img class="product-single-image" src="{{get_image($photo->image,'list')}}"
                                 data-zoom-image="{{get_imageAspect($photo->image,'big')}}"/>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="prod-thumbnail owl-dots">
                @foreach($photos as $photo)
                    <div class="owl-dot">
                        <img src="{{get_imageAspect($photo->image,'small')}}"/>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-single-details mb-0 ml-md-4">
                <h1 class="product-title">{{$product->title}}</h1>

                <hr class="short-divider">

                <div class="product-desc">
                    <p>
                        {!! $product->desc !!}
                    </p>
                </div>

                <ul class="single-info-list">
                    <li>
                        {{__('site.code')}}
                        <strong>{{$product->code}}</strong>
                    </li>

                </ul>


            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div>
