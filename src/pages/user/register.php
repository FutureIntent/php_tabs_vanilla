<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User list</title>
    <script type="text/javascript"></script>
</head>
<body>
    <h1>User registration</h1>
    <form method='POST' action='./../../actions/users/register_action.php'>
        <label for="email">Email:</label>
        <br>
        <input placeholder='Email' id='email' name='email' type='email' minlength="5" maxlength="255" required/>
        <br>
    
        <br>
        <label for="name">Name:</label>
        <br>
        <input placeholder='Name' id='name' name='name' type='text' maxlength="255"/>
        <br>
    
        <br>
        <label for="password">Password:</label>
        <br>
        <input placeholder='Password' id='password' name='password' type='password' minlength="5" maxlength="255" required/>
        <br>
    
        <br>
        <button type='submit'>
            Submit
        </button>
    </form>
    <p id='message'></p>

</body>
</html>