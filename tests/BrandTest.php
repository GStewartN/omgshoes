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

    class BrandTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
            Store::deleteAll();
            Brand::deleteAll();
        }

        function testGetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            //Act
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals($brand_name, $result);
        }

        function testSetBrandName()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            $new_brand_name = "Adidas";

            //Act
            $test_brand->setBrandName($new_brand_name);
            $result = $test_brand->getBrandName();

            //Assert
            $this->assertEquals($new_brand_name, $result);
        }

        function testGetPrice()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            //Act
            $result = $test_brand->getPrice();

            //Assert
            $this->assertEquals($price, $result);
        }

        function testSetPrice()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            $new_price = 30;

            //Act
            $test_brand->setPrice($new_price);
            $result = $test_brand->getPrice();

            //Assert
            $this->assertEquals($new_price, $result);
        }

        function testGetId()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            //Act
            $result = $test_brand->getId();

            //Assert
            $this->assertTrue(is_numeric($result));
        }

        function testSave()
        {
          //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);

            //Act
            $executed = $test_brand->save();

            //Assert
            $this->assertTrue($executed, "This brand is not saved.");
        }

        function testGetAll()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = 30;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            //Act
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = 30;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            //Act
            Brand::deleteAll();
            $result = Brand::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $brand_name = "Nike";
            $price = 50;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = 30;
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            //Act
            $result = Brand::find($test_brand2->getId());

            //Assert
            $this->assertEquals($test_brand2, $result);
        }

        function testAddStore()
        {
            //Arrange
            $name = "PedsPads";
            $test_store = new Store($name);
            $test_store->save();

            $brand_name = "Birkinstock";
            $price = 100;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            //Act
            $test_brand->addStore($test_store);

            //Assert
            $this->assertEquals($test_brand->getStores(), [$test_store]);
          }

        function testGetStores()
        {
            //Arrange
            $name = "Foot Cushion";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Feet Love";
            $test_store2 = new Store($name2);
            $test_store2->save();

            $brand_name = "Fleuvog";
            $price = 100;
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            //Act
            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);

            //Assert
            $this->assertEquals($test_brand->getStores(), [$test_store, $test_store2]);
        }
    }
?>
