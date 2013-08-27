<?php
namespace Infocorp\Bundle\AffematBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ContactAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper
            ->add('title', null, array('label' => 'Nome'))
            ->add('phone', null, array('label' => 'Telefone'))
            ->add('email', null, array('required' => false))
            ->add('address', null, array(
                'label' => 'Endereço',
                'required' => false,
            ))
            ->add('contactGroup', 'sonata_type_model_list', array('label' => 'Grupo'))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        return $showMapper
            ->add('title', null, array('label' => 'Nome'))
            ->add('phone', null, array('label' => 'Telefone'))
            ->add('email')
            ->add('address', null, array('label' => 'Endereço'))
            ->add('contactGroup', null, array('label' => 'Grupo'))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        return $listMapper
            ->addIdentifier('title', null, array('label' => 'Nome'))
            ->add('phone', null, array('label' => 'Telefone'))
            ->add('email')
            ->add('contactGroup', null, array('label' => 'Grupo'))
        ;
    }
}