<?php
session_start();

function validate_name($sessionName, $name)
{
    if (!empty($name)) {
        $_SESSION[$sessionName] = $name;
        if (!preg_match("/^[A-Z a-z]{3,30}$/", $name)) {
            $_SESSION['nameError'] = "Invalid Name, Only Alphabets are allowed. should be minimum of 3 letters and maximum of 30 letters long.";
            return false;
        } else {
            return true;
        }
    } else {
        $_SESSION['nameError'] = "Name can't be empty";
        return false;
    }
}

function validate_username($sessionName, $name)
{
    if (!empty($name)) {
        $_SESSION[$sessionName] = $name;
        if (!preg_match("/^[A-Za-z0-9]{3,30}$/", $name)) {
            $_SESSION['usernameError'] = "Invalid username, Only Alphabets & digits are allowed. should be minimum of 3 charecter and maximum of 30 character long.";
            return false;
        } else {
            return true;
        }
    } else {
        $_SESSION['usernameError'] = "Name can't be empty";
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
