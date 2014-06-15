<?php

class DB
{
    private $dbLogin, $dbHost, $dbPass, $error;
    
    /*
    * @param <string> $_dbHost (Хостинг БазыДанных)
    * @param <string> $_dbLogin (Логин Пользователя БД)
    * @param <string> $_dbPass (Пароль пользователя БД)
    */
    public function __construct ($_dbHost, $_dbLogin, $_dbPass)
    {
        $this->dbHost = $_dbHost;
        $this->dbLogin = $_dbLogin;
        $this->dbPass = $_dbPass;
    }
    
    /*
    * Коннектимся к MySQL и Выбираем Базу.
    * @param <string> $_dbName (Имя Базы)
    * @return <boolean> (В случаеи успеха вернет TRUE иначе FALSE)
    */
    public function dbConnection ($_dbName)
    {
        $connect = mysql_connect($this->dbHost, $this->dbLogin, $this->dbPass);
        $db = mysql_select_db($_dbName, $connect);
        if(!$db) self::error();
    }
    
    /*
    * Получаем все столбцы
    * @param <string> $table (Имя таблицы)
    * @param <string> [$id] (Ид поля)
    * @return <array>
    */
    public function getRow ($table, $id = false)
    {
        $result = (!$id) ? mysql_query("SELECT * FROM $table") : mysql_query("SELECT * FROM $table WHERE id = $id");
        $row = mysql_fetch_array($result);
        return $row;
    }
    
    private function error ()
    {
        echo mysql_error();
    }
}

?>