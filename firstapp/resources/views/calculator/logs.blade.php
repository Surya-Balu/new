<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<body class="bg-dark-subtle p-4 m-5">
    <center>
@if(request()-> get('delete'))
    <div class= "alert alert-danger b b-danger" role="alert">
        <div><h2>
        you trying to delete ({{request()->get('id')}}) are you sure
        </h2>
        </div>
        <form action="/calculator/destroy/{{request()->get('id')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">confirm delete </button> 
            <a href="/calculator/logs">
            <button type="button" class="btn btn-info"> Cancel</button>
            </a>
        </form>
    </div>
            @endif
            </center>
<section class="contaner bg-warning-subtle p-4 my-3">
    <h1><center>Calculator logs</center></h1>
    <hr>
    <table class="table table-dark">
            <thead class="thead-dark">
                <tr>
                <center> 
                    <th scope=" col">id</th>
                    <th scope="col">a</th>
                    <th scope="col">b</th>
                    <th scope="col">opr</th>
                    <th scope="col">result</th>
                    <th scope="col">created</th>
                    <th scope="col">updated</th>
                 <th colspan=2>Edit&Delete</th></center>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <th scope="row"> <a href="/calculator/show/{{$d->id}} ">{{$d->id}}</a></th>
                    <td>{{$d->a}}</td>
                    <td>{{$d->b}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                  <center>  <td><a class="btn btn-success p-1" href="/calculator/update/{{$d->id}}"> Edit </a></td></center>
                    <td>
                    <a href="?delete=1&id={{$d->id}}" class="btn btn-danger">delete</a>
                    </tr>
                @endforeach
</tbody>
</table><center>
    <a class="btn btn-primary" href="/calculator/form"> Back to Form </a><center>
    </section>
    </form>
</body>
</html>