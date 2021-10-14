<h1>FORM</h1>

<form method="post" action="validation">

    {{@csrf_field()}}
    <table>
       
        <tr>
            <td>Email</td>
            <td><input type="textbox" name="email"></td>
            <td>
                <span class="error">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"></td>
            <td>
                <span class="error">
                    @error('pass')
                        {{$message}}
                    @enderror
                </span>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit"></td>
            
        </tr>

    </table>
    <span class="error">
    {{session('error')}}
    </span>

</form>

<style>
    .error{color:red};
</style>