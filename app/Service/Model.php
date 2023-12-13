<?php

namespace App\Service;

use App\Database\Connect;

class Model extends Connect
{
    public function findInDatabase($column, $value, $many = true, $DESC = false, $limit = false, $search = false, $userId = false)
    {
        $query = "SELECT * FROM $this->table WHERE `$column` = :$column";
        if ($DESC) {
            $query .= " ORDER BY `id` DESC LIMIT $limit";
        }
        if ($search) {
            $query .= " AND `user_id` = :user_id";
        }
        $sql = $this->connect()->prepare($query);
        $params = [
            $column => $value,
        ];
        if ($search) {
            $params['user_id'] = $userId;
        }
        $sql->execute($params);
        if ($many) {
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $entity = $sql->fetch(\PDO::FETCH_ASSOC);
            if (!$entity) {
                return false;
            }
            foreach ($entity as $key => $value) {
                $this->$key = $value;
            }
            return $this;
        }
    }
    public function addToDatabase()
    {
        $strFields = implode(",", $this->fields);
        $strBins = implode(",", $this->bins);
        $query = "INSERT INTO $this->table ($strFields) VALUES ($strBins)";
        $db = $this->connect()->prepare($query);
        foreach ($this->forExecute as $executeFields) {
            $params[$executeFields] = $this->$executeFields;
        }
        $db->execute($params);
    }
    public function updateInDatabase($data)
    {
        $keys = array_keys($data);
        $fields = array_map(function ($item) {
            return "`$item` = :$item";
        }, $keys);
        $updatedFields = implode(',', $fields);
        $query = "UPDATE $this->table SET $updatedFields WHERE `id` = :id";
        $db = $this->connect()->prepare($query);
        $data['id'] = $this->id;

        $db->execute($data);
    }
    public function deleteFromDatabase($column, $value)
    {
        $query = "DELETE FROM $this->table WHERE `$column` = :$column";
        $db = $this->connect()->prepare($query);
        $db->execute([
            $column => $value
        ]);
    }
}
