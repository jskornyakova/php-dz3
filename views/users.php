<div class="adduser">
    <a href="/?c=user&a=add">Add new user</a>
</div>
<div class="users">
<?php
/**
 * @var \app\modules\User [] $users ...*/

foreach ($users as $user) {
    echo "<h1>{$user->login}</h1>
    <a href='/?c=user&a=one&id={$user->id}'>More detailed</a>";
}
?>
</div>
