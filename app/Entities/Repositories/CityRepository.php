<?php
namespace App\Entities\Repositories;

class CityRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new \App\Models\City();
    }

    public static function getAll($countryId = null)
    {
        $citiesQB = self::getModel();

        if ($countryId != null) {
            $citiesQB = $citiesQB->where('country_id', $countryId);
        }

        $cities = $citiesQB->orderBy('name', 'ASC')
            ->get();

        return $cities;
    }
}
