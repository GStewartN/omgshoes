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

        function testSetName()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);

          $new_name = "Shoe Imporium";

          //Act
          $test_store->setName($new_name);
          $result = $test_store->getName();

          //Assert
          $this->assertEquals($new_name, $result);
        }

        function testGetId()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);
          $test_store->save();

          //Act
          $result = $test_store->getId();

          //Assert
          $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);

          //Act
          $executed = $test_store->save();

          //Assert
          $this->assertTrue($executed, "This store not saved.");
        }

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
