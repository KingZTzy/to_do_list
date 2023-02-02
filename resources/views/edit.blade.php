<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman || Edit</title>

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">
    
    {{-- My Style CSS --}}
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 style="center">Edit To Do List</h3>
                <form action="{{ route('update', $todolist->id) }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" id="content"
                            required autofocus value="{{ old('content', $todolist->content) }}">
                        @method('put')
                        <button type="submit" class="btn btn-black"> <i class="bi bi-pencil-fill"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>