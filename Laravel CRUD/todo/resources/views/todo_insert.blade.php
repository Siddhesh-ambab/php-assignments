<h1>Insert Records</h1><br>

<a href="todo_show">SHOW RECORDS</a>
<br><br><br>


<form method="post" action="submit">
    @csrf

<table>
    <tr>
        <td>First Name :</td>
        <td><input type="text" name='fname'></td>
    </tr>

    <tr>
        <td>Last Name :</td>
        <td><input type="text" name='lname'></td>
    </tr>

    <tr>
        <td></td>
        <td><input type="submit" name='submit'></td>
    </tr>


</table>

</form>