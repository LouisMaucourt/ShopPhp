<form action="/exam/handlers/createLogin.php" method="post">
  <div>
    <label for="email">Mail : </label>
    <input type="email" id="email" name="email" size="30" required />
  </div>
  <div>
      <label for="password">Password (4 characters minimum):</label>
      <input type="password" id="password" name="password" minlength="4" required />
  </div>
  <button type="submit" value="login" >Envoyer</button>
</form>