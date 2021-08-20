@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/menu">menu</a></li>

                        <li class="breadcrumb-item active">add menu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <form action="/admin/menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-body card-info">

                                <div class="form-group">
                                    <label for="title">Menu name</label>
                                    <input name="name" type="text" class="form-control" id="title" value="{{$menu->name}}" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="url">Page URL</label>
                                    <input name="url" type="text" class="form-control" id="url" value="{{$menu->url}}" placeholder="Enter URL">
                                </div>

                                <div class="form-group">
                                    <label>Parent menu</label>
                                    <select class="custom-select" name="parent_id">
                                        <option value="0">Parent not</option>
                                        @forelse($menus as $item)
{{--                                            @if($item->id == $menu->id)--}}
{{--                                                <option selected value="{{$item->id}}">{{$item->name}}</option>--}}
{{--                                            @else--}}
{{--                                                --}}
{{--                                            @endif--}}
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                        @empty
                                            <option value="0">Parent not</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-body card-info">
                                <div class="form-group">
                                    <label for="exampleInputFile">Menu image</label>
                                    <div class="upload-img" style="width: 180px; margin: 25px auto;">
                                        <img style="width: 100%" src="{{asset('./b_images/menu/'. $menu->img)}}" data-default="{{asset('./b_images/menu/'. $menu->img)}}" alt="img">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input name="img" type="file" class="custom-file-input" id="exampleInputFile" >
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        @if($errors->any())

                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>

    <script>
        let imgInput = document.querySelector('.custom-file-input');
        let imgContainer = document.querySelector('.upload-img img');
        imgInput.addEventListener('change', function (e) {
            const file = this.files[0];
            if(file){
                const reder = new FileReader();

                reder.addEventListener('load', function () {
                    imgContainer.setAttribute("src", this.result)
                })
                reder.readAsDataURL(file)
            }else {
                imgContainer.setAttribute("src", imgContainer.dataset.default)
            }
        })
    </script>
    <!-- /.content -->
@endsection
