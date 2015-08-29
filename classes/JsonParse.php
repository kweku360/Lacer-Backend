<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 8/29/15
 * Time: 5:23 AM
 */

class JsonParse implements JsonSerializable{
    public function __construct($array) {
        $this->array = $array;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return $this->array;
    }
}