<?php

include 'Database.php';
//requireだと、エラーがあるとコードのrunningがストップしてしまう。includeよりもよりstrict

class User extends Database{
        
        public function createUser($first_name, $last_name, $username, $password){
            $sql ="INSERT INTO users (first_name,last_name, username, `password`)
            VALUES ('$first_name', '$last_name', '$username', '$password')";
            // passwordに``（back quoteまたはbacktick)をつけるのは、mysql-のあらかじめ用意されたコマンドではなく、ただの単語（コラム名としてのpassword）である事を示すため。

            if($this->conn->query($sql)){ 
                //データをSQlに追加するのに成功したら
                header("location: ../views/index.php");
                //.. 意味は go out of the current folder and go to views folder 
                exit;

            }else{    
                die('Error adding user: '.$this->conn->error);
            }
        
        }
        
    public function login($username, $password){
                $sql ="SELECT * FROM users WHERE username ='$username'";

            // find user ind database
        if($result = $this->conn->query($sql)){
                    //if query is ok, check if user is found
                if($result->num_rows == 1){
                            //userの該当者が一人いる（＝該当する行が１行ある） 

                            $user_data = $result->fetch_assoc();
                                
                                //check password
                                if(password_verify($password, $user_data['password'])){
                                    //password_verify は　built-in function

                                    //log in (save SESSION variables)
                                    session_start();

                                    $_SESSION['user_id'] = $user_data['id'];
                                    $_SESSION['username'] = $user_data['username'];

                                    header("location: ../views/dashboard.php");
                                    exit;

                                }else{ //passwordが正しくなければ
                                    die("Incorrect password");
                                }
                    }else{
                        die("User not found");
                    }
        }else{
                die("error retrieving user: ". $this->conn->error);
            }// end of if($result = $this->conn->query($sql)){
    } //end of public function login($username, $password)


    public function getUsers(){
            $sql = "SELECT * FROM users";

            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die("Error retrieving users: " . $this->conn->error); 
            }
        }

    public function getUser($id){
            $sql = "SELECT * FROM users WHERE id = $id";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc(); //first row from the result
            }else{
                die("Error retrieving user: " .$this->conn->error);
            }
        }


        public function updateUser($first_name, $last_name,$username, $id){
            $sql = "UPDATE users SET
                    first_name = '$first_name',
                    last_name = '$last_name',
                    username = '$username'
                    WHERE id = $id";

            if($this->conn->query($sql)){ //id this query was executed successfully
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error updating user: " . $this->conn->error);
            }        
        }


        public function deleteUser($id){
            $sql = "DELETE FROM users WHERE id =$id";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error deleting user: " .$this->conn->error);
            }
        }    


        public function uploadPhoto($id, $filename, $temp_name){
            $sql = "UPDATE users SET 
                    photo = '$filename'
                    WHERE id =$id";

                    if($this->conn->query($sql)){
                        $destination ="../images/$filename";

                        if(move_uploaded_file($temp_name,$destination)){ //temporary folder から最終目的のフォルダへ
                            header("location: ../views/profile.php");
                            exit;
                        }else{
                            die("Error moving file");
                        }

                    }else{
                        die("Error updating photo: " .$this->conn->error);
                    }
        }


}//end of class User

?>