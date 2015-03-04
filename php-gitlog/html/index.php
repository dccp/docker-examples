<!DOCTYPE html>
<html>
<head>
    <title>Recent commits</title>
    <link rel="stylesheet" href="css/basic/emojify.min.css" />
    <style>
    body { font-family: "Helvetica Neue", Helvetica, "Hiragino Sans GB", Arial, sans-serif;  font-size: 13px; line-height: 15px; color: #404040; }
    ul { list-style-type: none; }
    .emoji { background-image: none;
             width: 20px; }
    </style>
</head>
<body>
<?php
for($i = 1; $i <= 2; $i++){
    $url = "https://api.github.com/orgs/cthit/events?page=".$i;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Best script evar!1!");
    $output = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($output, true);
    foreach($data as $event){
        if($event["type"] == "PushEvent"){
            echo "<p>";
            $repo_name = $event["repo"]["name"];
            $pusher = $event["actor"]["login"];
            $avatar_url = $event["actor"]["avatar_url"];

            $date = strtotime($event["created_at"]);
            $last_date = 14128785000; # Date of sektionsmötet in lp1
            if ($last_date - $date <= 0) { continue; }
            $date = gmdate("Y-m-d H:i", $date);

            echo "<img src='" . $avatar_url . "' width='25' />\n";
            echo "<b>" . $pusher . "</b> pushed to <i>" . $repo_name . "</i> @ " . $date . ":" . "<br />";
            $commits = $event["payload"]["commits"];
            echo "<ul>\n";
            foreach($commits as $co){
                echo "<li>";
                echo $co["author"]["name"]." ➔ ".$co["message"];
                echo "</li>\n";
            }
            echo "</ul></p>\n";
        }
    }
}
?>
<script src="js/emojify.min.js"></script>
<script>
emojify.setConfig({
    blacklist: {
        elements: ['script', 'textarea', 'pre', 'code'],
        classes: ['no-emojify']
        },
    mode: 'img',
    img_dir: 'images/basic'
});
emojify.run();
</script>
</body>
</html>
