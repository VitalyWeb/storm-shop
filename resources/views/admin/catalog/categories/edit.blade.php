@extends('admin.layouts.admin_hf')

@section('title', $category->name)

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Блог</strong></span>
                <a class="breadcrumb-item" href="{{ route('admin.catalog.categories.index') }}">Категории</a>
                <span class="breadcrumb-item active">{{ $category->name }}</span>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <!-- Default Elements -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Редактирование категории</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <form action="{{ route('admin.catalog.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Заголовок</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="name" name="name" value="@isset($category->name){{ $category->name }}@endisset" placeholder="Заголовок..">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="name_en">Title</label>
                                        <div class="mb-16">
                                            <input type="text" class="form-control" id="name_en" name="name_en" value="@isset($category->name_en){{ $category->name_en }}@endisset" placeholder="Title..">
                                        </div>
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="description">Описание</label>
                                        <div class="mb-16">
                                            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Описание..">@isset($category->description){{ $category->description }}@endisset</textarea>
                                        </div>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label for="description_en">Description</label>
                                        <div>
                                            <textarea class="form-control" id="description_en" name="description_en" rows="6" placeholder="Description..">@isset($category->description_en){{ $category->description_en }}@endisset</textarea>
                                        </div>
                                        @error('description_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="code">Код категории</label>
                                        <div class="mb-16">
                                            <input type="code" class="form-control" id="code" name="code" value="@isset($category->code){{ $category->code }}@endisset" placeholder="Code..">
                                        </div>
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <label>Изображение</label>
                                        <div class="custom-file mb-43">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <input id="delete_image" type="text" name="delete_image" value="no" placeholder="delete_image" hidden>
                                            <input onchange="adminShowImage(this)" type="file" class="custom-file-input js-custom-file-input-enabled" id="image_show_input" name="image" value="@isset($category->image){{ $category->image }}@endisset" data-toggle="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="image_show_input">Выбирите изображение</label>
                                        </div>
                                        @error('image')
                                        <br>
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="col-md-12 animated fadeIn">
                                            <div class="options-container">
                                                <img id="imgShowElement" class="img-fluid options-item" src="@isset($category->image){{ URL::asset($category->image) }}@else {{ URL::asset('media/photos/photo1.jpg') }} @endisset" alt="">
                                                <div class="options-overlay bg-black-op-75">
                                                    <div class="options-overlay-content">
                                                        <h3 class="h4 text-white mb-5">Изображение</h3>
                                                        {{--<h4 class="h6 text-white-op mb-15">More Details</h4>--}}
                                                        <a onclick="adminEditImg()" class="btn btn-sm btn-rounded btn-alt-primary min-width-75">
                                                            <i class="fa fa-pencil"></i> Редактировать
                                                        </a>
                                                        <a onclick="adminDeleteImg()" class="btn btn-sm btn-rounded btn-alt-danger min-width-75">
                                                            <i class="fa fa-times"></i> Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 col-xl-4">
                                        <button type="submit" class="btn btn-primary min-width-125">Сохранить</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- END Default Elements -->
                </div>
            </div>


        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection