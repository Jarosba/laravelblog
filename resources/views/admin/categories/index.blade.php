@extends("admin.layouts.app_admin")

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
                @slot('title')List of categories @endslot
                @slot('parent')Main @endslot
                @slot('title')List of categories @endslot
                @slot('active')Categories @endslot
        @endcomponent
        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o">
            </i>                Create category
        </a>

        <table class="table table-striped">
            <thead>
            <th>Name </th>
            <th>Publication </th>
            <th class="text-right">ghprplhm </th>

            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->published}}</td>
                    <td>
                    <form onsubmit="if(confirm('Delete?')){return true}else{return false}" action="{{route('admin.category.destroy',$category)}}" method='post'>
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                        <a  href="{{route('admin.category.edit', $category )}}"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn"><i class="fa fa-trash"> </i></button>
                    </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Data is empty</h2></td>
                </tr>

            @endforelse
            </tbody>

            <tfoot>
            <tr>
                <td colsapan="3">
                    <ul class="pagination pull-right">
                        {{$categories->links()}}
                    </ul>


                </td>
            </tr>
            </tfoot>

        </table>

    </div>

@endsection