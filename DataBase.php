<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;
    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where email = '" . $email . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbemail = $row['email'];
            $dbpassword = $row['password'];
            if ($dbemail == $email && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function signUp($table, $username, $email, $password, $address)
    {
        $username = $this->prepareData($username);
        $email = $this->prepareData($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = $this->prepareData($email);
        $address = $this->prepareData($address);
        $this->sql =
            "INSERT INTO " . $table . " (username, email, password, address) VALUES ('" . $username . "','" . $email . "','" . $password . "','" . $address . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function buyIn($table, $date, $product, $status, $user_id){
        $date = $this->prepareData($date);
        $product = $this->prepareData($product);
        $status = $this->prepareData($status);
        $user_id = $this->prepareData($user_id);
        $this->sql =
            "INSERT INTO " . $table . " (date, product, status, user_id) VALUES ('" . $date . "','" . $product . "','" . $status . "','" . $user_id . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function AddFav($table, $name, $description, $cost, $user_id){
        $name = $this->prepareData($name);
        $description = $this->prepareData($description);
        $cost = $this->prepareData($cost);
        $user_id = $this->prepareData($user_id);
        $this->sql =
            "INSERT INTO " . $table . " (name, description, cost, user_id) VALUES ('" . $name . "','" . $description . "','" . $cost . "','" . $user_id . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }
}

?>
