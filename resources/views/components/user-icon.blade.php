<div>
    @if(empty($filename))
    <img src="{{asset('images/no_image.png')}}">
    @else
    <img src="{{asset('https://flower-gift.s3.ap-northeast-1.amazonaws.com/profiles/'.$filename)}}">
    @endif
</div>