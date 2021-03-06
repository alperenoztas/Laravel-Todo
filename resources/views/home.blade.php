<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-do List</h3>
                <form action="{{route('store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fst-italic">ADD</i></button>
                    </div>
                </form>
                {{-- if tasks exist count --}}
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ( $todolists as $todolist)
                        <li class="list-group-item">
                            <form action="{{route('destroy',$todolist->id)}}" method="post">
                                {{ $todolist->content }}
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link btn-sm float-end">
                                    <i class="fst-italic">DELETE</i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
                @else
                <p class="text-cente mt-3">No Tasks!</p>
                @endif
            </div>
            @if(count($todolists))
                <div class="card-footer">
                    You have {{ count($todolists) }} pending tasks!
                </div>
            @endif
        </div>
    </div>
</body>
</html>