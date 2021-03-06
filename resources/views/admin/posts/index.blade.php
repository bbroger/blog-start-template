@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success float-left mb-2">
        <i class="fas fa-plus"></i> Novo
    </a>

    @include('admin._search-field')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Capa</th>
            <th scope="col">Título</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                    @if($post->cover_photo)
                        <img src="{{$post->photo_url}}" height="50px" alt="foto da capa" />
                    @endif
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->categoriesList }}</td>
                <td>
                    {!!
                        $post->active ?
                            "<span class='badge badge-success'>Ativo</span>" :
                            "<span class='badge badge-warning'>Inativo</span>"
                    !!}
                </td>
                <td>
                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-sm btn-link" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-sm btn-link" title="Visualizar">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{route('admin.posts.destroy', $post->id)}}" class="btn btn-sm btn-link text-danger" title="Remover">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {!! $posts->links() !!}
    </div>
@endsection
