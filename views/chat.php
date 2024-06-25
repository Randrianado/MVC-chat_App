<?php
    // session_start();
    // if(!isset($_SESSION["user"])){
    //     header("Location/login.php");
    //     exit();
    // }

    require_once'../Controllers/messageController.php';
    $messageController=new MessageContoller();
    $messages=$messageController->getMessages();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Chat</title>
</head>
<body>
    <h1>Chat</h1>
    <h2>Messages Recues</h2>
    <ul>
        <?php foreach($messages as $message):?>
                <li><strong><?php echo $message->sender; ?></strong><?php $message->message;?></li>
        <?php endforeach; ?>
    </ul>
    <h2>Envoyer un message</h2>
    <form action="../Controllers/messageController.php?action=sendMessage"  method="post" class="container">
                <input type="hidden" name="receiver_id" value="RECEIVER_ID_PLACEHORDER">
                <textarea name="message" placeholder="votre message.." required></textarea>
                <button type="submit">Envoyer</button>
    </form>
</body>
</html>