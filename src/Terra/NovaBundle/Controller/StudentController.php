<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\Classe;
use Terra\NovaBundle\Entity\Student;
use Terra\NovaBundle\Form\StudentType;

/**
 * Student controller.
 *
 */
class StudentController extends Controller
{

    /**
     * Lists all Student entities.
     *
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine();
        $entities = $em->getRepository('TerraNovaBundle:Student')->findByClasse($id);
        $name = $em->getRepository('TerraNovaBundle:Classe')->findByName($id);
        return $this->render('TerraNovaBundle:Student:index.html.twig', array(
            'class' => $name,
            'entities' => $entities,
            'idClasse' => $id,
        ));
    }
    /**
     * Creates a new Student entity.
     *
     */
    public function createAction(Request $request, $idClasse)
    {
        $entity = new Student();
        $form = $this->createCreateForm($entity, $idClasse);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Eleve', array('id' => $idClasse)));
        }

        return $this->render('TerraNovaBundle:Student:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Student entity.
    *
    * @param Student $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Student $entity, $idClasse)
    {
        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('Eleve_create', array('idClasse' => $idClasse)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Student entity.
     *
     */
    public function newAction($idClasse)
    {
        $entity = new Student();
        $form   = $this->createCreateForm($entity, $idClasse);

        return $this->render('TerraNovaBundle:Student:new.html.twig', array(
            'entity' => $entity,
            'idClasse' => $idClasse,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Student entity.
     *
     */
    public function showAction($id, $idClasse)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $idClasse);

        return $this->render('TerraNovaBundle:Student:show.html.twig', array(
            'idClasse' => $idClasse,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Student entity.
     *
     */
    public function editAction($id,$idClasse)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $editForm = $this->createEditForm($entity, $idClasse);
        $deleteForm = $this->createDeleteForm($id, $idClasse);

        return $this->render('TerraNovaBundle:Student:edit.html.twig', array(
            'idClasse' => $idClasse,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Student entity.
    *
    * @param Student $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Student $entity, $idClasse)
    {
        $form = $this->createForm(new StudentType(), $entity, array(
            'action' => $this->generateUrl('Eleve_update', array('id' => $entity->getId(), 'idClasse' => $idClasse)),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Student entity.
     *
     */
    public function updateAction(Request $request, $id, $idClasse)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Student')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Student entity.');
        }

        $deleteForm = $this->createDeleteForm($id, $idClasse);
        $editForm = $this->createEditForm($entity, $idClasse);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('Eleve_edit', array('id' => $id, 'idClasse' => $idClasse)));
        }

        return $this->render('TerraNovaBundle:Student:edit.html.twig', array(
            'idClasse' => $idClasse,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Student entity.
     *
     */
    public function deleteAction(Request $request, $id, $idClasse)
    {
        $form = $this->createDeleteForm($id, $idClasse);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:Student')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Student entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('Eleve', array('id' => $idClasse)));
    }

    /**
     * Creates a form to delete a Student entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id, $idClasse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Eleve_delete', array('id' => $id, 'idClasse'=> $idClasse)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
