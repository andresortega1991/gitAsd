@if ($proyecto->image_path)
<div class="image-container">
<img src="{{ route('images.avatar',['filename'=>$proyecto->image_path]) }}" alt="" class="image">
</div>
@endif