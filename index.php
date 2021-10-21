<?php session_start();?>
<?php
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $captcha = generateRandomString();
    $_SESSION['captcha'] = $captcha;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no,shrink-to-fit=no">
    <title>CRUD</title>
    <link rel="stylesheet" href="water.css">
    <style>
        nav{
            background:#eee;
            padding:5px;
            width:100%;
        }
        main{
            margin-top:10px;
            margin-bottom:10px;
        }
       input{
           width:100%;
           margin:10px;
       }
       .captcha-box{
           border:1px solid black;
           width:300px;
           height:50px;
           font-size:24px;
           text-align:center;

       }
    </style>
</head>
<body>
    <header>
        <nav>
            <h1 align="center" style="margin-bottom:25px;">PHP CRUD</h1>
        </nav>
    </header>

    <main>
        <?php

    if(isset($_GET['msg'])){
        if($_GET['msg'] == 1){
            echo '<h4 align="center" style="color:green;">Data submitted successfully!!</h4>';
        }elseif($_GET['msg'] == 2){
            echo '<h4 align="center" style="color:red;">There\'s an error please try again!</h4>';
        }else{
            echo '<h4 align="center" style="color:red;">Captcha is incorrect</h4>';
        }
    }

?>  
        <form action="save.php" method="post" id="saveForm">
        <h2 align="center">Form</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="designation">Designation:</label>
        <input type="text" name="designation" id="designation">
        <label for="salary">Salary:</label>
        <input type="text" name="salary" id="salary">
        <label for="date">Date:</label>
        <input type="text" name="date" id="date">
        <div class="captcha-box"><span style='margin-top:5px;'><?php echo $_SESSION['captcha'];?></span></div>
        <label for="captcha">Captcha:</label>
        <input type="text" name="captcha" id="captcha">
        <button>Submit</button> | <a href="showData.php">See Saved Data</a>
    </form>
    
    </main>

    <footer>
        <p align="center">&copy; 2021 Kanak Tripathi</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {

$('#saveForm').validate({ // initialize the plugin
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email:true
        },
        designation: {
            required: true
        },
        salary: {
            required: true
        },
        date: {
            required: true
        },
        captcha: {
            required: true
        },
    }
});

});
    </script>
</body>
</html>