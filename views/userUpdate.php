<?php
/**
 * @var \app\modules\User $user
 */
?>
<div class="user">
    <h2>
        Edit User
    </h2>

    <form action="?c=user&a=update&id=<?=$user->id;?>" method="post">
        <p>Name <br>
            <input type="text" name="name" value="<?=$user->name;?>"></p>
        <p>Login <br>
            <input type="text" name="login" value="<?=$user->login;?>"></p>
        <p>Password <br>
            <input type="text" name="password"></p>
        <input type="submit" value="Sent">
    </form>

</div>