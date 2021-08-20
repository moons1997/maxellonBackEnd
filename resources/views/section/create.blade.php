@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/section">section</a></li>

                        <li class="breadcrumb-item active">add section</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <form action="/admin/section" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-body card-info">

                                <div class="form-group">
                                    <label for="title">Slider title</label>
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
                                </div>

                                <div class="form-group">
                                    <label for="title">Section order</label>
                                    <input name="order" type="text" class="form-control" id="title" placeholder="Enter order">
                                </div>

                                <div class="form-group">
                                    <label for="url">Section text</label>
                                    <textarea name="info" style="min-height: 500px" class="form-control" id="info" placeholder="Enter text">

                                    </textarea>
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
                                        <img style="width: 100%" src="{{asset('./images/default.jpg')}}" data-default="{{asset('./images/default.jpg')}}" alt="img">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input name="img" type="file" class="custom-file-input" id="exampleInputFile" >
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Category section</label>
                                    <select class="custom-select" name="category_id">
                                        @forelse($categoryes as $category)
                                            <option value="{{$category}}">{{$category}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Category pages</label>
                                    <select class="custom-select" name="type_id">
                                        <option value="0">Home</option>
                                        @forelse($types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @empty

                                        @endforelse
                                    </select>
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
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#info' ) )
            .catch( error => {
                console.error( error );
            } );

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
