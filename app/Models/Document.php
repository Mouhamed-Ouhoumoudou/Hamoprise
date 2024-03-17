<?php
namespace App\Models;
class Document {
  // Properties
  public $id;
  public $tableMots;
  public $score=0;
  public $myrange;
  public $prix;
  public $libelle;
  public $url_photo;
  public $description;
  public $id_G;
  public $id_message;
  public $id_B;
  public $id_V;
  public $id_F;
  public $stripe_price;
  public $stripe_id;

  // Methods
  function set_id($id) {
    $this->id = $id;
  }
  function get_id() {
    return $this->id;
  }
  function set_score($score) {
    $this->score = $score;
  }
  function get_score() {
    return $this->score;
  }
  
  function set_tableMots($tableMots) {
    $this->tableMots = $tableMots;
  }
  function get_tableMots() {
    return $this->tableMots;
  }
  
  function augmente_score($mark) {
     $this->score= $this->score+$mark;
  }
  
  function set_range($k) {
    $this->myrange = $k;
  }
  function get_range() {
    return $this->myrange;
  }
}

?>