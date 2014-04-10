<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\Trophy;
use Terra\NovaBundle\Form\TrophyType;

/**
 * Trophy controller.
 *
 */
class TrophyController extends Controller
{

    /**
     * Lists all Trophy entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TerraNovaBundle:Trophy')->findAll();

        return $this->render('TerraNovaBundle:Trophy:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Trophy entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Trophy();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trophy'));
        }

        return $this->render('TerraNovaBundle:Trophy:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Trophy entity.
    *
    * @param Trophy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Trophy $entity)
    {
        $form = $this->createForm(new TrophyType(), $entity, array(
            'action' => $this->generateUrl('trophy_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Trophy entity.
     *
     */
    public function newAction()
    {
        $entity = new Trophy();
        $form   = $this->createCreateForm($entity);

        return $this->render('TerraNovaBundle:Trophy:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Trophy entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Trophy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trophy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Trophy:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Trophy entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Trophy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trophy entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Trophy:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Trophy entity.
    *
    * @param Trophy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Trophy $entity)
    {
        $form = $this->createForm(new TrophyType(), $entity, array(
            'action' => $this->generateUrl('trophy_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing Trophy entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Trophy')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Trophy entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('trophy'));
        }

        return $this->render('TerraNovaBundle:Trophy:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Trophy entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:Trophy')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Trophy entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trophy'));
    }

    /**
     * Creates a form to delete a Trophy entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trophy_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
