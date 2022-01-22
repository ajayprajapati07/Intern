<?php
  $r="";
  $msg="";
  include "dbs.php";
  if(isset($_POST['submit'])) 
  {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $sql="INSERT INTO user (Name,Email,Phone) VALUES ('$name','$email','$phone');"; 
  $r=mysqli_query($con,$sql) or die("cannot insert data in database.".mysqli_error($con));
  if ($r) 
  {
   $msg="Submitted";
  }
  else
  {
   $msg="Error While Submitting Data";
  }
 
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Form</title>
    <style>
        .modal-header {
            background: #00FF7F;
            color: #fff;
        }
        
        .required:after {
            content: "*";
            color: red;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Contact Us</button>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contact Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                     <p style="font-size:16px; color:red; font-family:arial;" align="center"> 
                        <?php if($msg){echo $msg;} ?></p>
                    <div class="modal-body">
                        <form  action="xyz.php" method="post" id="idForm" >
                            <div class="mb-3">
                                <label class="form-label required">Name</label>
                                <input type="text" name="name"  pattern="[A-Za-z]{1,}+" placeholder="Enter Name" class="form-control" required>  
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Email</label>
                                <input type="email" name="email" pattern="[a-z0-9._%+-]+@gmail.com$" placeholder="Enter Email"  class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Contact</label>
                                <input type="text" name="phone" pattern="[0-9]{10}" placeholder="Phone" class="form-control" required>
                            </div>
                        
                            <div class="modal-footer">
                                <input type="hidden" name="submit1">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary"><!-- Submit</button> -->
                            <input type="reset" name="reset" value="Reset" class="btn btn-danger"><!-- Reset</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
<script type="text/javascript" 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
 $("#idForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

//     $.ajax({
//         type: "POST",
//         url: actionUrl,
//         data: form.serialize(), // serializes the form's elements.
//         success: function(data)
//         {
//             if(data==1)
//             {
//                 Swal.fire({
//                 icon: 'success',
//                 title: 'Submitted',
//                 text: 'Successfully Submitted',
//                 })
//                 $('#myModal').modal('toggle');
//             }
//             else
//             {
//                 Swal.fire({
//                 icon: 'error',
//                 title: 'Error',
//                 text: 'Something went wrong!',
// })
//             }
//           // show response from the php script.
//         }
//     });
    
    
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        // success: function(data, textStatus, errorThrown)
        success: function(data)
        {
          // console.log(data);
          // alert(textStatus);
          // console.log(errorThrown);
          // console.log(data.status);
          // return false;
            // if(data==1)
            // {
                Swal.fire({
                icon: 'success',
                title: 'Submitted',
                text: 'Successfully Submitted',
                })
                $('#myModal').modal('toggle');
            // }
            // else
            // {
                
            // }
          // show response from the php script.
        },

        error: function(data)
        {
          // console.log(data);
          // alert(textStatus);
          // console.log(errorThrown);
          Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Email Id already Exist!',
                })
        }
    });
    
});
</script>