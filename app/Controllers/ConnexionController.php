<?php


namespace App\Controllers;

use App\Models\Administrateur;
use App\Models\Contributeur;

class ConnexionController extends Controller {

    public function connexion() {
        $error = (int)htmlentities($_GET['error'] ?? 0);

        $msg_error = '';
        if ($error === 1) {
            $msg_error = 'Identifiant ou Mot de Passe incorrect';
        }

        return $this->view('connexion', [
            'title' => 'Connectez-vous',
            'msg_error' => $msg_error
        ]);
    }

    public function validation() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['username'] = $username;

        if (Administrateur::isConnected($username, $password)) {
            $_SESSION['auth'] = 'admin';
            return header('Location: '. SCRIPT_NAME .'/immersailles.php/admin');
        } else if (Contributeur::isConnected($username, $password)) {
            $_SESSION['auth'] = 'contributeur';
            return header('Location: '. SCRIPT_NAME .'/immersailles.php/contributeur');
        }
        return header('Location: '. SCRIPT_NAME .'/immersailles.php/connexion?error=1');
    }

    public function changePassword() {
        return $this->view('changePassword', [
            'title' => 'Changement de Mot de passe',
        ]);
    }

    public function forgotPassword() {
        return $this->view('forgotPassword', [
            'title' => 'Mot de pass oublié',
        ]);
    }

    public function logout() {
        session_destroy();
        return header('Location: '. SCRIPT_NAME .'/immersailles.php');
    }
}