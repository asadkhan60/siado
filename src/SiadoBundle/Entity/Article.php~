<?php

namespace SiadoBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Article
 */
class Article
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var text
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set description
     *
     * @param text $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * @var \SiadoBundle\Entity\Image
     */
    private $image;


    /**
     * Set image
     *
     * @param \SiadoBundle\Entity\Image $image
     *
     * @return Article
     */
    public function setImage(\SiadoBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \SiadoBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
