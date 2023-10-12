<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>
<body>



        <form action="" method="post">

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
        <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="+123456789">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>


        <div>
            <?php 
            
            if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $phone = $_POST['phone'];
            }

                //Initialize

                $test = new Test($email, $phone);
               echo $test->getEmail()."<br>";
               echo $test->getPhone()."<br>";




            class Test{
                public $email = "";
                public $phone = "";
                public function __construct($email, $phone){
                    $this->email = $email;
                    $this->phone = $phone;
                }

                public function getEmail(){
                    return $this->email;
                }
                public function getPhone(){
                    return $this->phone;
                }
            }




            ?>
        </div>
</body>
</html>
