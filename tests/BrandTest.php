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
            $price = "$50.00";
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
            $price = "$50.00";
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
            $price = "$50.00";
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
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);

            $new_price = "$30.00";

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
            $price = "$50.00";
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
            $price = "$50.00";
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
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = "$30.00";
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
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = "$30.00";
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
            $price = "$50.00";
            $test_brand = new Brand($brand_name, $price);
            $test_brand->save();

            $brand_name2 = "Adidas";
            $price2 = "$30.00";
            $test_brand2 = new Brand($brand_name2, $price2);
            $test_brand2->save();

            //Act
            $result = Brand::find($test_brand2->getId());

            //Assert
            $this->assertEquals($test_brand2, $result);
        }
    }
?>
