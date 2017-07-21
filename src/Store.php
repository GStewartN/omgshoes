<?php
    class Store
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $executed = $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('{$this->getName()}');");
            if ($executed) {
                $this->id = $GLOBALS['DB']->lastInsertId();
                return true;
            } else {
                return false;
            }
        }

        static function getAll()
        {
            $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
            $stores = array();
            foreach ($returned_stores as $store) {
                $name = $store['name'];
                $id = $store['id'];
                $new_store = new Store($name, $id);
                array_push($stores, $new_store);
            }
            return $stores;
        }

        static function deleteAll()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM stores;");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }

        static function find($search_id)
        {
            $found_store = null;
            $returned_stores = $GLOBALS['DB']->prepare("SELECT * FROM stores WHERE id = :id;");
            $returned_stores->bindParam(':id', $search_id, PDO::PARAM_STR);
            $returned_stores->execute();
            foreach($returned_stores as $store) {
                $name = $store['name'];
                $id = $store['id'];
                if ($id = $search_id) {
                    $found_store = new Store($name, $id);
                }
            }
            return $found_store;
        }

        function update($new_name)
        {
            $executed = $GLOBALS['DB']->exec("UPDATE stores SET name = '{$new_name}' WHERE id = {$this->getId()};");
            if ($executed) {
                $this->setName($new_name);
                return true;
            } else {
                return false;
            }
        }

        function delete()
        {
            $executed = $GLOBALS['DB']->exec("DELETE FROM stores WHERE id = {$this->getId()};");
            if ($executed) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
