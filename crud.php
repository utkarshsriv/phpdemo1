<?php
  
  class crud{
        
    public $db;
    
public function __construct($conn){
$this->db=$conn;
}

public function insert($name,$class,$subject){

$query="insert into students (name,class,subject) values (?,?,?)";
$stmt=$this->db->prepare($query);
$stmt->bindparam(1,$name);
$stmt->bindparam(2,$class);
$stmt->bindparam(3,$subject);
$res=$stmt->execute();
if($res){
echo"inserted successfully";
}else{
    echo "something went wrong";
}
}
  
public function show()
{
    $query="select * from students";
    $stmt=$this->db->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        # code...
        while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['class']?></td>
                    <td><?php echo $row['subject']?></td>
                    <td><a href="delete1.php?id=<?php echo $row['id'] ?>" class="btn btn-primary" >Delete</a></td>
                    <td><a href="edit1.php?id=<?php echo $row['id'];?>" class="edit btn btn-primary">Edit</a></td>
                    
                </tr>
        <?php


    }
    }
  }
  public function delete($id){
    $query="delete from students where id=$id";
    $stmt=$this->db->prepare($query);
    $stmt->execute();
    if ($stmt->execute()) {
        # code...
        echo "deleted successfully";
    
    }else{
        echo "not deleted";
    }
  }
  public function update($id,$name,$class,$subject){
    $query= "update students set name=:name,class=:class,subject=:subject where id=:id ";

    $stmt=$this->db->prepare($query);
    $result=array(
        ':name'=>$name,
        ':class'=>$class,
        ':subject'=>$subject,
        ':id'=>$id,
      );
    $stmt->execute($result);
    if ($stmt->execute($result)) {
        # code...
        return true;
    }else{
        return false;
    }
    
  }
}
?>