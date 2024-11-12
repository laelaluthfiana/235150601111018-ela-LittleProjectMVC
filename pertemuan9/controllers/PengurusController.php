<?php
session_start();

class PengurusController {
    private $dependency;

    public function __construct($pengurusModel) {
        $this->dependency = $dependency;
    }

    public function index() {
        echo "Ini adalah metode index di PengurusController.";
    }

    public function listProgramKerja() {
        // Pastikan variabel $programKerja terdefinisi
        $programKerja = []; // Ubah sesuai kebutuhan, misal mengambil data dari database
        require 'views/list_proker.php';
    }

    public function tambahProgramKerja() {
        // Tambahkan logic untuk menampilkan form tambah program kerja
        require 'views/tambah_proker.php';
    }
}
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->pengurusModel->register($name, $email, $password)) {
                header('Location: login_view.php');
                exit;
            }
        }
        require 'views/register_view.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->pengurusModel->login($email, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: list_proker.php');
                exit;
            }
        }
        require 'views/login_view.php';
    }

    public function logout() {
        session_destroy();
        header('Location: login_view.php');
    }

    public function index() {
        require_once 'views/list_proker.php';
        echo "Ini adalah metode index di PengurusController.";
    }

    public function add() {
        require_once 'views/add_proker.php';
    }

    public function update() {
        require_once 'views/edit_proker.php';
    }

    public function delete() {
        // Logika penghapusan di sini
    }
?>
