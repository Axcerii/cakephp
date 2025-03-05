<h1>Créer un post</h1>

<?= $this->Form->create($new) ?>
<?= $this->Form->control('title') ?>
<?= $this->Form->control('content') ?>
<?= $this->Form->control('user_id', ['options' => $usersList]) ?>

<?= $this->Form->button('Ajouter') ?>


<?= $this->Form->end() ?>