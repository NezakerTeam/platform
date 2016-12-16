<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country.
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * Column(name="order", type="integer")
     */
    private $order;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_enabled", type="boolean", nullable=false)
     */
    private $isEnabled = true;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="City", mappedBy="country", orphanRemoval=true)
     */
    private $cities;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set order.
     *
     * @param int $order
     *
     * @return self
     */
    public function setOrder($order)
    {
        $this->type = $order;

        return $this;
    }

    /**
     * Get order.
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set is enabled?.
     *
     * @param bool $isEnabled
     *
     * @return self
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get is enabled.
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Sets the cities of the country.
     *
     * @param array $cities
     *
     * @return self
     */
    public function setCities(array $cities)
    {
        $this->cities = [];

        foreach ($cities as $citiy) {
            $this->addCity($citiy);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addCity($city)
    {
        if (!in_array($city, $this->cities, true)) {
            $this->cities[] = $city;
        }

        return $this;
    }

    /**
     * Get the country cities.
     *
     * @return array
     */
    public function getCities()
    {
        return $this->cities;
    }
}
