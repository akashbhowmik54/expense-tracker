<?php

use Core\Controller;

class DashboardController extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /auth/login");
            exit;
        }

        $this->view('dashboard/index');
    }
}
