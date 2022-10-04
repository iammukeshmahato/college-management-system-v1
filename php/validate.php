<?php
session_start();
function validate_name($name)
{
    if (!empty($name)) {
        $_SESSION['inputStdName'] = $name;
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

function validate_ParentName($name)
{
    if (!empty($name)) {
        $_SESSION['inputStdParentName'] = $name;
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


// function validate_phone($phone)
// {
//     if (!preg_match("/^9[678]{1}[0-9]{8}$", $phone)) {
//         $_SESSION['phoneError'] = "Invalid Phone Number, Must be 10 digit.";
//     }
// }

function validate_phone($phone)
{
    if (!empty($phone)) {
        $_SESSION['inputStdPhone'] = $phone;
        if (!preg_match("/^9[678]{1}[0-9]{8}$/", $phone)) {
            $_SESSION['phoneError'] = "Invalid phone number, Must be 10 digits.";
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
        if (preg_match("/<script>/", $input)) {
            return preg_replace("/<script>/", "", $input);
        } else {
            return $input;
        }
    }
}
