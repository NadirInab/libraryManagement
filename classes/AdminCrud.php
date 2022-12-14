
<?php

class AdminCrud {
    
    public static function addBook($bookData, $admin_id,$connection){
        $Book1 = new Book($bookData["title"], $bookData["type"],$bookData["image"], $bookData["publish_date"], $admin_id) ;
        $query = "INSERT INTO book(isbn,title,type,image,publish_date,admin_id) VALUES(:isbn, :title, :bookType,:image,:publish_date,:admin_id)" ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':isbn', $Book1->isbn) ;
        $stmt->bindParam(':title', $Book1->title);
        $stmt->bindParam(':bookType', $Book1->type);
        $stmt->bindParam(':image', $Book1->image) ;
        $stmt->bindParam(':publish_date', $Book1->publish_date) ;
        $stmt->bindParam(':admin_id', $Book1->admin_id) ;
        $stmt->execute() ;
    }

    public static function deleteBook($id, $connection){
        $query = "DELETE FROM book WHERE isbn = :isbn " ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':isbn', $id ) ;
        $stmt->execute();
        }

    public static function upDateBook($data, $connection){
        $query = "UPDATE book SET  title = :title, type = :bookType ,image = :image ,publish_date = :publish_date WHERE isbn = :isbn " ;
        $stmt = $connection->prepare($query) ;
        $stmt->bindParam(':isbn', $data["isbn"]);
        $stmt->bindParam(':title', $data["title"]);
        $stmt->bindParam(':bookType', $data["type"]);
        $stmt->bindParam(':image', $data["image"]) ;
        $stmt->bindParam(':publish_date', $data['publish_date']) ;
        $stmt->execute();
        }
}