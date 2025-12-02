<p style='text-align:center'>{!! __('site.message.please_confirm_mail',['name' => $client->fullname]) !!}</p>

<a 
style='padding: 0.5rem 1rem;background:#ff6e00;display:block;width: fit-content;color: white;text-decoration: none;border-radius: 5px;margin: 1rem auto 0;'
href="{{route('activation',$client->activation_token)}}">
    {{__('message.activation_link')}}
</a>
