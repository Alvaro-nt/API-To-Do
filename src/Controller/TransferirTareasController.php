<?php

namespace App\Controller;

use App\Entity\Tareas;
use App\Entity\User;
use App\Form\TaskTransferFormType;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransferirTareasController extends AbstractController
{
    /**
     * @Route("/taskTransfer/{id}/{end}", name="taskTransfer")
     */
    public function transfer(Request $request): Response
    {
        $form = $this->createForm(TaskTransferFormType::class);

        if ($request->isMethod('POST')) {

            $form->submit($request->request->get($form->getName()));


            if ($form->isSubmitted() && $form->isValid()) {

                $user = $form->getData();

                $comprobar = $this->getDoctrine()->getManager()->getRepository('App:User')->findOneBy(array('email' => $user['username']));

                if ($comprobar != NULL) {

                    // Obteniendo el id del usuario:

                    $id = $comprobar->getId();

                    // Hago esta consulta: SELECT count(*) FROM tareas WHERE id_usuario_id = 1 AND realizada = 0;

                    $q = $this->getDoctrine()->getManager()->getRepository('App:Tareas')->createQueryBuilder('tareas')
                        ->select('count(tareas.id)')
                        ->where('tareas.user = :id')
                        ->andWhere('tareas.realizada = false')
                        ->setParameter('id', $id)
                        ->getQuery()->getResult();

                    // Asigno a $q la cantidad de tareas sin completar que tiene el usuario

                    $q = $q[0][1];

                    if ($user['username'] === $comprobar->getUsername() && $request->attributes->get('end') == 'false' && $q < 3) {

                        // Compruebo que la tarea no ha sido transferida mas de 2 veces

                        $veces = $this->getDoctrine()->getManager()->getRepository('App:Tareas')->createQueryBuilder('tareas')
                            ->select('tareas.vecesTransferida')
                            ->where('tareas.id = '.$request->attributes->get('id'))
                            ->getQuery()->getResult();

                        $veces = $veces[0]['vecesTransferida'];

                        if ($veces < 2) {

                            $sumarVez = $this->getDoctrine()->getManager()->getRepository('App:Tareas')->createQueryBuilder('tareas')
                                ->update('App:Tareas', 'tareas')
                                ->set('tareas.vecesTransferida', 'tareas.vecesTransferida + 1')
                                ->where('tareas.id = ' .$request->attributes->get('id'))
                                ->getQuery()->getResult();

                            $cambiarTarea = $this->getDoctrine()->getManager()->getRepository('App:Tareas')->createQueryBuilder('tareas')
                                ->update('App:Tareas', 'tareas')
                                ->set('tareas.user', $id)
                                ->where('tareas.id = ' . $request->attributes->get('id'))
                                ->getQuery()->getResult();

                            return $this->redirectToRoute('admin');


                        } else {

                            $form->addError(new FormError("La tarea ha sido transferida dos veces o más veces."));
                        }

                    } else {

                        $form->addError(new FormError("La tarea está completada o el usuario tiene más de 3 tareas pendientes."));
                    }

                } else {

                    $form->addError(new FormError("Usuario no encontrado."));

                }
            }
        }

        return $this->render('taskTransfer/taskTransfer.html.twig', [
            'taskTransferForm' => $form->createView(),
        ]);
    }
}
