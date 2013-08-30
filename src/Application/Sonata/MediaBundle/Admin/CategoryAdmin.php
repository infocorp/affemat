<?php
namespace Application\Sonata\MediaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class CategoryAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper
            ->add('name', null, array('label' => 'Nome'))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
    	return $listMapper
    		->addidentifier('name', null, array('label' => 'Nome'))
		;
    }
}