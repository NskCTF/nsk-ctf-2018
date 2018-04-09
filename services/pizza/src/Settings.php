<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 25.03.2018
 * Time: 23:33
 */
abstract class Settings
{
    private $mysqli;
    private $max_query=15;
    private $lock_time=30;
    function __construct()
    {
        $this->mysqli = $this->connect_db();
    }
    private function connect_db(){
        $a = new mysqli(mysql, 'root', 'secret', 'name_db');
        if ($a->connect_error) {
            die('Ошибка подключения (' . $a->connect_errno . ') '
                . $a->connect_error);
        }
        return $a;
    }
    public function myslqi(){
        return $this->mysqli;
    }

    /**
     * @return int
     */
    public function check_sec()
    {
        if($_SERVER['REQUEST_URI'] == 'menu.php')
            return;
        if(!isset($_SESSION['enter']) || !isset($_SESSION['enter']['q']) || !isset($_SESSION['enter']['t'])){

            return $this->begin_s();
        }
        $a = &$_SESSION['enter'];
        if(!$a['l']) {
            if(time()==$a['t']){
                if ($a['q'] > $this->max_query) {
                    $a['l'] = 1;
                } else {
                    $this->add_record();
                }
            }else{
                $a['q'] = 0;
                $this->add_record();
            }
        }else{
            if (time() - $a['t'] <= $this->lock_time) {
                die('You are locked');
            } else {
                $a['q'] = 0;
                $a['l'] = 0;
                $this->add_record();
            }
        }
        return ;
    }
    private function add_record(){
        $_SESSION['enter']['q']++;
        $_SESSION['enter']['t']=time();
    }
    public function begin_s(){
        if(!isset($_SESSION['balance'])){
            $_SESSION['balance']=scost;
    }
        if(!isset($_SESSION['enter'])){
            $_SESSION['enter']['q'] = 0;
            $_SESSION['enter']['t'] = 0;
            $_SESSION['enter']['l'] = 0;
            $this->add_record();
        }
    }
}