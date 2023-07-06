<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="bg-success p-5 m-5 text-dark bg-opacity-25">
    <section class="contaner p-1 m-5 bg-primary border border-black">
    <h1><center>Calculator update form</center></h1></section>

    <form class="bg-warning p-5 m-5" action="/calculator/savedata/{{$data->id}}" method="post" >
    <div class="row">
    <div class="col ">
    <label for="formGroupExampleInput" class="form-label p-1 m-1">Enter A value :</label><br>
    <input type="text" class="form-control" name="a" value="{{$data->a}}">
    </div>
     <div class="col" > 
     <label for="formGroupExampleInput" class="form-label p-1 m-1">Enter B value :</label><br>
     <input type="text" class="form-control" name="b" value="{{$data->b}}">
     </div>
     
     <div class="col-md-4 p-1 m-1">
     <label for="inputState" class="form-label"> Operation :</label>
      <select id="inputState" name="opr" class="form-select">
      <option value="add" @if($data->opr=='add') selected @endif >Addition</option>
      <option value="sub" @if($data->opr=='sub') selected @endif >Subtraction</option>
      <option value="mul" @if($data->opr=='mul') selected @endif >Multiply</option>
        </select>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        @csrf
        </div>
        <div>
          <center>
        <button type="submit" class="btn btn-success p-2 m-2 float-left">Save</button >
       
        <button type="button" class="btn btn-info p-2 m-2 float-right" ><a href="/calculator/logs" >logs </a> </button>
        </center>
        </div>
        <!-- <a href="/calculator/all" class="float-center">Queries all</a>
         -->
</form> 
</body>
</html>