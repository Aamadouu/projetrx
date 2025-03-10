<!-- fichier de test pas encore fini -->

<!-- <?php
        // Include database connection
        // include_once '../../config/database.php';
        include '../../config';

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document_id = $_POST['document_id'];
            $title = $_POST['title'];
            $content = $_POST['content'];

            // Update document in the database
            $query = "UPDATE documents SET title = :title, content = :content WHERE id = :document_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':document_id', $document_id);

            if ($stmt->execute()) {
                echo "Document updated successfully.";
            } else {
                echo "Error updating document.";
            }
        }

        // Fetch document details
        if (isset($_GET['id'])) {
            $document_id = $_GET['id'];
            $query = "SELECT * FROM documents WHERE id = :document_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':document_id', $document_id);
            $stmt->execute();
            $document = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modifier Document</title>
</head>

<body>
    <h1>Modifier Document</h1>
    <?php if (isset($document)): ?>
        <form method="post" action="">
            <input type="hidden" name="document_id" value="<?php echo $document['id']; ?>">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $document['title']; ?>" required>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required><?php echo $document['content']; ?></textarea>
            </div>
            <div>
                <button type="submit">Update Document</button>
            </div>
        </form>
    <?php else: ?>
        <p>Document not found.</p>
    <?php endif; ?>
</body>

</html> -->