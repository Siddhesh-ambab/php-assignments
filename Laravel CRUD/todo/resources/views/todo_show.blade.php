<html>
<head>
    <title>All Data</title>
    <style>
       

        .flash{
            color:green;
            font-weight:bold;
        }

        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 60%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
<a href="todo_insert">ADD RECORDS</a>

<br><br><br>

<span class='flash'>
{{session('msg')}}

</span>

<table id="customers"> 
    <tr>
        <td>id</td>
        <td>FName</td>
        <td>LName</td>
        <td>Operations</td>
    </tr>
    {{-- {{$id=22}} --}}

    @php $id= 1; @endphp

    @foreach($tdarr as $td)
    <tr>
        <td>{{$td->id}}</td>
        <!-- <td>{{$id}}</td> -->
        <td>{{$td->fname}}</td>
        <td>{{$td->lname}}</td>
        <td> 
            <a href="todo_delete/{{$td->id}}">Delete</a>
            <a href="todo_edit/{{$td->id}}">edit</a>
        </td>
    </tr>
    @php $id++; @endphp
    @endforeach 

</table>

<span>
{{$tdarr->links('pagination::bootstrap-4')}}

</span>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



</body>
</html>