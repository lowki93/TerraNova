<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\SousTheme;
use Terra\NovaBundle\Form\SousThemeType;

/**
 * SousTheme controller.
 *
 */
class SousThemeController extends Controller
{

    /**
     * Lists all SousTheme entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TerraNovaBundle:SousTheme')->findAll();

        return $this->render('TerraNovaBundle:SousTheme:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SousTheme entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SousTheme();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soustheme_show', array('id' => $entity->getId())));
        }

        return $this->render('TerraNovaBundle:SousTheme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SousTheme entity.
    *
    * @param SousTheme $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SousTheme $entity)
    {
        $form = $this->createForm(new SousThemeType(), $entity, array(
            'action' => $this->generateUrl('soustheme_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SousTheme entity.
     *
     */
    public function newAction()
    {
        $entity = new SousTheme();
        $form   = $this->createCreateForm($entity);

        return $this->render('TerraNovaBundle:SousTheme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SousTheme entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:SousTheme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousTheme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:SousTheme:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SousTheme entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:SousTheme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousTheme entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:SousTheme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SousTheme entity.
    *
    * @param SousTheme $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SousTheme $entity)
    {
        $form = $this->createForm(new SousThemeType(), $entity, array(
            'action' => $this->generateUrl('soustheme_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SousTheme entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:SousTheme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousTheme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('soustheme_edit', array('id' => $id)));
        }

        return $this->render('TerraNovaBundle:SousTheme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SousTheme entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:SousTheme')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SousTheme entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('soustheme'));
    }

    /**
     * Creates a form to delete a SousTheme entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soustheme_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
