<form action="<?php echo site_url('controlleur_user/traitement_inscription_client'); ?>" class="text-center" method="post">
    <div class="mb-3"><input class="form-control" type="nom" name="nom" value="wenzel" placeholder="Username"></div>
    <div class="mb-3"><input class="form-control" type="email" name="mail" value="wenzel@gmail.com" placeholder="Email"></div>
    <div class="mb-4"><input class="form-control" type="password" name="pswd" value="1234" placeholder="Password"></div>
    <div class="mb-3"><button class="btn d-block w-100" type="submit">Login</button></div>
</form>
<a href="<?php echo site_url('controlleur_user/vers_login_client'); ?>">J'ai déjà un compte</a>