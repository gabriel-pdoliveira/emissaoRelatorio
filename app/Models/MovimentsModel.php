<?php
namespace App\Models;
use CodeIgniter\Model;
 class MovimentsModel extends Model{
    protected $table ="moviment";
    protected $returnType ="array";

    public function cash_balance(){
      $db = db_connect();
      $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
      $entrada = $db -> query($sql)->getResultArray();
      $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
      $saida = $db -> query($sql)->getResultArray();
      $cash_balance = $entrada[0]["input"]-$saida[0]["output"];
      return $cash_balance;
    }
    public function input(){
      $db = db_connect();
      $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
      $entrada = $db -> query($sql)->getResultArray();
      return $entrada[0]["input"];
    }
    public function output(){
      $db = db_connect();
      $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
      $saida = $db -> query($sql)->getResultArray();
      return $saida[0]["output"];
    }
    public function filtro(){
      $db = db_connect();
      $ano = $_POST["ano"];
      $mes = $_POST["mes"];
      $sql = "SELECT * FROM moviment WHERE YEAR(date) = $ano AND MONTH(date) = $mes";
      $filtrado = $db->query($sql)->getResultArray();
      return $filtrado;
    }
}