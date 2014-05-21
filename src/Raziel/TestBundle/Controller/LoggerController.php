<?php

namespace Raziel\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Raziel\TestBundle\Entity\Logger;
use Raziel\TestBundle\Form\LoggerType;

/**
 * Logger controller.
 *
 * @Route("/logger")
 */
class LoggerController extends Controller
{

    /**
     * Lists all Logger entities.
     *
     * @Route("/", name="logger")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RazielBundle:Logger')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Logger entity.
     *
     * @Route("/", name="logger_create")
     * @Method("POST")
     * @Template("RazielBundle:Logger:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Logger();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('logger_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Logger entity.
    *
    * @param Logger $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Logger $entity)
    {
        $form = $this->createForm(new LoggerType(), $entity, array(
            'action' => $this->generateUrl('logger_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Logger entity.
     *
     * @Route("/new", name="logger_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Logger();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Logger entity.
     *
     * @Route("/{id}", name="logger_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RazielBundle:Logger')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logger entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Logger entity.
     *
     * @Route("/{id}/edit", name="logger_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RazielBundle:Logger')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logger entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Logger entity.
    *
    * @param Logger $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Logger $entity)
    {
        $form = $this->createForm(new LoggerType(), $entity, array(
            'action' => $this->generateUrl('logger_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Logger entity.
     *
     * @Route("/{id}", name="logger_update")
     * @Method("PUT")
     * @Template("RazielBundle:Logger:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RazielBundle:Logger')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logger entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('logger_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Logger entity.
     *
     * @Route("/{id}", name="logger_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RazielBundle:Logger')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Logger entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('logger'));
    }

    /**
     * Creates a form to delete a Logger entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('logger_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
