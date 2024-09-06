@extends('..layouts/head')

@section('main')
<style>
.modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.9); 
}

.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}


</style>

<div class="main">
    <div class="add-creative-works">
        <form class="content-form" action="{{route("creative.store")}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="input-file-div">
                <label class="input-file">
                    <span class="file-span">Выберите файл</span>
                    <input type="file" name="image">		
                 </label>
            </div>   
            <button type="submit">Отправить</button>
          </form>
    </div>
    <div class="creativeworks">
		@foreach ($posts->reverse() as $post)
<!-- Модальное окно -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    
    <!-- Модальное изображение -->
    <div class="modal-content">
        <img id="img01">
        <div id="caption"></div>
    </div>
    
    <!-- Комментарии -->
    <div id="commentSection" style="display: none;">
        <p class="p-title">Комментарий</p>
        <div class="comment">
            <!-- Комментарии будут вставлены здесь через JavaScript -->
        </div>

        <!-- Форма для комментариев -->
        <div id="commentFormSection" style="display: none;">
            @if(Auth::check())
            <form id="commentForm" method="POST">
                @csrf
                <input type="hidden" name="creative_id" id="creative_id">
                <textarea class="txt" rows="10" name="text" placeholder="Оставьте свой комментарий..."></textarea>
                <button type="submit">Отправить</button>
            </form>
            @else
            <p class="else-c">Для добавления комментария необходимо <a style="color:white;" href="{{route("register")}}" >войти</a>.</p>
            @endif
        </div>
    </div>
</div>

        
			<div class="block">
				@if($post->image)
					<img src="{{ asset('images/'.$post->image) }}" alt="Изображение поста">
                    @endif
                <div class="user">
                    <p>{{$post->user->name}}</p>    
                </div>			
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
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
