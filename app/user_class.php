<?php
use DatabaseManager\DatabaseManager;
class User implements userInterface {
    private $db;
    private $id;
    private $name;
    private $phone;
    private $email;
    private $password;
    private $gender;
    private $role;
    private $code;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct() {
        $this->db = DatabaseManager::getConnection();
    }

    public function create($name, $email, $phone, $password, $gender, $role) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, phone, password, gender, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssss", $name, $email, $phone, $hashed_password, $gender, $role);
        $stmt->execute();
        $stmt->close();
        $_SESSION['user_email'] = $email;
    }
 
    
    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_email'] = $email;
            return $user;
        } else {
            return false;
        }
    }

    public function update($id, $name, $phone, $gender) {
        $query = "UPDATE users SET name = ?, phone = ?, gender = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $name, $phone, $gender, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function forgetPassword($email) {
        $token = bin2hex(random_bytes(32)); 
        $expires_at = date("Y-m-d H:i:s", time() + 3600);

        $query = "UPDATE users SET token = ?, token_expires_at = ? WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sss", $token, $expires_at, $email);
        $stmt->execute();
        $stmt->close();

        return $token; 
    }

    
    public function verifyToken($token) {
        $query = "SELECT * FROM users WHERE token = ? AND token_expires_at > NOW()";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user ? $user['email'] : false; 
    }

   
    public function updatePasswordWithToken($token, $new_password) {
        $email = $this->verifyToken($token);
        if (!$email) {
            return false; 
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = ?, token = NULL, token_expires_at = NULL WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();
        $stmt->close();

        return true; 
       }
}


// relative path -> read => not fixed 
// , absoult path -> read & write => fixed path
// include_once 'config/database.php';
// include_once 'database/interface.php';
// include_once 'database/DatabaseManager.php';

// class User  implements userInterface
// {
//     public $db;
//     private $id;
//     private $name;
//     private $phone;
//     private $email;
//     private $password;
//     private $gender;
//     private $role;
//     private $code;
//     private $status;
//     private $created_at;
//     private $updated_at;
//     public function __construct()
//     {
//         return $this->db = DatabaseManager::getConnection();
//     }
//     public function getId()
//     {
//         return $this->id;
//     }
//     public function getName()
//     {
//         return $this->name;
//     }


//     public function setName($name)
//     {
//         $this->name = $name;

//         return $this;
//     }

//     public function getPhone()
//     {
//         return $this->phone;
//     }

//     public function setPhone($phone)
//     {
//         $this->phone = $phone;

//         return $this;
//     }


//     public function getEmail()
//     {
//         return $this->email;
//     }


//     public function setEmail($email)
//     {
//         $this->email = $email;

//         return $this;
//     }


//     public function getPassword()
//     {
//         return $this->password;
//     }


//     public function setPassword($password)
//     {
//         $this->password = sha1($password);

//         return $this;
//     }

//     public function getGender()
//     {
//         return $this->gender;
//     }


//     public function setGender($gender)
//     {
//         $this->gender = $gender;

//         return $this;
//     }


//     public function getCode()
//     {
//         return $this->code;
//     }


//     public function setCode($code)
//     {
//         $this->code = $code;

//         return $this;
//     }


//     public function getStatus()
//     {
//         return $this->status;
//     }


//     public function setStatus($status)
//     {
//         $this->status = $status;

//         return $this;
//     }

//     public function getRole()
//     {
//         return $this->role;
//     }

//     public function setRole($role)
//     {
//         $this->role = $role;

//         return $this;
//     }

//     public function getCreated_at()
//     {
//         return $this->created_at;
//     }


//     public function setCreated_at($created_at)
//     {
//         $this->created_at = $created_at;

//         return $this;
//     }


//     public function getUpdated_at()
//     {
//         return $this->updated_at;
//     }


//     public function setUpdated_at($updated_at)
//     {
//         $this->updated_at = $updated_at;

//         return $this;
//     }

//     public function create($name, $email, $phone, $password, $gender, $role)
//     {
//         $q = "INSERT INTO users (name,email,phone,password,gender,role) 
//          VALUES (:name,:email,:phone,:password,:gender,:role)";
//         $sql = $this->db->prepare($q);
//         $sql->execute([
//             'name' => $name,
//             'email' => $email,
//             'phone' => $phone,
//             'password' => password_hash($password,PASSWORD_DEFAULT),
//             'gender' => $gender,
//             'role' => $role

//         ]);
//         $_SESSION['user_email']=$email;
        // $query = "INSERT INTO users (first_name,last_name,email,phone,password,gender,code) 
        // VALUES ('$this->first_name','$this->last_name','$this->email','$this->phone',
        // '$this->password','$this->gender',$this->code)";
      /*   // return $this->runDML($query);
    }
    
    public function update()
    { */
        // $image = NULL;
        // if(!empty($this->image)){
        //     $image = " , image = '$this->image' ";
        // }
        // $query = "UPDATE users SET first_name = '$this->first_name' , last_name = '$this->last_name' ,
        //  phone = '$this->phone' , gender = '$this->gender' $image WHERE email = '$this->email'";
        //  return $this->runDML($query);
    //}
    // public function logout()
    // {
    //     unset($_SESSION['user_email']);
    // }

    // public function checkCode()
    // {
    //     $query = "SELECT * FROM `users` WHERE email = '$this->email' AND code = $this->code";
    //     return $this->runDQL($query);
    // }
   // public function forgetPassword(){
    // $q = "SELECT * FROM users WHERE email = ?";
    // $sql = $this->db->prepare($q);
    // $sql->execute([$email]);
    // $user = $sql->fetch(PDO::FETCH_ASSOC);

    // if ($user && password_verify($password, $user['password'])) {
    //     return $user;
    // } else {
    //     return false;
    // }
   // }
    
  /*   public function login($email, $password)
{
    $q = "SELECT * FROM users WHERE email =:email";
    $sql = $this->db->prepare($q);
    $sql->execute(['email' => $email]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_email']=$email;
        return $user;
    } else {
        return false;
    }
}
 */

   /*  public function getUserByEmail()
    {
        $query = "SELECT * FROM users WHERE email = '$this->email' AND status in(0,1)";
       return $this->runDQL($query);
     }
 */
    // public function updateCodeByEmail()
    // {
    //     $query = "UPDATE `users` SET code = $this->code WHERE email = '$this->email' ";
    //     return $this->runDML($query);
    // }

    // public function updatePasswordByEmail()
    // {
    //     $query = "UPDATE `users` SET password = '$this->password' WHERE email = '$this->email' ";
    //     return $this->runDML($query);
    // }}







