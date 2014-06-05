<?php

namespace Fractalia\Bundle\SMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fractalia\Bundle\SMSBundle\Entity\SMS;
use Fractalia\Bundle\SMSBundle\Form\SMSType;

/**
 * SMS controller.
 *
 * @Route("/sms")
 */
class SMSController extends Controller
{

    /**
     * Lists all SMS entities.
     *
     * @Route("/", name="sms")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FractaliaSMSBundle:SMS')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SMS entity.
     *
     * @Route("/", name="sms_create")
     * @Method("POST")
     * @Template("FractaliaSMSBundle:SMS:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SMS();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sms_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a SMS entity.
    *
    * @param SMS $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SMS $entity)
    {
        $form = $this->createForm(new SMSType(), $entity, array(
            'action' => $this->generateUrl('sms_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SMS entity.
     *
     * @Route("/new", name="sms_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SMS();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SMS entity.
     *
     * @Route("/{id}", name="sms_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FractaliaSMSBundle:SMS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SMS entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SMS entity.
     *
     * @Route("/{id}/edit", name="sms_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FractaliaSMSBundle:SMS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SMS entity.');
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
    * Creates a form to edit a SMS entity.
    *
    * @param SMS $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SMS $entity)
    {
        $form = $this->createForm(new SMSType(), $entity, array(
            'action' => $this->generateUrl('sms_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SMS entity.
     *
     * @Route("/{id}", name="sms_update")
     * @Method("PUT")
     * @Template("FractaliaSMSBundle:SMS:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FractaliaSMSBundle:SMS')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SMS entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sms_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SMS entity.
     *
     * @Route("/{id}", name="sms_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FractaliaSMSBundle:SMS')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SMS entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sms'));
    }

    /**
     * Creates a form to delete a SMS entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sms_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
