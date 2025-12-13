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
                    <a href="https://www.tiktok.com/@orelinsaat?_r=1&_t=ZS-926NHQsFEgr" class="social-icon social-tiktok" target="_blank" title="TikTok" style="position: relative;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 1em; height: 1em; fill: currentColor; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                        </svg>
                    </a>
                </div>
