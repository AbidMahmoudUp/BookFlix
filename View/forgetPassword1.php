<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
    
    <link rel="stylesheet" href="stylePopUp_Success.css">
    <script src="scriptPopUp_Success.js" defer></script>

    <!-- Font Awesome 5 (Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      form {
        width: 300px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  <body>
  <div class="modal">
        <div class="modal-content">
            <span class="closeIcon"><i class="fas fa-times"></i></span>

            <div class="modal-body">
                <span class="icon"><i class="fas fa-check-circle"></i></span>

                <div class="right-items">
                    <h1>Success!</h1>
                    <p>We've sent a confirmation to your e-mail for verification.</p>
                    <button id="okBtn">OK</button>    
                </div>
            </div>
        </div>
    </div>
    <form action="../Model/send.php" method="post">
      <h2>Forgot Password</h2>
      <p>Enter your email address to reset your password:</p>
      <input type="email" name="email"placeholder="Email" required>
      <button id="modalBtn" type="submit" name="submit">Send Email</button>
  
    </form>
  </body>
</html>












<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="send.php" method="post">
        <input type="email" placeholder="email" name="email">
        <button type="submit" name="submit">Send Email</button>
    </form>
</body>
</html> -->