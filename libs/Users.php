<?php



namespace libs;
include_once 'Sql.php';
require_once  __DIR__.'/../vendor/autoload.php';

use ActiveRecord\Model as ActiveRecord;

class Users extends ActiveRecord
{

//    function __construct()
//    {
//        //parent::__construct();
//    }

    /*public function connectionMySql()
    {
        ActiveRecord\Config::initialize(function ($config)
        {
            $config->set_model_directory('libs');
            $config->set_connections(array(
                'development'=>'mysql://root:@localhost:3307/gfl'
            ));
        });
    }*/

//    public function select()
//    {
//        //parent::select();
//        //$data =  $this::table()->find_by_sql( $this->querySelectMySql);
//
//        return $this->querySelectMySql;
//    }


}