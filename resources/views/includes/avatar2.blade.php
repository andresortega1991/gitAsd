@if ( Auth::user()->image )
<div class="container-avatar2">
<img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" alt="" class="avatar">
</div>
    @endif