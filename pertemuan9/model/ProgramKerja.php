<?php
class ProgramKerja {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllProgramKerja() {
        $query = "SELECT * FROM program_kerja";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll();
    }

    public function addProgramKerja($name, $description, $date) {
        $query = "INSERT INTO program_kerja (name, description, date) VALUES (:name, :description, :date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        return $stmt->execute();
    }

    public function updateProgramKerja($id, $name, $description, $date) {
        $query = "UPDATE program_kerja SET name = :name, description = :description, date = :date WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':date', $date);
        return $stmt->execute();
    }

    public function deleteProgramKerja($id) {
        $query = "DELETE FROM program_kerja WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
