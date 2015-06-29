<?php


namespace Lightmaker\ComplexifyBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Complexify\Complexify as PhpComplexify;


/**
 * Class ComplexifyValidator
 *
 * @package Lightmaker\ComplexifyBundle\Validator\Constraints
 */
class ComplexifyValidator extends ConstraintValidator
{
    /**
     * @param mixed                 $password
     * @param Complexify|Constraint $constraint
     */
    public function validate($password, Constraint $constraint)
    {

        if (!is_null($password) && !empty($password)) {
            $check = new PhpComplexify(
                array(
                    $constraint->minimumChars,
                    $constraint->strengthScaleFactor,
                    $constraint->bannedPasswords,
                    $constraint->banMode,
                    $constraint->encoding,
                )
            );

            $result = $check->evaluateSecurity($password);

            if (!$result->valid) {
                $this->context->addViolation($constraint->message);
            }
        }

    }

}
