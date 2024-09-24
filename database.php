<?php 

class Database {

  public $pdo;

    public function __construct($db = "inlog", $user = "root", $pwd = "", $host = "localhost")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }

    public function insertInto($email, $wachtwoord) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $sql = "INSERT INTO userInformatie(email, wachtwoord) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $hashedPassword]);
        header("location:inlog.php");
      }
    }

    public function inlog($email, $wachtwoord) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        session_start();
        $sql = "SELECT * FROM userInformatie WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $storedInfo = $stmt->fetch();

        if (password_verify($wachtwoord, $storedInfo['wachtwoord'])) {
          $_SESSION['email'] = $email;
          echo " <br> U bent ingelogged";
          echo " <br> $email";
        } else {
          echo "<br> incorrect informatie";
        }
      }
    }

    public function uitloggen() {
      session_start();
      session_unset();
      session_destroy();

      header("location:inlog.php");
    }
}

$db = new Database();

?>