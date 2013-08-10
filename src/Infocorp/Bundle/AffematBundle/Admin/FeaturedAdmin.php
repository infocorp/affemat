<?php
namespace Infocorp\Bundle\AffematBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class FeaturedAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper
            ->add('title', null, array('label' => 'Título'))
            ->add('description', null, array('label' => 'Descrição'))
            ->add('link')
            ->add('image', 'sonata_type_model_list', array('label' => 'Imagem (1500x550)'))
            ->add('enabled', null, array('label' => 'Ativo'))
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        return $listMapper
            ->addIdentifier('title', null, array('label' => 'Título'))
            ->add('enabled', null, array('label' => 'Ativo'))
            ->add('link')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        return $datagridMapper
            ->add('link')
            ->add('enabled', null, array('label' => 'Ativo'))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        return $showMapper
            ->add('title', null, array('label' => 'Título'))
            ->add('description', null, array('label' => 'Descrição'))
            ->add('link')
            ->add('image', null, array('label' => 'Imagem'))
            ->add('enabled', null, array('label' => 'Ativo'))
        ;
    }
}