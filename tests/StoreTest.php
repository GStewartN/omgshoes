<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Store.php';
    require_once 'src/Brand.php';

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
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
            $name = "Foot Love";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Footwear Palace";
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

        function testAddBrand()
        {
            //Arrange
            $name = "Shoe Stop";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Shoe Imporium";
            $test_store2 = new Store($name2);
            $test_store2->save();

            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            //Act
            $test_store->addBrand($test_brand);

            //Assert
            $this->assertEquals([$test_brand], $test_store->getBrands());
        }

        function testGetBrands()
        {
            //Arrange
            $name = "Shoe Stop";
            $test_store = new Store($name);
            $test_store->save();

            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = 30;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            //Act
            $test_store->addBrand($test_brand);
            $test_store->addBrand($test_brand2);

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $test_store->getBrands());
        }
    }
?>
