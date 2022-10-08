<?php
session_start();

function validate_name($sessionName, $name)
{
    if (!empty($name)) {
        $_SESSION[$sessionName] = $name;
        if (!preg_match("/^[A-Z a-z]+$/", $name)) {
            $_SESSION['nameError'] = "Invalid Name, Only Alphabets are allowed.";
            return false;
        } else {
            return true;
        }
    } else {
        $_SESSION['nameError'] = "Name can't be empty";
        return false;
    }
}

function validate_ParentName($sessionName, $name)
{
    if (!empty($name)) {
        $_SESSION[$sessionName] = $name;
        if (!preg_match("/^[A-Z a-z]+$/", $name)) {
            $_SESSION['ParentNameError'] = "Invalid Parent's Name, Only Alphabets are allowed.";
            return false;
        } else {
            return true;
        }
    } else {
        $_SESSION['ParentNameError'] = "Parent's Name can't be empty";
        return false;
    }
}

function validate_email($sessionName, $email)
{
    if (!empty($email)) {
        $_SESSION[$sessionName] = $email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailError'] = "must include '@' and '.'";
            return false;
        } else {
            return true;
        }
    } else {
        $_SESSION['emailError'] = "Email can't be empty";
        return false;
    }
}

//work remaining not finished yet
// function validate_address($address){
//     if (!empty($address)) {
//         if (!preg_match("/^[A-Z a-z]+$/", $address)) {
//             $_SESSION['addressError'] = "Invalid Address, Can't start with symbols";
//             $_SESSION['inputStdAddress'] = $address;
//             return false;
//         } else {
//             return true;
//         }
//     } else {
//         $_SESSION['addressError'] = "Address can't be empty";
//         return false;
//     }
// }


function validate_phone($sessionName, $phone)
{
    if (!empty($phone)) {
        $_SESSION[$sessionName] = $phone;
        if (!preg_match("/^9[678]{1}[0-9]{8}$/", $phone)) {
            $_SESSION['phoneError'] = "Invalid phone number, Only digits are allowed and Must be 10 digits.";
            return false;
        } else {
            return true;
        }
    } else {
        $_SESSION['phoneError'] = "phone number can't be empty";
        return false;
    }
}

function validate_script($input)
{
    if (!empty($input)) {

        // if (preg_match("/<script>/", $input)) {
        //     $checked = preg_replace("/<script>/", "", $input);
        //     // return preg_replace("/<script>/", "", $input);
        // } elseif (preg_match("/<\/script>/", $input)) {
        //     return preg_replace("/<\/script>/", "", $input);
        // } elseif (preg_match("/</", $input)) {
        //     return preg_replace("/</", "", $input);
        // } elseif (preg_match("/>/", $input)) {
        //     return preg_replace("/>/", "", $input);
        // } else {
        //     return $input;
        // }


        if (!preg_match("/<script>/", $input) && !preg_match("/</", $input)) {
            return $input;
        } else {
            $checked = preg_replace("/<script>/", "", $input);
            $checked = preg_replace("/<\/script>/", "", $checked);
            $checked = preg_replace("/</", "", $checked);
            $checked = preg_replace("/>/", "", $checked);
            return $checked;
        }
    }
}
