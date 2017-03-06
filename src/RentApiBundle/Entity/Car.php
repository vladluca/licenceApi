<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 06.03.2017
 * Time: 16:41
 */

namespace RentApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Car
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
