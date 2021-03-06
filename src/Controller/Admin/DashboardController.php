<?php

namespace App\Controller\Admin;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Tareas;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */

    public function index(): Response
    {
        if ($this->getUser() === NULL) {

            return $this->redirect('login');
        }

        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(TareasCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('API To Do');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToRoute('Pagina principal', 'fas fa-home', 'homepage');
        yield MenuItem::section('Usuarios')->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-user', User::class)->setPermission('ROLE_ADMIN');

        yield MenuItem::section('Tareas');
        yield MenuItem::linkToCrud('To-Do', 'fas fa-clipboard-list', Tareas::class);

        yield MenuItem::linkToLogout('Logout', 'fa fa-sign-out');

    }
}
