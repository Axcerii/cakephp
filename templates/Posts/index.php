
<ul>
    <?php
        foreach($allPosts as $key => $post) {
    ?>

    <li> 
    <?= $this->Html->link($post->title, ['controller'=>'Posts', 'action'=>'details', $post->id]) ?>
    </li>
    <?php 
            }
    ?>
</ul>   

<?= $this->Html->link('Créer un post', ['controller'=>'Posts', 'action'=>'new'], ['class'=> "button"]) ?>
