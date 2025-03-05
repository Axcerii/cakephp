<h1> <?= $post->title ?></h1>

<p> <?= $post->content ?> </p>

<br>
<h3>Comments</h3>
<?php
    foreach($post->comments as $comment) {
        echo "
        <div>
            <p> From : <strong>{$comment->user->username}</strong> </p>
            <p style='font-style:italic;'> {$comment->content} </p>
        </div>
        ";
    }
?>

<?= $this->Form->create($newComment) ?>
<?= $this->Form->control('content', ['label' => 'Votre commentaire']) ?>
<?= $this->Form->control('user_id', ['options' => $usersList]) ?>
<?= $this->Form->control('post_id', ['type' => 'hidden', 'value' => $post->id]) ?>
<?= $this->Form->button('Ajouter') ?>
<?= $this->Form->end() ?>
