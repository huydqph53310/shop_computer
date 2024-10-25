<?php
class users
{
    public $id, $name, $username, $password, $email, $phone, $action, $ban;

    public function __construct(
        $id = null,
        $name = null,
        $username = null,
        $password = null,
        $email = null,
        $phone = null,
        $action = null,
        $ban = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->action = $action;
        $this->ban = $ban;
    }
}
