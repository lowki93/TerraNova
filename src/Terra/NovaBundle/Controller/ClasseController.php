<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\Classe;
use Terra\NovaBundle\Form\ClasseType;

/**
 * Classe controller.
 *
 */
class ClasseController extends Controller
{

    /**
     * Lists all Classe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TerraNovaBundle:Classe')->findAll();

        return $this->render('TerraNovaBundle:Classe:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Classe entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity = new Classe();
        $form = $this->createCreateForm($entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $user = $this->container->get('security.context')->getToken()->getUser();
            $idEnseignant = $user->getId();
            $idEtablissement = $user->getEtablissement()->getId();
            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder();
            $q = $qb->update('Terra\NovaBundle\Entity\Classe', 'c')
                    ->set('c.etablissement', '?1')
                    ->set('c.enseignant', '?2')
                    ->setParameter(1, $idEtablissement)
                    ->setParameter(2, $idEnseignant)
                    ->andWhere("c.id =".$entity->getId()."")
                    ->getQuery();
            $p = $q->execute();

            return $this->redirect($this->generateUrl('classe_show', array('id' => $entity->getId())));
        }

        return $this->render('TerraNovaBundle:Classe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Classe entity.
    *
    * @param Classe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Classe $entity)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(
            new ClasseType($user),
            $entity,
            array(
                'action' => $this->generateUrl('classe_create'),
                'method' => 'POST'
                )
            );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     *
     * Displays a form to create a new Classe entity.
     *
     */
    public function newAction()
    {
        $entity = new Classe();
        $form   = $this->createCreateForm($entity);


        return $this->render('TerraNovaBundle:Classe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Classe entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Classe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Classe:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Classe entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Classe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Classe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Classe entity.
    *
    * @param Classe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Classe $entity)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new ClasseType($user), $entity, array(
            'action' => $this->generateUrl('classe_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Classe entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Classe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('classe_edit', array('id' => $id)));
        }

        return $this->render('TerraNovaBundle:Classe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Classe entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:Classe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('classe'));
    }

    /**
     * Creates a form to delete a Classe entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('classe_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
