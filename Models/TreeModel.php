<?php

class TreeModel
{
    private $pdo;

    public function __construct()
    {
        try {
            $config = include('../config/database.php');
            $this->pdo = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception('اتصال به دیتابیس امکان پذیر نمیباشد: ' . $e->getMessage());
        }
    }

    public function getTree()
    {
        try {
            $query = "SELECT id, name, parent_id FROM document";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->buildTree(null, $items);
        } catch (Exception $e) {
            throw new Exception('خطایی در ساخت داده ها به وجود آمده است: ' . $e->getMessage());
        }
    }

    private function buildTree($parentId = null, $items = [])
    {
        $tree = [];
        foreach ($items as $item) {
            if ($item['parent_id'] == $parentId) {
                $children = $this->buildTree($item['id'], $items);
                if (!empty($children)) {
                    $item['Childes'] = $children;
                }
                unset($item['parent_id']);
                $tree[] = $item;
            }
        }
        return $tree;
    }
}
