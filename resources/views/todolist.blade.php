@extends('layouts.main')

@section('main')
<div class="container w-25 mt-5">
    <div class="card shadow-sm">
        <div class="card-body">         
            <h3 style="center"> Halaman | ToDoList </h3>
            <form action="{{ route('store') }}" method="POST" autocomplete="off" class="form">
                @csrf
                <div class="input-group">     
                    <input type="text" name="content" class="form-control" placeholder="Tambah To Do List">
                    <button type="submit" class="btn btn-black"> <i class="bi bi-plus-circle-fill"></i> </button>
                </div>
            </form>
            
            @if (count($todolists))
            <ul class="list-group mt-3">
                {{-- Looping Data From Database --}}
                @foreach ($todolists as $todolist)
                    <li class="list-group-item text-center">
                            {{-- If For Checklist --}}
                            @if ($todolist->completed === 1)
                            <h3 style="text-decoration: line-through red">
                                {{ $todolist->id }} ||
                                {{ $todolist->content }}
                            </h3>
                            @else
                            <h3>
                                {{ $todolist->id }} ||
                                {{ $todolist->content }}
                            </h3>
                            @endif
                        <li class="list-group-item text-center">
                            
                                <button class="btn btn-link btn-sm"> 
                                    <a href="{{ route('edit', $todolist->id) }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </button>
                        
                                <form action="{{ route('destroy', $todolist->id) }}" method="POST"> 
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link btn-sm"> 
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                                
                                <button class="btn btn-link btn-sm">
                                    <a href="{{ route('completed', $todolist->id) }}"> 
                                        <i class="bi bi-check-square"></i> 
                                        @if ($todolist->completed === 1)
                                            Sudah Selesai Tugasnya!
                                        @else 
                                            Belum Selesai Tugasnya!
                                        @endif
                                        </a>
                                </button>
                            </li>   
                        </li>
                        @endforeach
                    </ul>
                    @else
            <p class="text-center mt-3"> Tidak Ada Tugas! </p>
        </div>
    </div>
</div>
@endif
@endsection