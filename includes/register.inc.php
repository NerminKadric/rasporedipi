<?php
    require './classes/db.class.php';
    class Register extends DB {
        function registerUser ($fname, $lname, $email, $password, $username) {

            // $data = [
            //     'email' => $email,
            // ];
            // $sql = "SELECT * from user where email = :email";

            // $statmemt = $this->pdo->prepare($sql);

            $dataForSelect = [
                'email' => $email
            ];

            $sqlForSelect = "SELECT * from user where email = :email";

            $statmemtForSelect = $this->pdo->prepare($sqlForSelect);
            if($statmemtForSelect->execute($dataForSelect)) {
                $user = $statmemtForSelect->fetch();
                if ($user) {
                    return [
                        'status' => false,
                        'msg' => 'Racun sa navedenom email adresom vec postoji, molimo odaberite koristite drugi.'
                    ];
                } else {
                    $data = [
                        'email' => $email,
                        'password' => $password,
                        'fname' => $fname,
                        'lname' => $lname,
                        'username' => $username,
                    ];
                    $sql = "INSERT INTO user (fname, lname, email, password, username, isAdmin) VALUES (:fname, :lname, :email, :password, :username, 0)";
                    
                    $statmemt = $this->pdo->prepare($sql);
                    if ($statmemt->execute($data)) {
                        return [
                            'status'=> true,
                            'msg'=> 'Koristnik registrovan.'
                        ];
                    } else {
                        return [
                            'status' => true, 
                            'msg' => 'Korisnik nije registrovan.'
                        ];
                    }
                }
            }
        }
    }
?>