<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class EntityController extends Controller
{
    public function Index($controller, $action = 'index')
    {
        switch($controller){
            case 'user':
                switch($action){
                    case 'index':
                        $users = array();
                        $db = new \mysqli('sql5.freemysqlhosting.net', 'sql583155', 'sG8*xT8*', 'sql583155');
                        $result = $db->query('select * from users');
                        while($row = $result->fetch_object()){
                            $users[] = $row;
                        }
                        $db->close();

                        $html = '<ul>';
                        foreach($users as $user){
                            $html .= '<li>' . $user->FirstName . ' ' . $user->LastName . '</li>';
                        }
                        $html .= '</ul>';

                        return $html;
                }
                return;
        }

        return "Controller <b>" . $controller . "</b> and action <b>" . $action . "</b> is under construction!";//view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
