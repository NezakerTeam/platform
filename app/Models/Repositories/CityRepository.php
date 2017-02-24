<?php
namespace App\Models\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository extends EntityRepository
{

    /**
     * @inheritdoc 
     */
    protected static function getModel()
    {
        return new City();
    }

    /**
     * Get all the cities for a specific or all countries
     * 
     * @param int|null $countryId   The specific country id
     * 
     * @return Collection
     */
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
