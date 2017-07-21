<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Store.php';
    require_once 'src/Brand.php';

    $server = 'mysql:host=localhost:8889;dbname=omgshoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }

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

        function testGetAll()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);
          $test_store->save();

          $name2 = "Shoe Imporium";
          $test_store2 = new Store($name2);
          $test_store2->save();

          //Act
          $result = Store::getAll();

          //Assert
          $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testDeleteAll()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);
          $test_store->save();

          $name2 = "Shoe Imporium";
          $test_store2 = new Store($name2);
          $test_store2->save();

          //Act
          Store::deleteAll();
          $result = Store::getAll();

          //Assert
          $this->assertEquals([], $result);
        }

        function testFind()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);
          $test_store->save();

          $name2 = "Shoe Imporium";
          $test_store2 = new Store($name2);
          $test_store2->save();

          //Act
          $result = Store::find($test_store2->getId());

          //Assert
          $this->assertEquals($test_store2, $result);
        }

        function testUpdate()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);
          $test_store->save();

          $new_name = "Shoe Imporium";

          //Act
          $test_store->update($new_name);

          //Assert
          $this->assertEquals($new_name, $test_store->getName());
        }

        function testDelete()
        {
          //Arrange
          $name = "Shoe Stop";
          $test_store = new Store($name);
          $test_store->save();

          $name2 = "Shoe Imporium";
          $test_store2 = new Store($name2);
          $test_store2->save();

          //Act
          $test_store->delete();

          //Assert
          $this->assertEquals([$test_store2], Store::getAll());
        }

    }
?>
