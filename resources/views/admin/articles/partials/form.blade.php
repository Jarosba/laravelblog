<label for="">Status</label>
<select class="form-control" name="published">
    @if(isset($article->id))
        <option value="0" @if ($article->published==0) selected="" @endif> Is not published</option>
        <option value="1" @if ($article->published==1) selected="" @endif> Is published</option>
    @else
        <option value="0" > Is not published</option>
        <option value="1" > Is  published</option>
    @endif
</select>

<label for="">Title</label>
<input type="text" class="form-control" name="title"  placeholder="Title of title" value="{{$article->title or ""}}" required>

<label for="">Slug (Unique value)</label>

<input class="form-control" type="text" name="slug" placeholder="Automatic generation"   value="{{$article->slug or ""}}" readonly="">

<label for="">Parent category</label>
<select class="form-control" name="categories[]" multiple="">


    @include("admin.articles.partials.categories", ['categories'=>$categories])

</select>

<label for="">abstract</label>
<textarea class="form-control" id="description_short" name="description_short">{{$article->description_short or ""}}</textarea>

<label for="">text</label>
<textarea class="form-control" id="description" name="description">{{$article->description or ""}}</textarea>

<hr />
<label for="">meta_title</label>
<textarea class="form-control" id="meta_title" name="meta_title">{{$article->meta or ""}}</textarea>

<label for="">meta_description</label>
<textarea class="form-control" id="meta_description" name="meta_description">{{$article->meta_description or ""}}</textarea>

<label for="">Key words</label>
<textarea class="form-control" id="meta_keyword" name="meta_keyword">{{$article->meta_keywords or ""}}</textarea>

<hr />
<input class="btn btn-primary" type="submit" value="Save">

