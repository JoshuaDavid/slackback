<?php

$dbfile = 'db/messages.sqlite'; 
$dbh = new PDO("sqlite:$dbfile");

$query = "select * from messages";
$stmt = $dbh->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$messages = array();
foreach($results as $result) {
    $messages []= array(
        'team' => $result['team_domain'],
        'channel' => $result['channel_name'],
        'user' => $result['user_name'],
        'message' => $result['text']
    );
}

if(isset($_GET['json'])) {
    echo json_encode($messages);
    exit();
} else if(isset($_GET['jsonp']) && isset($_GET['callback'])) {
    echo $_GET['callback'] . '(' . json_encode($messages) . ');';
    exit();
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>LW Slack History</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body class="container">
        <h1 class="text-center">LessWrong Slack Chat History</h1>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Team</th>
                    <th>Channel</th>
                    <th>User</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($messages as $message): ?>
                <tr>
                    <td><?php echo htmlentities($message['team']); ?></td>
                    <td><?php echo htmlentities($message['channel']); ?></td>
                    <td><?php echo htmlentities($message['user']); ?></td>
                    <td><?php echo htmlentities($message['message']); ?></td>
                </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>
