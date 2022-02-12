<?php
    require './classes/db.class.php';
    class Dashboard extends DB {
        public function isAdmin ($email) {
            $data = [
                'email' => $email,
            ];
            $sql = "SELECT * from user where email = :email";

            $statmemt = $this->pdo->prepare($sql);
            if ($statmemt->execute($data)){
                $user = $statmemt->fetch();
                if($user) {
                    if($user['isAdmin']){
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }
    }
?>