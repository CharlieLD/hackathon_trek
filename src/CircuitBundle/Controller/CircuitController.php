<?php

namespace CircuitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CircuitBundle\Entity\Circuit;
use CircuitBundle\Form\CircuitType;
use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Vendor\autoload;

/**
 * Circuit controller.
 *
 *
 */
class CircuitController extends Controller
{
    /**
     * Lists all Circuit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $circuits = $em->getRepository('CircuitBundle:Circuit')->findAll();

        // Language of data (try your own language here!):
        $lang = 'fr';

        // Units (can be 'metric' or 'imperial' [default]):
        $units = 'metric';

        // Create OpenWeatherMap object.
        // Don't use caching (take a look into Examples/Cache.php to see how it works).
        $owm = new OpenWeatherMap('0df17ea554ebe14617d1fd046e544a81');

        try {
            $weather = $owm->getWeather('Bordeaux', $units, $lang);
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }
        //$weather->city->lat=3;
        //var_dump($weather);
        echo $weather->temperature;

        return $this->render('CircuitBundle:circuit:index.html.twig', array(
            'circuits' => $circuits,
            'weather' => $weather,




        //return $this->render('CircuitBundle:circuit:index.html.twig', array(
           // 'circuits' => $circuits,
        ));
    }

    /**
     * Creates a new Circuit entity.
     *
     */
    public function newAction(Request $request)
    {
        $circuit = new Circuit();
        $form = $this->createForm('CircuitBundle\Form\CircuitType', $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($circuit);
            $em->flush();

            return $this->redirectToRoute('circuit_show', array('id' => $circuit->getId()));
        }

        return $this->render('CircuitBundle:circuit:new.html.twig', array(
            'circuit' => $circuit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Circuit entity.
     *
     */
    public function showAction(Circuit $circuit)
    {
        $deleteForm = $this->createDeleteForm($circuit);

        return $this->render('CircuitBundle:circuit:show.html.twig', array(
            'circuit' => $circuit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Circuit entity.
     *
     */
    public function editAction(Request $request, Circuit $circuit)
    {
        $deleteForm = $this->createDeleteForm($circuit);
        $editForm = $this->createForm('CircuitBundle\Form\CircuitType', $circuit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($circuit);
            $em->flush();

            return $this->redirectToRoute('circuit_edit', array('id' => $circuit->getId()));
        }

        return $this->render('CircuitBundle:circuit:edit.html.twig', array(
            'circuit' => $circuit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Circuit entity.
     *
     */
    public function deleteAction(Request $request, Circuit $circuit)
    {
        $form = $this->createDeleteForm($circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($circuit);
            $em->flush();
        }

        return $this->redirectToRoute('circuit_index');
    }

    /**
     * Creates a form to delete a Circuit entity.
     *
     * @param Circuit $circuit The Circuit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Circuit $circuit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('circuit_delete', array('id' => $circuit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
