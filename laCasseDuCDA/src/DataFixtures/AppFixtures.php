<?php

namespace App\DataFixtures;

use App\Entity\Model;
use App\Entity\Brand; // ou Marque selon ton entité
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brands = [];
        for ($i = 0; $i < 5; $i++) {
            $brand = new Brand();
            $brand->setName('Renault' . $i);
            $brand->setCountryOfManufacture('France' . $i);
            $brand->setManufactureName('Louis Renault' . $i);
            $brand->setImage('https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Renault_2009_logo.svg/1200px-Renault_2009_logo.svg.png'); 
            $manager->persist($brand);
            $brands[] = $brand;
        }

        for ($i = 0; $i < 20; $i++) {
            $model = new Model();
            $model->setName('Model' . $i);
            $model->setSerialNumber('SN' . str_pad($i, 10, '0', STR_PAD_LEFT));
            $model->setDataOfManufacture(new \DateTime('2023-01-01 +' . $i . ' days'));
            $model->setBrand($brands[$i % 5]);
            $manager->persist($model);
        }

        $manager->flush();
    }
}