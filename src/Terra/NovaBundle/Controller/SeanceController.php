<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\Seance;
use Terra\NovaBundle\Form\SeanceType;

/**
 * Seance controller.
 *
 */
class SeanceController extends Controller
{

    /**
     * Lists all Seance entities.
     *
     */
    public function indexAction()
    {
        return $this->render('TerraNovaBundle:Seance:index.html.twig');
    }
    /**
     * Creates a new Seance entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Seance();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('seance_show'));
        }

        return $this->render('TerraNovaBundle:Seance:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Seance entity.
    *
    * @param Seance $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Seance $entity)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new SeanceType($user), $entity, array(
            'action' => $this->generateUrl('seance_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Seance entity.
     *
     */
    public function newAction()
    {
        $entity = new Seance();
        $form   = $this->createCreateForm($entity);

        return $this->render('TerraNovaBundle:Seance:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Seance entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Seance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seance entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Seance:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Seance entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Seance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seance entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Seance:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Seance entity.
    *
    * @param Seance $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Seance $entity)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new SeanceType($user), $entity, array(
            'action' => $this->generateUrl('seance_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Seance entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Seance')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Seance entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('seance_edit', array('id' => $id)));
        }

        return $this->render('TerraNovaBundle:Seance:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Seance entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:Seance')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Seance entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('seance'));
    }

    /**
     * Creates a form to delete a Seance entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seance_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function archiveAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();
        $date = date('Y-m-d');

        $seances = $em->getRepository('TerraNovaBundle:Seance')->findByEnseignantAndPast($user,$date);
        return $this->render('TerraNovaBundle:Seance:archive.html.twig', array(
            'seances' => $seances
        ));
    }

    public function nextSessionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->container->get('security.context')->getToken()->getUser();
        $date = date('Y-m-d');

        $seances = $em->getRepository('TerraNovaBundle:Seance')->findByEnseignantAndNext($user,$date);
        
        return $this->render('TerraNovaBundle:Seance:next.html.twig', array(
            'seances' => $seances
        ));
    }
}
