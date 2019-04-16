<?php

namespace libs;
//require_once  __DIR__.'/../vendor/autoload.php';
use ActiveRecord\Model as ActiveRecord;

class Sql /*extends ActiveRecord*/
{
    protected $fields;
    protected $table;
    protected $values;
    protected $whereField;
    protected $whereVal;
    protected $querySelectMySql;
    protected $queryInsertMySql;
    protected $queryUpdateMySql;
    protected $queryDeleteMySql;
    protected $querySelectPqSql;
    protected $queryInsertPqSql;
    protected $queryUpdatePqSql;
    protected $queryDeletePqSql;

    function __construct()
    {
        $this->fields = array();
        $this->values = array();
        $this->table = "";
        $this->whereField = "";
        $this->whereVal = "";
    }


    public function setFields($field)
    {
        if ($field != "*" && $field != "") {
            array_push($this->fields, $field);
            return $this;
        } else {
            return false;
        }
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function unsetFields()
    {
        unset($this->fields);
    }


    public function setValues($value)
    {
        if ($value != "") {
            array_push($this->values, $value);
            return $this;
        } else {
            return false;
        }
    }

    public function getValues()
    {
        return $this->values;
    }

    public function unsetValues()
    {
        unset($this->fields);
    }


    public function setWhereField($where)
    {
        if ($where != "") {
            $this->whereField = $where;
            return $this;
        } else {
            return false;
        }
    }

    public function getWhereField()
    {
        return $this->whereField;

    }


    public function setWhereVal($where)
    {
        if ($where != "") {
            $this->whereVal = $where;
            return $this;
        } else {
            return false;
        }
    }

    public function getWhereVal()
    {
        return $this->whereVal;
    }


    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function getTable()
    {
        return $this->table;
    }


    public function select()
    {
       // print_r($this->fields);
        $strMySql = implode(", ",$this->fields);
        $this->querySelectMySql = "SELECT " . $strMySql . " FROM " . $this->table . " WHERE " . $this->whereField . "='" . $this->whereVal . "'";
        //echo $this->querySelectMySql;
        return $this->querySelectMySql;
    }

    function insert()
    {
        $strFieldsMySql = implode(", ",$this->fields);
        $strNameMySql = implode("', '",$this->values);
        $this->queryInsertMySql = "INSERT"." INTO " . $this->table . "( " . $strFieldsMySql . ") " . "VALUES ('". $strNameMySql . "')";
        return $this->queryInsertMySql;
    }

    function update()
    {
        /*$strFieldsMySql = implode(", ", $this->fields);
        $strName = implode("', '", $this->values);
        $this->queryUpdateMySql = "UPDATE " . $this->table . "SET " . $strFieldsMySql . "= '" . $strName . "' WHERE " . $this->whereField . "='" . $this->whereVal . "'";
*/

        for ($i = 0; $i < count($this->fields); $i++) {
            $strFields[$i] = "" . $this->fields[$i] . "='" . $this->values[$i] . "'";
        }
        $str = implode(", ", $strFields);
        $this->queryUpdateMySql = "UPDATE " . $this->table . " SET " . $str . " WHERE ". $this->whereField . " = '".  $this->whereVal . "'";

        return $this->queryUpdateMySql;
    }

    function delete()
    {
        $this->queryDeleteMySql = "DELETE"." FROM " . $this->table . " WHERE " . $this->whereField . "='" . $this->getWhereVal() . "'";
        return $this->queryDeleteMySql;
    }


}

?>