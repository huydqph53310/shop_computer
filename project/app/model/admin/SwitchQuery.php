<?php

class SwitchQuery extends ConnectDatabase
{
    public function __construct()
    {
        parent::__construct();
    }
    public function __destruct() {}

    public function ActionQuery($nameQuery, $idAction, object $obj = null, $iduser = null, $isadmin = 0)
    {
        switch ($nameQuery) {
            case "SELECT":
                break;
            case "UPDATE":
                break;
            case "INSERT":
                switch ($idAction) {
                    case "createuser":
                        $sql = "INSERT INTO `users` (`users_id`, `name`, `username`, `password`, `email`, `phone`, `action`, `ban`) VALUES (NULL, '$obj->name', '$obj->username', '$obj->password', '$obj->email', '$obj->phone', '0', '0')";
                        $this->InsertQuery($sql);
                        break;

                    default:
                        break;
                }
                break;
            case "DELETE":
                break;
            case "OPENMANAGER":
                if ($isadmin = 0) {
                    //code
                }
                break;
            default:
                echo "QUERY NEVER USER IN CODE FOR DEV-TEAM";
                break;
        }
    }

    public function InsertQuery($sql)
    {
        try {
            $this->connect->query("USE " . parent::DB_NAME);
            $dataCheck = $this->connect->exec($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function DELETE($sql)
    {
        try {
            $this->connect->query("USE " . parent::DB_NAME);
            $dataCheck = $this->connect->exec($sql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
