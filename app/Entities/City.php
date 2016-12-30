<?php
namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * City.
 *
 * @ORM\Table(name="city")
 * @ORM\Entity(repositoryClass="App\Entities\Repositories\CityRepository") 
 */
class City
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
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

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
     * Set the parent country.
     *
     * @param \App\Entities\self $country
     *
     * @return self
     */
    public function setCountry(Country $country)
    {
        $this->parent = $country;

        return $this;
    }

    /**
     * Get parent country.
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    public function __toString()
    {
        return (string)$this->getId();
    }
}
