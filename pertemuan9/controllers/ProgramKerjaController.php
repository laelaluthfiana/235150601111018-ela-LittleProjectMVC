<?php
class ProgramKerjaController {
    private $programKerjaModel;

    public function __construct($programKerjaModel) {
        $this->programKerjaModel = $programKerjaModel;
    }

    public function list() {
        if (!isset($_SESSION['user'])) {
            header('Location: login_view.php');
            exit;
        }
        $programKerja = $this->programKerjaModel->getAllProgramKerja();
        require 'views/list_proker.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $this->programKerjaModel->addProgramKerja($name, $description, $date);
            header('Location: list_proker.php');
            exit;
        }
        require 'views/add_proker.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $this->programKerjaModel->updateProgramKerja($id, $name, $description, $date);
            header('Location: list_proker.php');
            exit;
        }
        require 'views/edit_proker.php';
    }

    public function delete($id) {
        $this->programKerjaModel->deleteProgramKerja($id);
        header('Location: list_proker.php');
    }
}
?>
