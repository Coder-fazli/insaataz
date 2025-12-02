@foreach($videos->chunk(2) as $index => $chunks)
    @php
        $v1 = \App\Utils\Helper::i(data_get($chunks->first(),'cover'));
        $v2 = \App\Utils\Helper::i(data_get($chunks->skip(1)->first(),'cover'));
    @endphp
    @if(\App\Utils\Helper::hasFile($v1))
        <div class="modal fade" id="vmodal-{{$chunks->first()->id}}-{{$type}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vmodal-{{$chunks->first()->id}}-{{$type}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div style="padding: 20px" class="modal-body">
                        @if($chunks->first()->category_id == \App\Enum\Category::YOUTUBE)
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$chunks->first()->video_id}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @elseif($chunks->first()->category_id == \App\Enum\Category::TIKTOK)
                            <blockquote class="tiktok-embed" cite="{{$chunks->first()->video_id}}" data-video-id="{{last(explode('/',$chunks->first()->video_id))}}" style="max-width: 605px;">
                                <section>
                                    <a target="_blank" href="https://www.tiktok.com/{{data_get(explode('/',$chunks->first()->video_id),3)}}"></a>
                                </section>
                            </blockquote>
                            <script async src="https://www.tiktok.com/embed.js"></script>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @if(\App\Utils\Helper::hasFile($v2))
            <div class="modal fade" id="vmodal-{{$chunks->skip(1)->first()->id}}-{{$type}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vmodal-{{$chunks->skip(1)->first()->id}}-{{$type}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="padding: 20px" class="modal-body">
                            @if($chunks->skip(1)->first()->category_id == \App\Enum\Category::YOUTUBE)
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$chunks->skip(1)->first()->video_id}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @elseif($chunks->skip(1)->first()->category_id == \App\Enum\Category::TIKTOK)
                                <blockquote class="tiktok-embed" cite="{{$chunks->skip(1)->first()->video_id}}" data-video-id="{{last(explode('/',$chunks->skip(1)->first()->video_id))}}" style="max-width: 605px;">
                                    <section>
                                        <a target="_blank" href="https://www.tiktok.com/{{data_get(explode('/',$chunks->skip(1)->first()->video_id),3)}}"></a>
                                    </section>
                                </blockquote>
                                <script async src="https://www.tiktok.com/embed.js"></script>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endforeach
