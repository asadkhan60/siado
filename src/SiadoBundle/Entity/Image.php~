<?php

namespace SiadoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 */
class Image
{
    /**
     * @var int
     */
    private $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @Assert\File(
     *     mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/svg"},
     *     mimeTypesMessage = "Format autorisé : jpeg, png, gif et svg",
     *     maxSize="2M",
     *     maxSizeMessage="Taille de l'image trop élevé, veuillez choisir une image de taille plus petite."
     * )
     */
    private $file;


    /**
     * Set file
     *
     * @param string $file
     *
     * @return Image
     */
    public function setFile($file)
    {
        if($file) {
            $this->file = $file;
        }

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
}
