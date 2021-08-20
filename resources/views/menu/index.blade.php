@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{--                            <h3 class="card-title">Responsive Hover Table</h3>--}}
                            <div class="card-tools">
                                <a class="btn btn-primary" href="/admin/menu/create">Add menu</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Parent ID</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter = 1 ?>
                                @forelse($menus as $menu)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$menu->name}}</td>
                                        <td>
                                            @if(empty($menu->img))
{{--                                                <img style="height: 100px" src="{{asset("./images/default.jpg"}}" alt="menu img">--}}
                                            @else
                                                <img style="height: 100px" src="{{asset("./b_images/menu/".$menu->img)}}" alt="slider-img">
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($menuName as $name)
                                                {{$menu->parent_id == $name->id ? $name->name : ''}}
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="tag tag-success">
                                                    <form action="/admin/menu/{{$menu->id}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-default del"><span class="badge badge-danger p-3 " ><i class="far fa-trash-alt"></i></span></button>
                                                    </form>

                                                    <a href="/admin/menu/{{$menu->id}}/edit" class="btn-default btn">
                                                        <span class="badge badge-success p-3"><i class="fas fa-pencil-alt"></i></span>
                                                    </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php $counter += 1 ?>
                                @empty
                                    <tr>
                                        <td colspan="4">empty menu</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
{{--    <script>--}}
{{--        const $del = document.querySelector('.del');--}}

{{--        $del.addEventListener('click', function () {--}}
{{--            console.log($del)--}}
{{--            confirm('Are You sure?')--}}
{{--        })--}}
{{--    </script>--}}
@endsection
