LightmakerComplexifyBundle
=========

[![Build Status](https://travis-ci.org/LightmakerCanada/ComplexifyBundle.svg)](https://travis-ci.org/LightmakerCanada/ComplexifyBundle)
[![Code Coverage](https://scrutinizer-ci.com/g/LightmakerCanada/ComplexifyBundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/LightmakerCanada/ComplexifyBundle/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LightmakerCanada/ComplexifyBundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LightmakerCanada/ComplexifyBundle/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/32d08283-d516-45b9-a283-f4ea95d989d0/mini.png)](https://insight.sensiolabs.com/projects/32d08283-d516-45b9-a283-f4ea95d989d0)
[![Latest Stable Version](https://poser.pugx.org/lightmaker/complexify-bundle/v/stable)](https://packagist.org/packages/lightmaker/complexify-bundle)
[![Total Downloads](https://poser.pugx.org/lightmaker/complexify-bundle/downloads)](https://packagist.org/packages/lightmaker/complexify-bundle)


A Symfony2 bundle for Michael Crumley's PHP port of Dan Palmer's jquery.complexify.js
- https://github.com/mcrumley/php-complexify/
- https://github.com/danpalmer/jquery.complexify.js/

## Installation

`composer require lightmaker/complexify-bundle`

### Update your Kernel

```php
# AppKernel.php
public function registerBundles() {
  $bundles = array(
    new Lightmaker\ComplexifyBundle\LightmakerComplexifyBundle()
  );
}
```

### Usage
You can use the `Lightmaker\ComplexifyBundle\Validator\Constraints\Complexify` constraint with the following options.

- message: The validation message (default: 'Password must be complex.')
- minimumChars: The minimum acceptable password length (default: 8)
- strengthScaleFactor: Scale the required password strength - higher numbers require a more complex password (default: 1)
- bannedPasswords: An array of banned passwords (Default: empty array)
- banMode: strict == don't allow substrings of banned passwords, loose == only ban exact matches (default: strict)
- encoding: (default: 'UTF-8')

The easiest way of adding a constraint to one of your entity classes is by using an annotation:

```php
    /**
     * Plain password. Used for model validation. Must not be persisted.
     *
     * @Complexify(
     *     message="This password is not complex enough."
     * )
     * @var string
     */
    protected $plainPassword;
```
