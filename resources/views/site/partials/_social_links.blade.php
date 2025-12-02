                <div class="social-icons">
                    @if($settings->facebook)
                        <a href="{{$settings->facebook}}" class="social-icon social-facebook icon-facebook"
                           target="_blank"></a>

                    @endif
                    @if($settings->twitter)
                        <a href="{{$settings->twitter}}" class="social-icon social-twitter icon-twitter"
                           target="_blank"></a>

                    @endif
                    @if($settings->instagram)
                        <a href="{{$settings->instagram}}" class="social-icon social-instagram icon-instagram"
                           target="_blank"></a>

                    @endif
                </div>
