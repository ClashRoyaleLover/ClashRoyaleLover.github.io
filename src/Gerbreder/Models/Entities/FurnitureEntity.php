<?php

namespace Gerbreder\Models\Entities;

use Gerbreder\Models\ViewModel\SimpleProductViewModel as SimpleProductViewModel;

    class FurnitureEntity extends ProductEntity{ 

        private const SQL_SAVE_VALUES_TO_PRODUCT_FURNITURE = 'INSERT INTO `product_furniture` SET price=?, sku=?, name=?, height=?, width=?, length=?, id=?';
        private const SQL_DELETE_OBJECT_BY_ID = 'DELETE FROM `product_furniture` WHERE id=?';
        private const SQL_LOAD_ALL_VALUES = 'SELECT * FROM `product_furniture`';
        private const TYPE = "Furniture";

        private $height;
        private $width;
        private $length;



        public function getHeight() {
            return $this->height;
        }

        public function setHeight($height) {
            $this->height = $height;
        }

        public function getWidth() {
            return $this->width;
        }

        public function setWidth($width) {
            $this->width = $width;
        }

        public function getLength() {
            return $this->length;
        }

        public function setLength($length) {
            $this->length = $length;
        }

        public function setValues($data) {
            $this->setSku($data['sku']);
            $this->setName($data['name']);
            $this->setPrice($data['price']);
            $this->setHeight($data['height']);
            $this->setWidth($data['width']);
            $this->setLength($data['length']);
        }

        function __construct($data) {
            if (!empty($data)) {
                $this->setValues($data);
            }
        }

        public function delete() {
            ProductEntity::deleteProduct($this->getId(), self::SQL_DELETE_OBJECT_BY_ID);
        }


        public function save() {
            ProductEntity::saveProduct(self::TYPE, $this->getSku(), self::SQL_SAVE_VALUES_TO_PRODUCT_FURNITURE, $this->toArray());
        }

        public static function loadAll() {
            return ProductEntity::loadAllElements(self::SQL_LOAD_ALL_VALUES, self::TYPE."Entity");
        }

        public function simplify() {
            return new SimpleProductViewModel($this, "Dimension", $this->getHeight() . "x" . $this->getWidth() . "x" . $this->getLength(), self::TYPE);
        }

        public function toArray() {
            return [$this->getPrice(),$this->getSku(), $this->getName(),
            $this->getHeight(), $this->getWidth(), $this->getLength()];
        }
    }

?>