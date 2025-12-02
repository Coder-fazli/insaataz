

@if(count($locales = LaravelLocalization::getSupportedLanguagesKeys()) > 1)

    <div class="header-dropdown">
        @php
            if(app()->getLocale() == 'az'){
                $lang_i = 'az';
            } elseif(app()->getLocale() == 'en'){
                $lang_i = 'us';
                
            } elseif(app()->getLocale() == 'ru'){
                $lang_i = 'ru';
                
            } else {
                $lang_i = 'az';
            }
        @endphp
        <a href="#"><i class="flag-{{$lang_i}} flag"></i>{{ strtoupper(app()->getLocale()) }}</a>

        <div class="header-menu">
            <ul>
        @foreach($locales as $key=>$locale)

            @if(app()->getLocale() != $locale)
                @if(isset($translatedLinks))
                    @if(array_key_exists($locale, $translatedLinks))
                        <li><a class="  {{app()->getLocale() == $locale ? 'activeLang' : ''}}"
                               href="{{ $translatedLinks[$locale] }}">{{ strtoupper($locale) }}</a>
                        </li>

                    @else

                        <li class=" "><a href="{{ LaravelLocalization::localizeURL(url()->route('home'), $locale) }}">{{ strtoupper($locale) }}</a></li>
                    @endif
                @else
                    <li class=" "><a href="{{ LaravelLocalization::localizeURL(url()->route('home'), $locale) }}">{{ strtoupper($locale) }}</a></li>
                @endif
            @endif
        @endforeach
            </ul>
        </div>

    </div>
@endif



{{--            <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>--}}
{{--            </li>--}}
{{--            <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>--}}


