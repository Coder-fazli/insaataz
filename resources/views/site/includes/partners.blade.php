<section id="partners">
    <div class="container">
        <div data-aos="fade-up" data-aos-duration="3000" class="partnersHead">
            <h1>{{__('site.partners')}}</h1>
        </div>
        <div class="partnersSlider">
            <div class="swiper partnerSwiper">
                <div class="swiper-wrapper">
                    @foreach($partners as $partner)
                        <div data-aos="fade-up" data-aos-duration="3000" class="swiper-slide">
                            <a href="{{ $partner->link ?? '#' }}" target="_blank" rel="noopener noreferrer"> <img src="{{\App\Utils\Helper::i($partner->image)}}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
