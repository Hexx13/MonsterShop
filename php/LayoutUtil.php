<?php


class LayoutUtil
{

    public static function createLabel($detail){
        echo "<label>";
            echo $detail;
        echo "</label>";
    }

    public static function createAccountDetailForm($action, $detail, $name, $label){
        echo '<form action="';
        echo $action;
        echo '" method="post">';
        echo self::createLabel($label);
        echo '<label>';
            echo $detail."  ";
            echo '</label>';
            echo'<input type="text" name="';
            echo $name;
            echo '">';

            echo'<input type="submit" value="change" name="submit">';
            echo'<br>';
        echo'</form>';
    }


}