@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add car section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/car">car section</a></li>

                        <li class="breadcrumb-item active">add car section</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <form action="/admin/car" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">


                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-body card-info">

                                <div class="form-group">
                                    <label for="sub_title">Top text</label>
                                    <input name="sub_title" type="text" class="form-control" id="sub_title" placeholder="Enter top text">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="info">Text</label>
                                    <textarea name="info" style="min-height: 500px" class="form-control" id="info" placeholder="Enter text">

                                    </textarea>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-body card-info">

                                <div class="form-group visible_img">
                                    <label for="exampleInputFile">Car visible image</label>
                                    <div class="upload-img" style="width: 180px; margin: 25px auto;">
                                        <img style="width: 100%" src="{{asset('./images/default.jpg')}}" data-default="{{asset('./images/default.jpg')}}" alt="img">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input name="img_visible" type="file" class="custom-file-input" id="exampleInputFile" >
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group hidden_img">
                                    <label for="exampleInputFile">Car hiddin image</label>
                                    <div class="upload-img" style="width: 180px; margin: 25px auto;">
                                        <img style="width: 100%" src="{{asset('./images/default.jpg')}}" data-default="{{asset('./images/default.jpg')}}" alt="img">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">

                                            <input name="img_hiddin" type="file" class="custom-file-input" id="exampleInputFile" >
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

        let $imgInputVisible = document.querySelector('.visible_img .custom-file-input');
        let $imgInputHidden = document.querySelector('.hidden_img .custom-file-input');
        let $imgContainerVisible = document.querySelector('.visible_img .upload-img img');
        let $imgContainerHidden = document.querySelector('.hidden_img .upload-img img');


        changeImg($imgInputVisible, $imgContainerVisible);
        changeImg($imgInputHidden, $imgContainerHidden);



        function changeImg(node, container) {
            node.addEventListener('change', function () {
                const file = this.files[0];
                if(file){
                    const reder = new FileReader();

                    reder.addEventListener('load', function () {
                        container.setAttribute("src", this.result)
                    })
                    reder.readAsDataURL(file)
                }else {
                    container.setAttribute("src", container.dataset.default)
                }
            })
        }

    </script>

    <!-- /.content -->
@endsection

