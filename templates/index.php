<?php
//include_once 'E:/PHP/OSPanel/domains/GFL/php_task1/task4/index.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

//MySql
echo "MySql".'<br>';
//echo $mysql_conn.'<br>';
foreach ($arrRes as $field) {
    echo $field->name." ".$field->email."<br>";


}
//echo $res_insert.'<br>';
echo $res_update.'<br>';
echo $res_delete.'<br>';
//
////PgSql
//echo "PgSql".'<br>';
//echo $pg_con.'<br>';
//foreach ($pg_arr_select as $key=>$fields) {
//    foreach($fields as $field){
//        echo $field." ";
//    }
//}
//echo '<br>'.$pg_res_insert.'<br>';
//echo $pg_res_update.'<br>';
//echo $pg_res_delete.'<br>';

?>

</body>
</html>