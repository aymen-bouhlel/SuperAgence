<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 * 
 * @Vich\Uploadable
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
    * NOTE: This is not a mapped field of entity metadata, just a simple property.
    * 
    * @Vich\UploadableField(mapping="property_image", fileNameProperty="fileName")
    * @Assert\Image(mimeTypes="image/jpeg")
    * 
    * @var File|null
    */
   private $imageFile;

   /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Property", inversedBy="pictures")
    * @ORM\JoinColumn(nullable=false)
    */
   private $property;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

   /**
    * Get the value of imageFile
    *
    * @return  File|null
    */ 
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

   /**
    * Set the value of imageFile
    *
    * @param  File|null  $imageFile
    *
    * @return  self
    */ 
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
    }

   public function getProperty(): ?Property
   {
       return $this->property;
   }

   public function setProperty(?Property $property): self
   {
       $this->property = $property;

       return $this;
   }

}
