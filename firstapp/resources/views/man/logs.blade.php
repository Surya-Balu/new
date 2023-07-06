<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Logs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="bg-info-subtle">
<center>
@if(request()-> get('delete'))
    <div class= "alert alert-danger b b-danger" role="alert">
        <div><h2>
        you trying to delete ({{request()->get('id')}}) are you sure
        </h2>
        </div>
        <form action="/man/destroy/{{request()->get('id')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">confirm delete </button> 
            <a href="/man/logs">
            <button type="button" class="btn btn-info"> Cancel</button>
            </a>
        </form>
    </div>
            @endif
            </center>
    <section class=" container bg-light-subtle p-5 mx-auto my-5">
        <h1 ><center>String Manipulator </center></h1>
        <hr>
        <br>
        <table class="table table-striped table-dark table-bordered border-primary p-4 my-3 ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">string</th>
                    <th scope="col">opr</th>
                    <th scope="col">result</th>
                    <th scope="col">created</th>
                    <th scope="col">updated</th>
                    <th colspan=2> Edit&Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <th scope="row"><a href="/man/show/{{$d->id}} ">{{$d->id}}</th>
                    <td>{{$d->str}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                    <center>  <td><a class="btn btn-success p-1" href="/man/update/{{$d->id}}"> Update </a></td></center>
                    <td>
                    <a href="?delete=1&id={{$d->id}}" class="btn btn-danger">delete</a>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <center>
        <a class="btn btn-primary" href="/man/form"> back to form</a>
        </center>
    </section>
</body>

</html>
