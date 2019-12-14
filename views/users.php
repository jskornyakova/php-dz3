<?php
/**
 * @var \app\modules\User [] $users ...*/

foreach ($users as $user) {
    echo "<h1>{$user->login}</h1>";
}