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
<section class="contaner bg-warning-subtle p-4 my-3">
    <h1><center>Calculator logs</center></h1>
    <hr>
    <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope=" col">id</th>
                    <th scope="col">a</th>
                    <th scope="col">b</th>
                    <th scope="col">opr</th>
                    <th scope="col">result</th>
                    <th scope="col">created</th>
                    <th scope="col">updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <th scope="row">{{$d->id}}</th>
                    <td>{{$d->a}}</td>
                    <td>{{$d->b}}</td>
                    <td>{{$d->opr}}</td>
                    <td>{{$d->result}}</td>
                    <td>{{$d->created_at}}</td>
                    <td>{{$d->updated_at}}</td>
                </tr>
                @endforeach
</tbody>
</table>
    <a class="btn btn-primary" href="/calculator/form"> Back to Form </a><center>
    </section>
       
        
    </form>
        
</body>
</html>