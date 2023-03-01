<?php

function login($users, $email, $pass)
{
      foreach ($users as $user) {
            if ($user->email == $email) {
                  if ($user->pass == $pass) {
                        $_SESSION["user"] = array(
                              "name" => $user->name,
                              "email" => $user->email
                        );
                        return 1;
                  } else
                        return 0;
            }
      }
      return -1;
}

function signup($users, $name, $email, $pass)
{
      $emailRegex = '/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/';
      foreach ($users as $user) {
            if ($user->email == $email) {
                  return -1;
            }
      }
      if (preg_match($emailRegex, $email)) {
            $user = $users->addChild('user');
            $user->addChild('name', $name);
            $user->addChild('email', $email);
            $user->addChild('pass', $pass);
            $_SESSION["user"] = array(
                  "name" => $name,
                  "email" => $email
            );
            var_dump($users);
            file_put_contents('../store/users.xml', $users->asXML());
            return 1;
      }
      return 0;
}

function logout()
{
      if (isset($_SESSION['user'])) {
            unset($_SESSION["user"]);
      }
}
