<label for="">Status</label>
<select class="form-control" name="published">
    @if(isset($category->id))
        <option value="0" @if ($category->published==0) selected="" @endif> Is not published</option>
        <option value="1" @if ($category->published==1) selected="" @endif> Is published</option>
    @else
        <option value="0" > Is not published</option>
        <option value="1" > Is  published</option>
    @endif
</select>

<label for="">Name</label>
<input type="text" class="form-control" name="title"  placeholder="Title of category" value="{{$category->title or ""}}" required>

<label for="">Slug</label>

<input class="form-control" type="text" name="slug" placeholder="Automatic generation"
       value="{{$category->slug or ""}}" readonly="">

<label for="">Parent category</label>
<select class="form-control" name="parent_id">
    <option value="0"> -- without parent category--</option>
    @include("admin.categories.partials.categories", ['categories'=>$categories])

</select>

<hr />
<input class="btn btn-primary" type="submit" value="Save">