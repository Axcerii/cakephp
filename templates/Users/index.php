
<ul>
    <?php
        foreach($allUsers as $key => $user) {
    ?>

    <li> 
    <?= $this->Html->link($user->username, ['controller'=>'Users', 'action'=>'details', $user->id]) ?>
    </li>
    <?php 
            }
    ?>
</ul>   

<?= $this->Html->link('Créer un user', ['controller'=>'Users', 'action'=>'new'], ['class'=> "button"]) ?>
