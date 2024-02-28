<?php
class Blog {
    private $posts = [];

    public function addPost(Post $post) {
        $this->posts[$post->getId()] = $post;
    }

    public function deletePost($postId) {
        if (isset($this->posts[$postId])) {
            unset($this->posts[$postId]);
            return true;
        }
        return false;
    }

    public function getPost($postId) {
        return isset($this->posts[$postId]) ? $this->posts[$postId] : null;
    }

    public function getAllPosts() {
        return $this->posts;
    }
}

// Приклад використання
$blog = new Blog();

// Створення нового посту
$post1 = new Post(1, "Перший пост", "Це контент першого посту.", date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
$blog->addPost($post1);

// Редагування посту
$postToUpdate = $blog->getPost(1);
if ($postToUpdate) {
    $postToUpdate->setTitle("Новий заголовок посту");
    $postToUpdate->setContent("Оновлений контент посту.");
    $postToUpdate->setUpdatedAt(date('Y-m-d H:i:s'));
}

// Видалення посту
$blog->deletePost(1);

// Отримання всіх постів
$posts = $blog->getAllPosts();
foreach ($posts as $post) {
    echo "ID: " . $post->getId() . "<br>";
    echo "Title: " . $post->getTitle() . "<br>";
    echo "Content: " . $post->getContent() . "<br>";
    echo "Created At: " . $post->getCreatedAt() . "<br>";
    echo "Updated At: " . $post->getUpdatedAt() . "<br><br>";
}
?>