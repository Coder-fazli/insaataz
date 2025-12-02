<div class="rs-banner banner-main-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="content-wrap">
                    <h1 class="title">{!! $slider->title !!}</h1>
                    <div class="description">
                        <p>
                            {!! $slider->subtitle !!}                            </p>
                    </div>
                    <ul class="banner-bottom">
                        <li><a class="readon started" href="{{route('services')}}">{{__('menu.services')}}</a></li>
                        <li>
                            <div class="rs-videos">
                                <div class="animate-border">
                                    <a class="popup-border popup-videos"
                                       href="https://www.youtube.com/watch?v={{$slider->video}}">
                                        <em><i class="fa fa-play"></i></em>
                                        {{__('site.play')}}
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="main-img text-right md-text-center">
                    <img src="{{asset('storage/'.$slider->image)}}" alt="devrun">
                    <div class="main-img-bg1">
                        <img src="/desait/assets/images/banner/main-home/background-min.png" alt="devrun">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-animate">
        <img class="animation-style one scale" src="/desait/assets/images/banner/main-home/hero-shpae-min.png"
             alt="devrun digital marketing">
        <img class="animation-style two rotated-style" src="/desait/assets/images/banner/main-home/shape1.png"
             alt="devrun digital marketing">
        <img class="animation-style three veritcal" src="/desait/assets/images/banner/main-home/shape2.png"
             alt="devrun digital marketing">
        <img class="animation-style four spine" src="/desait/assets/images/banner/main-home/shape3.png"
             alt="devrun digital marketing">
        <img class="animation-style five veritcal" src="/desait/assets/images/banner/main-home/shape4.png"
             alt="devrun digital marketing">
        <img class="animation-style six veritcal" src="/desait/assets/images/banner/main-home/shape5.png"
             alt="devrun digital marketing">
        <img class="animation-style seven rotated-style" src="/desait/assets/images/banner/main-home/shape6.png"
             alt="devrun digital marketing">
        <img class="animation-style eight scale" src="/desait/assets/images/banner/main-home/dot1.png" alt="devrun digital marketing">
        <img class="animation-style nine scale" src="/desait/assets/images/banner/main-home/dot2.png" alt="devrun digital marketing">
        <img class="animation-style ten scale" src="/desait/assets/images/banner/main-home/dot2.png" alt="devrun digital marketing">
    </div>
</div>
