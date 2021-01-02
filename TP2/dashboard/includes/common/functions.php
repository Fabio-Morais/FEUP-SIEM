<?php
function getImage($row)
{
    $avatar = "avatar.png";
    if (!isset($row['image'])) {
        if ($row['gender'] == 'f')
            $avatar = "avatarGirl.png";
    } else {
        $avatar = "users/" . $row['image'];
    }
    return $avatar;
}
?>