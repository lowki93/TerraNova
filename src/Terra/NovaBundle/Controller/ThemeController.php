<?php

namespace Terra\NovaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Terra\NovaBundle\Entity\Theme;
use Terra\NovaBundle\Form\ThemeType;

/**
 * Theme controller.
 *
 */
class ThemeController extends Controller
{

    /**
     * Lists all Theme entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TerraNovaBundle:Theme')->findAll();

        return $this->render('TerraNovaBundle:Theme:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Theme entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Theme();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('theme'));
        }

        return $this->render('TerraNovaBundle:Theme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Theme entity.
    *
    * @param Theme $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Theme $entity)
    {
        $form = $this->createForm(new ThemeType(), $entity, array(
            'action' => $this->generateUrl('theme_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Theme entity.
     *
     */
    public function newAction()
    {
        $entity = new Theme();
        $form   = $this->createCreateForm($entity);

        return $this->render('TerraNovaBundle:Theme:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Theme entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Theme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Theme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Theme:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Theme entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Theme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Theme entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TerraNovaBundle:Theme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Theme entity.
    *
    * @param Theme $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Theme $entity)
    {
        $form = $this->createForm(new ThemeType(), $entity, array(
            'action' => $this->generateUrl('theme_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing Theme entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TerraNovaBundle:Theme')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Theme entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->preUpload();
            $em->flush();

            return $this->redirect($this->generateUrl('theme'));
        }

        return $this->render('TerraNovaBundle:Theme:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Theme entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TerraNovaBundle:Theme')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Theme entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('theme'));
    }

    /**
     * Creates a form to delete a Theme entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('theme_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function indexEnseignantAction()
    {
        $em = $this->getDoctrine()->getManager();

        $themes = $em->getRepository('TerraNovaBundle:Theme')->findAll();

        return $this->render('TerraNovaBundle:Enseignant:theme.html.twig', array(
            'themes' => $themes,
        ));
    }

    public function ShowEnseignantAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $theme = $em->getRepository('TerraNovaBundle:Theme')->find($id);
        $themes = $em->getRepository('TerraNovaBundle:Theme')->findAll();

        return $this->render('TerraNovaBundle:Enseignant:themeShow.html.twig', array(
            'theme' => $theme,
            'themes' => $themes
        ));
    }
}
