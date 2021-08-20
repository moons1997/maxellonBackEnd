@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update section card</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/section">section card</a></li>

                        <li class="breadcrumb-item active">update section card</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <form action="/admin/section-card/{{$section->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-body card-info">

                                <div class="form-group">
                                    <label for="title">Slider title</label>
                                    <input name="title" type="text" class="form-control" id="title" value="{{$section->title}}" placeholder="Enter title">
                                </div>

                                <div class="form-group">
                                    <label for="title">Section order</label>
                                    <input name="order" type="text" class="form-control" id="title" value="{{$section->order}}" placeholder="Enter order">
                                </div>

                                <div class="form-group">
                                    <label>Category pages</label>
                                    <select class="custom-select" name="type_id">
                                        {{--                                        <option value="0">Home</option>--}}

                                        {{--                                        $section->type_id                       --}}

                                        @forelse($types as $type)
                                            @if($type->id == $section->type_id)
                                                <option selected value="{{$type->id}}">{{$type->name}}</option>
                                            @else
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endif
                                        @empty

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
                                    <label for="exampleInputFile">Section image</label>
                                    <div class="upload-img" style="width: 180px; margin: 25px auto;">
                                        <img style="width: 100%" src="{{asset('./b_images/section/'.$section->img)}}" data-default="{{asset('./b_images/section/'.$section->img)}}" alt="img">
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
