@props(['status'=>'info'])

@php
if(session('status')==='info'){$bgColor='bg-bule-300';}
if(session('status')==='delete'){$bgColor='bg-red-500';}
@endphp

@if(session('message'))
<div class="{{$bgColor}} w-1/2 mx-auto p2 text-white">
{{session('message')}}
</div>
@endif