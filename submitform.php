<?php
require_once './xss/library/HTMLPurifier.auto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_FILES['image']['name'];
    $description = sanitize($_POST['description']);
    $discord_id = sanitize($_POST['discord_id']);
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $sekrit = '';
    $niggerresponse = $_POST['h-captcha-response'];
    $ERM = $_SERVER['REMOTE_ADDR'];
    $sex = "https://hcaptcha.com/siteverify";
    $hcaptcha_data = array(
        'secret' => $sekrit,
        'response' => $niggerresponse,
        'remoteip' => $ERM
    );
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($hcaptcha_data)
        )
    );
    $context = stream_context_create($options);
    $res = file_get_contents($sex, false, $context);
    $res = json_decode($res);
    if (!$res->success) {
        echo "<center><h1>hcaptcha invalid youre too much of a nigger to solve a captcha are you</h1></center><br><marquee direction='down' scrollamount='4'><video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647515387445268/lv_0_20230607230709.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647515001561129/trim.00D415E3-CA9C-4738-BF05-54E3363DB4FE.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647514192072775/goodvid.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647476841783327/SnapInsta_272113597_480401470151593_4492942368815886013_n-1-1.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647476401385572/caption.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647475424112680/lv_0_20220525214355.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647474828525568/lv_0_20220522224946.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647474304233552/cachedvideo muted.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647473792532560/BIJUAKfH.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647473335345273/lv_0_20230608223246.mov\" autoplay=\"\"></video muted>\n<video muted src=\"https://cdn.discordapp.com/attachments/966189149453447228/1117647472781705306/trim.84804F72-729C-42F5-8C81-F5BBF2C4AB1E.mp4\" autoplay=\"\"></video muted>\n<img src=\"https://media.discordapp.net/attachments/988862412260274176/1041106385569591326/caption.gif\">\n<img src=\"https://cdn.discordapp.com/attachments/842610340168728588/1112592133690494977/image.png\"></marquee>";
        exit;
    }

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "file is not an image.";
            exit;
        }
    }
    if ($_FILES["image"]["size"] > 500000) {
        echo "file too large";
        exit;
    }
    $allowed_ext = array("jpg", "jpeg", "png", "gif");
    $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed_ext)) {
        echo "only images and gifs are allowed";
        exit;
    }
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $data = file_get_contents('data.json');
        $data = json_decode($data, true);
        
        $new_item = array(
            "image" => $target_file,
            "description" => $description,
            "discord_id" => $discord_id
        );
        array_push($data, $new_item);
        $data = json_encode($data);
        file_put_contents('data.json', $data);
        header('Location: index.php');
        exit;
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }
}

function sanitize($input) {
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.Allowed', ''); // customizable obviously
    $purifier = new HTMLPurifier($config);
    $clean_input = $purifier->purify($input);
    return $clean_input;
}
?>