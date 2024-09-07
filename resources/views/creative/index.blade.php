@extends('layouts/head')

@section('main')
<div style="display:flex;justify-content:left;margin:1% 21%;" class="title">
    <p  class="s-book-title">Творческие работы</p>

</div>
<div class="main">

    <div class="creativeworks">

		@foreach ($posts->reverse() as $post)

			<div class="block">
                <a href="{{route("creative.show", $post)}}">
				@if($post->image)
					<img src="{{ asset('images/'.$post->image) }}" alt="Изображение поста">
                    @endif
                <div class="user">
                    <p>{{$post->user->name}}</p>    
                </div>		</a>	
                </div>
		@endforeach

<script>
document.querySelectorAll('.block img').forEach(img => {
    img.onclick = function() {
        let modal = document.getElementById("myModal");
        let modalImg = document.getElementById("img01");
        let captionText = document.getElementById("caption");
        
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
});

document.querySelector('.close').onclick = function() {
    document.getElementById("myModal").style.display = "none";
}

</script>

    </div>

</div>    
<div style="color: black; font-size:17px" class="pagination">
    {{ $posts->links() }}
</div>
@endsection
