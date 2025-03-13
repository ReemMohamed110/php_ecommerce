<?php
class Blog implements BlogInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    
    private function uploadImage($file) {
        $targetDir = "uploads/"; 
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); 
        }

        $fileName = time() . "_" . basename($file["name"]);
        $targetFilePath = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
                return $targetFilePath;
            }
        }
        return null;
    }


    public function create(array $data, $file) {
        $imagePath = $this->uploadImage($file);

        $sql = "INSERT INTO blogs (title, content, image) VALUES (:title, :content, :image)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':title'   => $data['title'],
            ':content' => $data['content'],
            ':image'   => $imagePath
        ]);
    }
    

    public function read(int $id) {
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function update(int $id, array $data, $file = null) {
        $imagePath = null;

        if ($file && $file['size'] > 0) {
            $imagePath = $this->uploadImage($file);
            
            $oldImage = $this->getImagePath($id);
            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        if ($imagePath) {
            $sql = "UPDATE blogs SET title = :title, content = :content, image = :image WHERE id = :id";
            $params = [':id' => $id, ':title' => $data['title'], ':content' => $data['content'], ':image' => $imagePath];
        } else {
            $sql = "UPDATE blogs SET title = :title, content = :content WHERE id = :id";
            $params = [':id' => $id, ':title' => $data['title'], ':content' => $data['content']];
        }

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete(int $id) {
    
        $imagePath = $this->getImagePath($id);


        $sql = "DELETE FROM blogs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([':id' => $id]);

        if ($result && $imagePath && file_exists($imagePath)) {
            unlink($imagePath);
        }

        return $result;
    }


    public function getAll() {
        $sql = "SELECT * FROM blogs";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getImagePath(int $id) {
        $sql = "SELECT image FROM blogs WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
        return $blog ? $blog['image'] : null;
    }
}