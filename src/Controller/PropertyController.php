<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    /**
     * @Route("/biens", name="property.index")
     */
    public function index()
    {
        $property = new Property();
        $property->setTitle("Mon premier Bien");
        $property->setRooms(2);
        $property->setPrice(20000);
        $property->setBedrooms(2);
        $property->setSurface(60);
        $property->setDescription("Une petite description");
        $property->setFloor(4);
        $property->setHeat(1);
        $property->setCity("Montpelier");
        $property->setAdresse("15 Boulevard Gambetta");
        $property->setPostaleCode(34000);

        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();
        
        return $this->render('property/index.html.twig', [
            'current_menu' => 'Properties',
        ]);
    }
}
