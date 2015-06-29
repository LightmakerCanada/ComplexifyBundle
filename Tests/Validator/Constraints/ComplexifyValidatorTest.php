<?php

namespace Lightmaker\ComplexifyBundle\Tests\Validator\Constraints;

use Lightmaker\ComplexifyBundle\Validator\Constraints\Complexify;
use Lightmaker\ComplexifyBundle\Validator\Constraints\ComplexifyValidator;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;

/**
 * Class ComplexifyValidatorTest
 *
 * @package Lightmaker\ComplexifyBundle\Tests\Validator\Constraints
 */
class ComplexifyValidatorTest extends AbstractConstraintValidatorTest
{

    /**
     * @return ComplexifyValidator
     */
    protected function createValidator()
    {
        return new ComplexifyValidator();
    }


    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', new Complexify());

        $this->assertNoViolation();
    }


    public function testNullIsValid()
    {
        $this->validator->validate(null, new Complexify());

        $this->assertNoViolation();
    }

    /**
     * @dataProvider getInvalidPasswords
     */
    public function testInvalidPasswords($password)
    {
        $constraint = new Complexify();

        $this->validator->validate($password, $constraint);

        $this->buildViolation('Password must be complex.')
             ->assertRaised();
    }

    /**
     * @return array
     */
    public function getInvalidPasswords()
    {
        return array(
            array("greg"),
            array("1234@abc"),
        );
    }

    public function testValidPassword()
    {
        $constraint = new Complexify();

        $this->validator->validate("ayfsbih@$#afhlj@$*", $constraint);

        $this->assertNoViolation();
    }

}