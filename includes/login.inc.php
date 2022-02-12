<?php
    require './classes/db.class.php';
    require './includes/console.inc.php';

    class Login extends DB {
        public function loginUser ($email, $userPassword) {
            $data = [
                'email' => $email,
            ];
            $sql = "SELECT * from user where email = :email";

            $statmemt = $this->pdo->prepare($sql);
            if ($statmemt->execute($data)) {
                $user = $statmemt->fetch();
                if ($user) {
                    $this->print($user['password']);
                    $this->print($userPassword);
                    if($user['password'] === $userPassword) {
                        return [
                            'status' => true,
                            'msg' => 'Tacna sifra',
                            'user' => $user
                        ];
                    } else {
                        return [
                            'status' => false,
                            'msg' => 'Lozinka nije tacna.'
                        ];
                    }
                } else {
                    return [
                        'status' => false,
                        'msg' => 'Korisnicki racun sa navedenom email adresom nije pronadjen.'
                    ];
                }
            } 
        }
        
    }
?>