# Trainingapp-Unittest

## Lunch tests

`$ vendor/phpunit/phpunit/phpunit Test/ClassnameTest.php`

### User class :

Les cas de tests :
* testIsValid : On vérifie si tout les paramètres sont validés
* testEmptyNameUser : On vérifie si le paramètre Name est vide
* testNullEmailUser : On vérifie si le paramètre Email est vide
* testAgeUnderTheerteen : On vérifie si le paramètre age est supérieur au nombre 30
* testInvalidMailUser : On vérifie si email n'est pas conforme au standard de la forme d'un e-mail
* testInvalidUserType : On vérifie le cas où l'userType, n'est pas conforme
* testEmptyUserType : On vérifie si userType est vide
* testValidUserType : On vérifie si userType est conforme aux standard attendu
* testEmptySchoolName : On vérifie si schoolName est vide
* testEmptyPromotion : On vérifie si promotion est vide
