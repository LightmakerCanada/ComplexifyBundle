<?php


namespace Lightmaker\ComplexifyBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Complexify
 *
 * @package Lightmaker\ComplexifyBundle\Validator\Contraints
 */
class Complexify extends Constraint
{
    public $message = 'Password must be complex.';

    public $minimumChars        = 8; // the minimum acceptable password length
    public $strengthScaleFactor = 1; // scale the required password strength (higher numbers require a more complex password)
    public $bannedPasswords     = []; // override the default banned password list
    public $banMode             = 'strict'; // strict == don't allow substrings of banned passwords, loose == only ban exact matches
    public $encoding            = 'UTF-8';
}
