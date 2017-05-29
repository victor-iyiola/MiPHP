<h3> User Registration Form </h3>
<form action="" method="POST" class="form">
  <ul>
    <li>
      <label for="fullname">Fullname</label>
      <input type="text" name="fullname" id="fullname" value="<?= preserveInputs('fullname'); ?>">
    </li>
    <li>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?= preserveInputs('email'); ?>">
    </li>
    <li>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="<?= preserveInputs('password'); ?>">
    </li>
    <li>
      <input type="submit" value="Sign up" class="btn btn-outline-secondary">
    </li>
  </ul>
  <?php if ( isset($this->status) ): ?>
    <p class="error"><?= $this->status; ?></p>
  <?php endif; ?>
</form>