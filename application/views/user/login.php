<h3> User Login </h3>
<form class="form" action="" method="POST">
  <ul>
    <li>
      <label for="username">Username: </label>
      <input type="text" name="username" id="username" value="<?= preserveInputs('username'); ?>">
    </li>
    <li>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" value="<?= preserveInputs('password'); ?>">
    </li>
    <li>
      <input type="submit" value="Login" class="btn btn-outline-secondary">
    </li>
  </ul>
  <?php if ( isset($this->status) ): ?>
    <p class="error"> <?= $this->status; ?></p>
  <?php endif; ?>
</form>