<?php


namespace models\marks;


use models\entity;
use models\buyers\buyer;
use models\companies\companie;

class mark extends entity
{
    public $id;
    public $buyerId;
    public $companieId;
    public $mark;

    public function setBuyerId(int $buyerId)
    {
        $this->buyerId = $buyerId;
    }
    public function setCompanieId (int $companieId)
    {
        $this->companieId = $companieId;
    }
    public function setMark(int $mark)
    {
        $this->mark = $mark;
    }
    public function setDescription(string $description)
    {
        $this->description=$description;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getBuyerId()
    {
        return $this->buyerId;
    }
    public function getCompanieId()
    {
        return $this->companieId;
    }
    public function getMark()
    {
        return $this->mark;
    }
    public function getCompanieName ()
    {
        $companie = companie::getById($this->companieId);
        if ($companie!=null)
        {
            return $companie->getCompanieName();
        }
        else return null;

    }
    public function getBuyerName()
    {
        $buyer = buyer::getById($this->buyerId);
        if ($buyer!=null)
        {
            return $buyer->getBuyerName();
        }
        else return null;
    }
    static function getTableName()
    {
        return "marks";
    }
}
