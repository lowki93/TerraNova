<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\Etablissement;
use Terra\NovaBundle\Form\EtablissementType;
use Terra\NovaBundle\Entity\User;

/**
 * Etablissement controller.
 *
 */
class EtablissementController extends Controller
{

    /**
     * Lists all Etablissement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TerraNovaBundle:Etablissement')->findAll();

        return $this->render('TerraNovaBundle:Etablissement:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Etablissement entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Etablissement();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etablissement'));
        }

        return $this->render('TerraNovaBundle:Etablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Etablissement entity.
    *
    * @param Etablissement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Etablissement $entity)
    {
        $form = $this->createForm(new EtablissementType(), $entity, array(
            'action' => $this->generateUrl('etablissement_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Etablissement entity.
     *
     */
    public function newAction()
    {
        $entity = new Etablissement();
        $form   = $this->createCreateForm($entity);

        return $this->render('TerraNovaBundle:Etablissement:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etablissement entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Etablissement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etablissement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Etablissement:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Etablissement entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Etablissement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etablissement entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Etablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Etablissement entity.
    *
    * @param Etablissement $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Etablissement $entity)
    {
        $form = $this->createForm(new EtablissementType(), $entity, array(
            'action' => $this->generateUrl('etablissement_admin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Etablissement entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Etablissement')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etablissement entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('terra_nova_admin_etablissement'));
        }

        return $this->render('TerraNovaBundle:Etablissement:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Etablissement entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:Etablissement')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Etablissement entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etablissement'));
    }

    public function chooseAction($id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $q = $qb->update('Terra\NovaBundle\Entity\User', 'u')
                ->set('u.etablissement', '?1')
                ->setParameter(1, $id)
                ->andWhere("u.id =".$user->getId()."")
                ->getQuery();
        $p = $q->execute();

        $url = $this->container->get('router')->generate('terra_nova_enseigant_index', array('user' => $user));
        return $response = new RedirectResponse($url);

    }

    /**
     * Creates a form to delete a Etablissement entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissement_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function activeAction($id)
    {  
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $q = $qb->update('Terra\NovaBundle\Entity\Etablissement', 'e')
                ->set('e.active', '?1')
                ->setParameter(1, $id)
                ->andWhere("e.id =".$id."")
                ->getQuery();
        $p = $q->execute();

        $url = $this->container->get('router')->generate('terra_nova_admin_etablissement_no_active');
        return $response = new RedirectResponse($url);
    }
}
