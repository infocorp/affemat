<?php
namespace Infocorp\Bundle\AffematBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ContactGroupAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('enabled', null, array(
                'label' => 'Habilitado',
                'attr' => array('checked' => true),
            ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        return $showMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('contacts', null, array('label' => 'Contatos'))
            ->add('enabled', null, array('label' => 'Habilitado'))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        return $listMapper
            ->addIdentifier('name', null, array('label' => 'Nome'))
            ->add('enabled', null, array(
                'label' => 'Habilitado',
                'editable' => true,
            ))
        ;
    }
}