<?php
namespace Infocorp\Bundle\AffematBundle\Entity;

interface SlideInterface
{
    /**
     * Returns last slides according to the limit passed
     * 
     * @param number $limit limit
     * 
     * @return object $result fetch result
     */
    public function findLastSlides($limit);
}