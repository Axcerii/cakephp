
<ul>
    <?php
        foreach($allComments as $key => $comment) {
    ?>

    <li> 
    <?= $this->Html->link($comment->user->username, ['controller'=>'Comments', 'action'=>'details', $comment->id]) ?>
    </li>
    <?php 
            }
    ?>
</ul>   

