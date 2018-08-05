@extends("admin.layouts.app_admin")

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title')List of users @endslot
            @slot('parent')Main @endslot
            @slot('active')users @endslot
        @endcomponent
        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o">
            </i>                Create user
        </a>

        <table class="table table-striped">
            <thead>
            <th>Name </th>
            <th>Email </th>
            <th class="text-right"> </th>

            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form onsubmit="if(confirm('Delete?')){return true}else{return false}" action="{{route('admin.user_managment.user.destroy',$user)}}" method='post'>
                            {{method_field('DELETE')}}

                            {{csrf_field()}}
                            <a  href="{{route('admin.user_managment.user.edit', $user )}}"><i class="fa fa-edit"></i></a>
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
                        {{$users->links()}}
                    </ul>


                </td>
            </tr>
            </tfoot>

        </table>

    </div>

@endsection