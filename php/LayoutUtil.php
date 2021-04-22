<?php


class LayoutUtil
{

    public static function createLabel($detail){
        echo "<label>";
            echo $detail;
        echo "</label>";
    }

    public static function createAccountDetailForm($action, $detail, $name){
        echo '<form action="';
        echo $action;
        echo '" method="post">';
            echo '<label>Username:</label>';
            echo self::createLabel($detail);
            echo'<input type="text" name="';
            echo $name;
            echo '">';

            echo'<input type="submit" value="change" name="submit">';
            echo'<br>';
        echo'</form>';
    }


}