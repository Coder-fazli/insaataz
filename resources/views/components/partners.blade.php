@if(!$partners->isEmpty())
    <hr class="mt-0 m-b-5">
<div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
					'margin': 0}">
    @foreach($partners as $partner)
        <img src="{{get_image($partner->image,'partner')}}" alt="{{config('app.name')}}">
    @endforeach
</div>
@endif
