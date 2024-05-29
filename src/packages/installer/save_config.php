<?php
header('Content-Type: application/json');

global $pid;
$response = ["success" => false, "message" => ""];
try{


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bakim = isset($_POST['bakim']) ? true : false;
    $title = $_POST['title'];
    $projectName = $_POST['project_name'];
    
    $dbConfig = [];
    if (isset($_POST['db_connection'])) {
        $dbConfig = [
            "host" => $_POST['db_host'],
            "username" => $_POST['db_username'],
            "name" => $_POST['db_name'],
            "password" => $_POST['db_password']
        ];
        
        $response["db_test"] = true;
    }

    $mailConfig = [];
    if (isset($_POST['mail_connection'])) {
        $mailConfig = [
            "username" => $_POST['mail_username'],
            "password" => $_POST['mail_password']
        ];
    }

    $config = [
        "bakim" => $bakim,
        "title" => $title,
        "PROJECT_NAME" => $projectName,
        "DB" => $dbConfig,
        "mail" => $mailConfig
    ];

    $configContent = "<?php\n\nreturn " . var_export($config, true) . ";\n";

    if (file_put_contents('packages/helper/settings.php', $configContent)) {
        $response["success"] = true;
        $response["message"] = "Configuration saved successfully!";
        
    } else {
        $response["message"] = "Failed to save configuration.";
    }
}
}
catch(Exception $ex){
    $response["error"] = $ex->getMessage();
}
echo json_encode($response);
?>
