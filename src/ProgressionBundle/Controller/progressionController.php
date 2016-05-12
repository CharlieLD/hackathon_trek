<?php

namespace ProgressionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ProgressionBundle\Entity\progression;
use ProgressionBundle\Form\progressionType;

/**
 * progression controller.
 *
 */
class progressionController extends Controller
{
    /**
     * Lists all progression entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $progressions = $em->getRepository('ProgressionBundle:progression')->findAll();

        return $this->render('ProgressionBundle:progression:index.html.twig', array(
            'progressions' => $progressions,
        ));
    }

    /**
     * Creates a new progression entity.
     *
     */
    public function newAction(Request $request)
    {
        $progression = new progression();
        $form = $this->createForm('ProgressionBundle\Form\progressionType', $progression);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($progression);
            $em->flush();

            return $this->redirectToRoute('progression_show', array('id' => $progression->getId()));
        }

        return $this->render('ProgressionBundle:progression:new.html.twig', array(
            'progression' => $progression,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a progression entity.
     *
     */
    public function showAction(progression $progression)
    {
        $deleteForm = $this->createDeleteForm($progression);

        return $this->render('ProgressionBundle:progression:show.html.twig', array(
            'progression' => $progression,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing progression entity.
     *
     */
    public function editAction(Request $request, progression $progression)
    {
        $deleteForm = $this->createDeleteForm($progression);
        $editForm = $this->createForm('ProgressionBundle\Form\progressionType', $progression);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($progression);
            $em->flush();

            return $this->redirectToRoute('progression_edit', array('id' => $progression->getId()));
        }

        return $this->render('ProgressionBundle:progression:edit.html.twig', array(
            'progression' => $progression,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a progression entity.
     *
     */
    public function deleteAction(Request $request, progression $progression)
    {
        $form = $this->createDeleteForm($progression);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($progression);
            $em->flush();
        }

        return $this->redirectToRoute('progression_index');
    }

    /**
     * Creates a form to delete a progression entity.
     *
     * @param progression $progression The progression entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(progression $progression)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('progression_delete', array('id' => $progression->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
