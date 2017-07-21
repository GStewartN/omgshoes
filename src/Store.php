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

        // function getId()
        // {
        //
        // }
        //
        // function save()
        // {
        //
        // }
        //
        // static function getAll()
        // {
        //
        // }
        //
        // static function deleteAll()
        // {
        //
        // }
        //
        // static function find()
        // {
        //
        // }
        //
        // function update()
        // {
        //
        // }
        //
        // function delete()
        // {
        //
        // }
    }
?>
