<?php

include 'connect.php';
date_default_timezone_set('Asia/Manila');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT * FROM users WHERE reset_token = ? AND reset_expires > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {


        //Set new password page design here

        
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Set New Password</title>
        </head>
        <body>
            <form action="set_newpass.php" method="POST">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <input type="password" name="new_password" placeholder="New Password" required>
                <button type="submit">Update Password</button>
            </form>
        </body>
        </html>


        <?php


    } else {
        echo "Invalid or expired token.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Process new password
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    $sql = "UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newPassword, $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Password updated successfully. <a href='login.php'>Login</a>";
    } else {
        echo "Failed to reset password. Try the link again.";
    }
}

?>
