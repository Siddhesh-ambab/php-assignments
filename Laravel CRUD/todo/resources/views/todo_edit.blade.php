<h1>Edit Records</h1><br>
<br><br>
<form method="post" action="{{Route('todo.update',[$tdarr->id])}}">
    @csrf

<table>
    <tr>
        <td>First Name :</td>
        <td><input type="text" name='fname' value="{{$tdarr->fname}}"></td>
    </tr>

    <tr>
        <td>Last Name :</td>
        <td><input type="text" name='lname' value="{{$tdarr->lname}}"></td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" name='submit'></td>
    </tr>


</table>

</form>