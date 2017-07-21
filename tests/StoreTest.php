<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Store.php';

    $server = 'mysql:host=localhost:8889;dbname=omgshoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        function testGetName()
        {
            //Arrange
            $name = "Shoe Stop";
            $test_store = new Store($name);

            //Act
            $result = $test_store->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        // function testSetName()
        // {
        //     //Arrange
        //
        //     //Act
        //
        //     //Assert
        // }
        //
        // function testGetId()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
        //
        // function testSave()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
        //
        // function testGetAll()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
        //
        // function testDeleteAll()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
        //
        // function testFind()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
        //
        // function testUpdate()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
        //
        // function testDelete()
        // {
        //   //Arrange
        //
        //   //Act
        //
        //   //Assert
        // }
    }
?>
