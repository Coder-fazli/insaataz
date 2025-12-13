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
                    <a href="https://www.tiktok.com/@orelinsaat?_r=1&_t=ZS-926NHQsFEgr" class="social-icon social-tiktok fab fa-tiktok"
                       target="_blank" title="TikTok"></a>
                </div>
