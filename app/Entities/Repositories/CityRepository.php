<?php
namespace App\Entities\Repositories;

use Doctrine\ORM\EntityRepository;

class CityRepository extends EntityRepository
{

    public function getList()
    {
        $citiesList = [];
        $cities = $this->getAll();

        foreach ($cities as $city) {
            $citiesList[$city->getId()] = $city->getName();
        }

        return $citiesList;
    }

    public function getAll($countryId = 0)
    {
        $criteria = [];

        if (!empty($countryId)) {
            $criteria['countryId'] = $countryId;
        }

        return $this->findBy($criteria);
    }
}