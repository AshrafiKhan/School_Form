<?php
include ("connection.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    // INSERT INTO `student` (`srno`, `fname`, `lname`, `age`, `contact`, `email`, `address`) VALUES (NULL, 'Rahul', 'Mishra', '12', '9856743210', 'rahulmishra@gmail.com', 'gsddr,hdch dfcjffvgy');

    $query="INSERT INTO `student` (`srno`, `fname`, `lname`, `age`, `contact`, `email`, `address`) VALUES (NULL, '$fname', '$lname', '$age', '$contact', '$email', '$address')";
    $data=mysqli_query($conn,$query);
    if($data){
       // echo "Student Added";
       //Display Student data
       $qdisplay="SELECT * FROM student";
       $display=mysqli_query($conn,$qdisplay);

       $total=mysqli_num_rows($display);
       $result=mysqli_fetch_assoc($display);

       if($total!=0){
           echo "<h3>Student Details</h3>";
           ?>
           <table border="2px">
                <tr>
                <th>Sr. No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Contact No.</th>
                <th>Email Address</th>
                <th>Address</th>
                <th>Action</th>
                </tr>
                <?php
                while($result=mysqli_fetch_assoc($display)){
                    echo "<tr>
                            <td>".$result['srno']."</td>
                            <td>".$result['fname']."</td>
                            <td>".$result['lname']."</td>
                            <td>".$result['age']."</td>
                            <td>".$result['contact']."</td>
                            <td>".$result['email']."</td>
                            <td>".$result['address']."</td>
                            <td><a href='update_student.php?id=$result[srno]&fn=$result[fname]&ln=$result[lname]&age=$result[age]&c' target='blank'>Update</a></td>
                        </tr>";
                }
                ?>
            </table>
            <?php
           
       }
       else{
           echo "No Record Found";
       }

    }
    else{
        echo "No Student added";
    }
}
else{
    echo "Fail to add student";
}
?>