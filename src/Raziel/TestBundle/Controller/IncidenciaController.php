<?php

namespace Raziel\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Raziel\TestBundle\Entity\Incidencia;
use Raziel\TestBundle\Form\IncidenciaType;

/**
 * Incidencia controller.
 *
 * @Route("/incidencia")
 */
class IncidenciaController extends Controller
{

    /**
     * Lists all Incidencia entities.
     *
     * @Route("/", name="incidencia")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('RazielBundle:Incidencia')->findAll();
        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Incidencia entity.
     *
     * @Route("/", name="incidencia_create")
     * @Method("POST")
     * @Template("RazielBundle:Incidencia:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $format = 'Y-m-d H:i:s';
        $entity = new Incidencia();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $now = new \DateTime();
            $entity->setFechaInsercion($now);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('incidencia_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Incidencia entity.
    *
    * @param Incidencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Incidencia $entity)
    {
        $form = $this->createForm(new IncidenciaType(), $entity, array(
            'action' => $this->generateUrl('incidencia_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Incidencia entity.
     *
     * @Route("/new", name="incidencia_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Incidencia();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RazielBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Incidencia entity.
     *
     * @Route("/{id}/edit", name="incidencia_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RazielBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
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
    * Creates a form to edit a Incidencia entity.
    *
    * @param Incidencia $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Incidencia $entity)
    {
        $form = $this->createForm(new IncidenciaType(), $entity, array(
            'action' => $this->generateUrl('incidencia_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_update")
     * @Method("PUT")
     * @Template("RazielBundle:Incidencia:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RazielBundle:Incidencia')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Incidencia entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('incidencia_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Incidencia entity.
     *
     * @Route("/{id}", name="incidencia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RazielBundle:Incidencia')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Incidencia entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('incidencia'));
    }

    /**
     * Creates a form to delete a Incidencia entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('incidencia_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
