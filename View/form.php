
<?php
         
         if(isset($_POST["submit"]))
        
         
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" onsubmit=" return validate()">
        <div>
            <h3>enter your FirstName please</h3>
            <input type="text" placeholder="FirstName" minlength="3">
        </div>
        <div>    
            <h3>enter your LastName please</h3>
            <input type="text" placeholder="LastName" minlength="3">
        </div>    
        <div>
            <h3>enter your adresse please</h3>    
        <label for="bio">your bio:</label><br> 
            <textarea name="bio" id="bio" cols="30" rows="10" placeholder="adresse" ></textarea>
            <br>
        </div>
        <div>
            <h3>enter your phoneNumber please</h3>
            <input type="number"       pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}">
        </div>
        <div>
            <h3>enter your birthday please</h3>
             <input type="date" >
         </div>
         <div>
            <h3>enter your password please</h3>
             <input type="password" id="passe" required>
         </div>
         <div>
            <h3>confirme your password please</h3>
             <input type="password" id="passe2"  required>
         </div>
         <div>
            <button type="submit" name="submit" > </button>
            <button type="reset"> reset</button>
         </div>

         <div>
            <input type="file" name="wicked" id="">

         </div>
            <input type="text" placeholder="<?php echo['wicked'];?>">
    </form>
    <script >
function validate()
{
var champA = document.getElementById("passe").value;
var champB = document.getElementById("passe2").value;
//var div_comp = document.getElementById("divcomp");
 
if(champA != champB)
{
    alert("les mots de passe ne sont pas compatible")
    return false;
}
else
{
    confirm("bienvenue");
    return false;
}

}

    </script>
</body>
</html>