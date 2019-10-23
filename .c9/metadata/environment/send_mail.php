{"filter":false,"title":"send_mail.php","tooltip":"/send_mail.php","undoManager":{"mark":8,"position":8,"stack":[[{"start":{"row":0,"column":0},"end":{"row":75,"column":2},"action":"insert","lines":["<?php","/*","This first bit sets the email address that you want the form to be submitted to.","You will need to change this value to a valid email address that you can access.","*/","$webmaster_email = \"name@example.com\";","","/*","This bit sets the URLs of the supporting pages.","If you change the names of any of the pages, you will need to change the values here.","*/","$feedback_page = \"feedback_form.html\";","$error_page = \"error_message.html\";","$thankyou_page = \"thank_you.html\";","","/*","This next bit loads the form field data into variables.","If you add a form field, you will need to add it here.","*/","$email_address = $_REQUEST['email_address'] ;","$comments = $_REQUEST['comments'] ;","$first_name = $_REQUEST['first_name'] ;","$msg = ","\"First Name: \" . $first_name . \"\\r\\n\" . ","\"Email: \" . $email_address . \"\\r\\n\" . ","\"Comments: \" . $comments ;","","/*","The following function checks for email injection.","Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.","*/","function isInjected($str) {","\t$injections = array('(\\n+)',","\t'(\\r+)',","\t'(\\t+)',","\t'(%0A+)',","\t'(%0D+)',","\t'(%08+)',","\t'(%09+)'","\t);","\t$inject = join('|', $injections);","\t$inject = \"/$inject/i\";","\tif(preg_match($inject,$str)) {","\t\treturn true;","\t}","\telse {","\t\treturn false;","\t}","}","","// If the user tries to access this script directly, redirect them to the feedback form,","if (!isset($_REQUEST['email_address'])) {","header( \"Location: $feedback_page\" );","}","","// If the form fields are empty, redirect to the error page.","elseif (empty($first_name) || empty($email_address)) {","header( \"Location: $error_page\" );","}","","/* ","If email injection is detected, redirect to the error page.","If you add a form field, you should add it here.","*/","elseif ( isInjected($email_address) || isInjected($first_name)  || isInjected($comments) ) {","header( \"Location: $error_page\" );","}","","// If we passed all previous tests, send the email then redirect to the thank you page.","else {","","\tmail( \"$webmaster_email\", \"Feedback Form Results\", $msg );","","\theader( \"Location: $thankyou_page\" );","}","?>"],"id":1}],[{"start":{"row":5,"column":20},"end":{"row":5,"column":36},"action":"remove","lines":["name@example.com"],"id":2},{"start":{"row":5,"column":20},"end":{"row":5,"column":21},"action":"insert","lines":["p"]},{"start":{"row":5,"column":21},"end":{"row":5,"column":22},"action":"insert","lines":["a"]},{"start":{"row":5,"column":22},"end":{"row":5,"column":23},"action":"insert","lines":["r"]},{"start":{"row":5,"column":23},"end":{"row":5,"column":24},"action":"insert","lines":["k"]},{"start":{"row":5,"column":24},"end":{"row":5,"column":25},"action":"insert","lines":["s"]},{"start":{"row":5,"column":25},"end":{"row":5,"column":26},"action":"insert","lines":["."]},{"start":{"row":5,"column":26},"end":{"row":5,"column":27},"action":"insert","lines":["l"]},{"start":{"row":5,"column":27},"end":{"row":5,"column":28},"action":"insert","lines":["e"]}],[{"start":{"row":5,"column":28},"end":{"row":5,"column":29},"action":"insert","lines":["e"],"id":3},{"start":{"row":5,"column":29},"end":{"row":5,"column":30},"action":"insert","lines":["8"]},{"start":{"row":5,"column":30},"end":{"row":5,"column":31},"action":"insert","lines":["4"]},{"start":{"row":5,"column":31},"end":{"row":5,"column":32},"action":"insert","lines":["@"]}],[{"start":{"row":5,"column":32},"end":{"row":5,"column":33},"action":"insert","lines":["g"],"id":4},{"start":{"row":5,"column":33},"end":{"row":5,"column":34},"action":"insert","lines":["m"]},{"start":{"row":5,"column":34},"end":{"row":5,"column":35},"action":"insert","lines":["a"]},{"start":{"row":5,"column":35},"end":{"row":5,"column":36},"action":"insert","lines":["i"]},{"start":{"row":5,"column":36},"end":{"row":5,"column":37},"action":"insert","lines":["l"]},{"start":{"row":5,"column":37},"end":{"row":5,"column":38},"action":"insert","lines":["."]},{"start":{"row":5,"column":38},"end":{"row":5,"column":39},"action":"insert","lines":["c"]},{"start":{"row":5,"column":39},"end":{"row":5,"column":40},"action":"insert","lines":["o"]},{"start":{"row":5,"column":40},"end":{"row":5,"column":41},"action":"insert","lines":["m"]}],[{"start":{"row":19,"column":40},"end":{"row":19,"column":41},"action":"remove","lines":["s"],"id":5},{"start":{"row":19,"column":39},"end":{"row":19,"column":40},"action":"remove","lines":["s"]},{"start":{"row":19,"column":38},"end":{"row":19,"column":39},"action":"remove","lines":["e"]},{"start":{"row":19,"column":37},"end":{"row":19,"column":38},"action":"remove","lines":["r"]},{"start":{"row":19,"column":36},"end":{"row":19,"column":37},"action":"remove","lines":["d"]},{"start":{"row":19,"column":35},"end":{"row":19,"column":36},"action":"remove","lines":["d"]},{"start":{"row":19,"column":34},"end":{"row":19,"column":35},"action":"remove","lines":["a"]},{"start":{"row":19,"column":33},"end":{"row":19,"column":34},"action":"remove","lines":["_"]}],[{"start":{"row":21,"column":30},"end":{"row":21,"column":31},"action":"remove","lines":["_"],"id":6},{"start":{"row":21,"column":29},"end":{"row":21,"column":30},"action":"remove","lines":["t"]},{"start":{"row":21,"column":28},"end":{"row":21,"column":29},"action":"remove","lines":["s"]},{"start":{"row":21,"column":27},"end":{"row":21,"column":28},"action":"remove","lines":["r"]},{"start":{"row":21,"column":26},"end":{"row":21,"column":27},"action":"remove","lines":["i"]},{"start":{"row":21,"column":25},"end":{"row":21,"column":26},"action":"remove","lines":["f"]}],[{"start":{"row":20,"column":30},"end":{"row":20,"column":31},"action":"remove","lines":["s"],"id":7},{"start":{"row":20,"column":29},"end":{"row":20,"column":30},"action":"remove","lines":["t"]},{"start":{"row":20,"column":28},"end":{"row":20,"column":29},"action":"remove","lines":["n"]},{"start":{"row":20,"column":27},"end":{"row":20,"column":28},"action":"remove","lines":["e"]},{"start":{"row":20,"column":26},"end":{"row":20,"column":27},"action":"remove","lines":["m"]},{"start":{"row":20,"column":25},"end":{"row":20,"column":26},"action":"remove","lines":["m"]},{"start":{"row":20,"column":24},"end":{"row":20,"column":25},"action":"remove","lines":["o"]},{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"remove","lines":["c"]}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"insert","lines":["f"],"id":8},{"start":{"row":20,"column":24},"end":{"row":20,"column":25},"action":"insert","lines":["o"]},{"start":{"row":20,"column":25},"end":{"row":20,"column":26},"action":"insert","lines":["r"]},{"start":{"row":20,"column":26},"end":{"row":20,"column":27},"action":"insert","lines":["m"]}],[{"start":{"row":20,"column":27},"end":{"row":20,"column":28},"action":"insert","lines":["-"],"id":9},{"start":{"row":20,"column":28},"end":{"row":20,"column":29},"action":"insert","lines":["t"]},{"start":{"row":20,"column":29},"end":{"row":20,"column":30},"action":"insert","lines":["e"]},{"start":{"row":20,"column":30},"end":{"row":20,"column":31},"action":"insert","lines":["x"]},{"start":{"row":20,"column":31},"end":{"row":20,"column":32},"action":"insert","lines":["t"]}]]},"ace":{"folds":[],"scrolltop":432,"scrollleft":0,"selection":{"start":{"row":20,"column":32},"end":{"row":20,"column":32},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":28,"state":"php-comment","mode":"ace/mode/php"}},"timestamp":1571705470389,"hash":"f08e070f8e54e83e6194a8bfa4cba4e6aa5476a6"}