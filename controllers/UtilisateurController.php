<?php
require_once '../models/ModelUtilisateur.php';

class UtilisateurController {
    private $model;

    public function __construct() {
        $this->model = new ModelUtilisateur();
    }

    public function index() {
        $utilisateurs = $this->model->read(); // Récupération des utilisateurs depuis le modèle
        include '../views/utilisateurs/index.php'; // Inclure la vue
    }
    

    public function create() {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naiss = $_POST['date_naiss'];
            $adresse = $_POST['adresse'];
            $mail = $_POST['mail'];
            $num_tel = $_POST['num_tel'];
            $statut = $_POST['statut'];
            $type = $_POST['type'];
            $this->model->create($nom, $prenom, $date_naiss, $adresse, $mail, $num_tel, $statut, $type);
            //header('Location: ../public/index.php');
        }else{
            include '../views/utilisateurs/add.php';
        }
    }

    public function update($id, $data) {
        $this->model->id = $id;
        $this->model->nom = $data['nom'];
        $this->model->prenom = $data['prenom'];
        $this->model->date_naiss = $data['date_naiss'];
        $this->model->adresse = $data['adresse'];
        $this->model->mail = $data['mail'];
        $this->model->num_tel = $data['num_tel'];
        $this->model->statut = $data['statut'];
        $this->model->type = $data['type'];
        return $this->model->update();
    }

    public function delete($id) {
        $this->model->id = $id;
        return $this->model->delete();
    }
}
?>
