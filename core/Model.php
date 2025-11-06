<?php

namespace Core;

use PDO;

class Model
{

    protected static $table;

    public static function all(): array
    {
        $db = App::get('database');
        $result = $db->query("SELECT * FROM "  . static::$table)->fetchAll(PDO::FETCH_ASSOC);
        return array_map([static::class, 'createFromArray'], $result);
    }

    public static function find(mixed $id): static | null
    {
        $db = App::get('database');
        $result = $db->query("SELECT * FROM "  . static::$table . " WHERE id = ?", [$id])->fetchAll(PDO::FETCH_ASSOC);
        return $result ? static::createFromArray($result) : null;
    }

    public static function  create(array $data): static
    {
        $db = App::get('database');

        $columns = implode(", ", array_keys($data));

        $placeholder = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO " . static::$table . " ($columns) VALUES($placeholder)";

        $db->query($sql, array_values($data));

        return static::find($db->lastInsertId()) ; 
    }

    protected static function  createFromArray(array $data): static
    {
        $model = new static();

        foreach ($data as $key => $value) {
            if (property_exists($model, $key)) {
                $model->$key = $value;
            }
        }

        return $model;
    }
}
