<form class="content-form" action="{{route("post.store")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="user">
        <span class="material-symbols-outlined">
            account_box
            </span>
        <select name="type" class="slc">
            <option value="Анонимно">Анонимно</option>
            <option value="{{Auth::user()->name}}">{{Auth::user()->name}}</option>

        </select>
        <input id="title" type="text" name="title" maxlength="250" required placeholder="Заголовок: ">

    </div>
    <textarea id="main" class="c-text" name="main" rows="8" cols="80" placeholder="Напишите свою историю здесь..." required></textarea>

    <div class="input-file-div">
        <label class="input-file">
            <span class="file-span">Выберите файл</span>
            <input type="file" name="image">		
         </label>
    </div>        
    <div>
        <label for="tags">Теги:</label>
        <select id="tags" name="tags[]" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>                           
    <button type="submit">Отправить</button>
  </form>