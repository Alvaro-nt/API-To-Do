<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\TaskTransferFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransferirTareasController extends AbstractController
{
    /**
     * @Route("/transferir/tareas", name="transferir_tareas")
     */
    public function new(Request $request): Response
    {

        $form = $this->createForm(TaskTransferFormType::class);

        if ($request->isMethod('POST')) {

            $form->submit($request->request->get($form->getName()));
            if ($form->isSubmitted() && $form->isValid()) {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $user = $form->getData();

                // ... perform some action, such as saving the task to the database
                // for example, if Task is a Doctrine entity, save it!
                $entityManager = $this->getDoctrine()->getManager()->getRepository('App:User')->findOneBy(array('username' => $user['username']));

                return $this->redirectToRoute('admin');
            }
        }

        return $this->render('tranferir_tareas/index.html.twig', [
            'taskTransferForm' => $form->createView(),
        ]);
    }
}
