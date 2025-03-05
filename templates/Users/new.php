<h1>Créer un user</h1>

<?= $this->Form->create($new) ?>
<?= $this->Form->control('username') ?>
<?= $this->Form->control('password') ?>

<?= $this->Form->button('Ajouter') ?>


<?= $this->Form->end() ?>