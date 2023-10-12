<?php
//include 'Database.php';
class RegistrationForm 
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function create($data) {
        try{
        $sql = "INSERT INTO registrationform (Applicant_Name, Applicant_Age, Applicant_CNIC, CellNo, Email, Address) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$data['Applicant_Name'], $data['Applicant_Age'], $data['Applicant_CNIC'], $data['CellNo'], $data['Email'], $data['Address']];
        $stmt = $this->db->executeQuery($sql, $params);
        $stmt->close();
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
    }

    public function list() 
    {
       
        $result =$this->db->getAll("SELECT * FROM `registrationform`");
        
        return $result;
    }
    public function getData($id) 
    {
        $result =$this->db->getAll("SELECT * FROM `registrationform` WHERE id ='$id'");
        
        return $result;
    }
    public function read($id) {
        $sql = "SELECT * FROM registrationform WHERE id = ?";
        $stmt = $this->db->executeQuery($sql, [$id]);
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    public function update($id, $data) 
    {
        $sql = "UPDATE registrationform SET Applicant_Name = ?, Applicant_Age = ?, Applicant_CNIC = ?, CellNo = ?, Email = ?, Address = ? WHERE id = ?";
        $params = [$data['Applicant_Name'], $data['Applicant_Age'], $data['Applicant_CNIC'], $data['CellNo'], $data['Email'], $data['Address'], $id];
        $stmt = $this->db->executeQuery($sql, $params);
        $stmt->close();
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM registrationform WHERE id = ?";
        $stmt = $this->db->executeQuery($sql, [$id]);
        $stmt->close();
    }
}

