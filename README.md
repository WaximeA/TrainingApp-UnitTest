# TrainingApp-UnitTest

## Lunch tests

`$ vendor/phpunit/phpunit/phpunit Test/ClassnameTest.php`

### Test case

#### User

* testIsValid : Check si tous les paramètres sont valides
* testEmptyNameUser : Check si le paramètre Name est vide
* testNullEmailUser : Check si le paramètre Email est vide
* testAgeUnderTheerteen : Check si l'utilisateur a plus de 13 ans
* testInvalidMailUser : Check si email n'est pas conforme à la regex d'un e-mail
* testEmptySchoolName : Check si schoolName est vide
* testEmptyPromotion : Check si promotion est vide
* testPromotionIsNotValidBecauseOfTeacher : Check que la promotion n'est pas valide lorsque l'on a professeur
* testPromotionIsNotValidBecauseOfMissingPromotion : Check que la promotion n'est pas valide lorsqu'elle est manquante
* testPromotionIsValidForStudent : Check que la promotion est valide lorsque l'on a le bon étudiant

#### Masterclass

* testIsValid : Check si tous les paramètres sont valides
* testisNotValidDateBecauseOfStartDateInPast : Check si la date de début est passée
* testisNotValidDateBecauseOfInversedDates : Check si les date de début et de fin sont inversées dans le temps
* testIsNotValidBecauseOfWrongCapacity : Check si non valide à cause d'une mauvaise capacité
* testIfMockedUserIsValid : Check si le user mocké est valide
* testJoinMasterclassSuccess : Check si l'on peut rejoindre la masterclass
* testJoinMasterclassFailBecauseOfWrongStudent :  Check si l'on ne peut pas rejoindre la masterclass à cause d'un élève invalide
* testJoinMasterclassFailBecauseOfIsTeacher : Check si l'on ne peut pas rejoindre la masterclass à cause d'un professeur
