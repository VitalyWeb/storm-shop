@extends('admin.layouts.admin_hf')

@section('title', 'Статьи')

@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <nav class="breadcrumb bg-white push">
                <span class="breadcrumb-item active"><strong>Блог</strong></span>
                {{--<a class="breadcrumb-item" href="">Generic</a>--}}
                <span class="breadcrumb-item active">Статьи</span>
            </nav>

            @if(session()->has('info')) <!-- если уведовление или ошибка -->
                <p class="alert alert-info">{{ session()->get('info') }}</p> <!-- выводим сообщение -->
            @endif

            <!-- Table -->
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Категории</h3>

                    {{--<div class="block-options">--}}
                        {{--<div class="block-options-item">--}}
                            {{--<code>.table</code>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <a href="{{ route('admin.blog.articles.create') }}" type="button" class="btn btn-sm btn-primary">Добавить</a>
                </div>
                <div class="block-content">

                    <table class="table table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">id</th>
                            <th>Название</th>
                            {{--<th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>--}}
                            <th class="text-center" style="width: 100px;">Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php($i = 1) @foreach($articles as $article)
                            <tr>
                                <th class="text-center" scope="row">{{ $article->id }}</th>
                                <td>{{ $article->title }}</td>

                                {{--<td class="d-none d-sm-table-cell">--}}
                                    {{--<span class="badge badge-warning">Trial</span>--}}
                                {{--</td>--}}

                                <td class="text-center">
                                    <div class="btn-group">
                                        {{--<a href="{{ route('admin.blog.categories.show', $category->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Open">--}}
                                            {{--<i class="fa fa-folder-open"></i>--}}
                                        {{--</a>--}}

                                        <a href="{{ route('admin.blog.articles.edit', $article->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <form onclick="clickElem('submit{{$i}}')" action="{{ route('admin.blog.articles.destroy', $article->id) }}" method="post" class="btn btn-sm btn-secondary">
                                            @csrf
                                            @method('DELETE')

                                            <input id="submit{{$i}}" type="submit" value="Delete" hidden>
                                            <label for="submit{{$i}}" class="mb-0 cursor-p" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </label>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                            @php($i++)
                        @endforeach

                        </tbody>
                    </table>

                    {{ $articles->links('admin.layouts.admin_pagination') }}

                </div>
            </div>
            <!-- END Table -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection