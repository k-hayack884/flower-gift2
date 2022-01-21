<div>
    @if(empty($filename))
    <img src="{{asset('images/no_image.png')}}">
    @else
    <img src="{{asset('storage/profiles/'.$filename)}}">
    @endif
</div>