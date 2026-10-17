<?php
// validation.php - every regex lives here.
// Each function returns an error message, or "" if the value is valid.

function validateEmail($email) {
    if ($email === "") return "Email is required.";
    if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email))
        return "Enter a valid email like abc@gmail.com.";
    return "";
}

function validateMobile($mobile) {
    if ($mobile === "") return "Mobile is required.";
    if (!preg_match('/^[0-9]{14}$/', $mobile))
        return "Mobile must be exactly 14 digits.";
    return "";
}

function validateName($name, $label) {
    if ($name === "") return "$label is required.";
    if (!preg_match('/^[A-Za-z]+$/', $name))
        return "$label must contain letters only.";
    return "";
}
