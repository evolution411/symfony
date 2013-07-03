<?php
session_start();
$sn = $_SESSION['name'];
$email = $_SESSION['email'];

if(isset($_POST['submit'])){
    
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $duixiang = $_POST['duixiang'];
    $_SESSION['duixiang']=$duixiang;
    $words = $_POST['words'];
    $know = $_POST['know'];
    $file = "cookies.txt";
        $fp = fopen($file,'a');
        fwrite($fp, "$sn;$email;$status;$gender;$duixiang;$words;$know '/n'");
   header('location:confirm.php?know='.$know + $duixiang);
}
?>
<html>
    <head>
        
    </head>
    <body>
        <form action="testme.php" method="post">
        <table>
            <tr>
                <td>
                    Your Current Status:
                </td>
                <td>
                    <select name="status">
                        <option value="single">Single</option>
                        <option value="inRel">In a Relationship</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    Do you both know each other
                </td>
                <td>
                    <select name="gender">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    His/Her Name:
                </td>
                <td>
                    <input type="text" name="duixiang">
                </td>
            </tr>
            <tr>
                <td>
                    What do you want to say to him/her:
                </td>
                <td>
                    <textarea name="words" rows="4" cols="50"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Would you like him to know:
                </td>
                <td>
                    <select name="know">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>