@if(count($locales = LaravelLocalization::getSupportedLanguagesKeys()) > 1)
    <ul>
        @foreach($locales as $key=>$locale)

            @if(app()->getLocale() != $locale)
                @if(isset($translatedLinks))
                    @if(array_key_exists($locale, $translatedLinks))
                        <li class="lang_code"><a class="{{app()->getLocale() == $locale ? 'activeLang' : ''}}" href="{{ $translatedLinks[$locale] }}">{{ strtoupper($locale) }}</a>
                        </li>
                    @else
                        <li class="lang_code"><a class="{{app()->getLocale() == $locale ? 'activeLang' : ''}}" href="{{ LaravelLocalization::localizeURL(url()->route('home'), $locale) }}">{{ strtoupper($locale) }}</a>
                        </li>
                    @endif
                @else
                    <li class="lang_code"><a class="{{app()->getLocale() == $locale ? 'activeLang' : ''}}" href="{{ LaravelLocalization::localizeURL(url()->current(), $locale) }}">{{ strtoupper($locale) }}
                        </a>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
@endif
