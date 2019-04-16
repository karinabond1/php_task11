<?php
include_once 'config.php';
include_once 'libs/Sql.php';
include_once 'libs/Users.php';
require_once  __DIR__.'/vendor/autoload.php';


ActiveRecord\Config::initialize(function ($config)
{
    $config->set_model_directory('libs');
    $config->set_connections(array(
        'development'=>'mysql://root:@localhost:3307/gfl'
    ));
});
use \libs\Users;
$query = new \libs\Sql();
$user = new Users();

$querySelect = $query->setTable(TABLE)->setFields("name")->setFields("email")->setWhereField("name")->setWhereVal("Derek")->select();
$arrRes = $user::find_by_sql($querySelect);

$queryInsert = $query->setValues("John")->setValues("john@example.com")->insert();
echo $queryInsert;
$res_insert = $user::find_by_sql($queryInsert);


$query1 = new \libs\Sql();
$queryUpdate = $query1->setTable(TABLE)->setFields("email")->setValues("derkos@example.com")->setWhereField("name")->setWhereVal("Derek")->update();
$res_update = $user::find_by_sql($queryUpdate);

$queryDelete = $query1->setWhereField("name")->setWhereVal("John")->delete();
$res_delete = $user::find_by_sql($queryDelete);


//$arrRes = $user->setTable(TABLE)->setFields("name")->setFields("email")->setWhereField("name")->setWhereVal("Derek")->select();
//var_dump($arrRes);
//$user->connectionMySql();
//$arrRes = $user->select();


/*Users::create([
    'name'=> 'alex',
    'email'=>'alex@gmail.com'
]);*/

/*$user2 = Users::find('all');
foreach ($user2 as $field){
    echo $field->name;
}
*/
//select
/*$sql->setTable(TABLE);
$field_name = $sql->setFields("name");
$field_email = $sql->setFields("email");
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
$sql->select();
$mySql = new MySql();
$mySql->setObj($sql);
$mysql_conn = $mySql->connect();
$arr_select = $mySql->selectMySql();
$pgSql = new PgSql();
$pgSql->setObj($sql);
$pg_con = $pgSql->connect();
$pg_arr_select = $pgSql->select();
//insert
$val_name = $sql->setValues("John");
$val_email = $sql->setValues("john@example.com");
$queryInsert = $sql->insert();
$res_insert = $mySql->insert();
$pg_res_insert = $pgSql->insert();
//update
$sql->unsetFields();
$sql->unsetValues();
$sql = new Sql();
$mySql->setObj($sql);
$pgSql->setObj($sql);
$sql->setTable(TABLE);
$field_email = $sql->setFields("email");
$val_email = $sql->setValues("derekos@example.com");
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("Derek");
$queryUpdate = $sql->update();
$res_update = $mySql->update();
$pg_res_update = $pgSql->update();
//delete
$where_field = $sql->setWhereField("name");
$where_val = $sql->setWhereVal("John");
$queryDelete = $sql->delete();
$res_delete = $mySql->delete();
$pg_res_delete = $pgSql->delete();*/




include 'templates/index.php';
?>