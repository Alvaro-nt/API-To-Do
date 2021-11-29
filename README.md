# API To-Do List

This project contents an API to create a To-Do List, it will be divided in different versions. This project it's a practice, so it's not meant to be a full working project until last version.

## Starting 🚀

The project goal is acquiring experience with all the software used. As well as manage git to keep the project versioned, using tags.
_This API will work locally, no deploy will be done._

## Made with 🛠️

_The following software has been used to make this project_

* [PHP](https://www.php.net/manual/es/intro-whatis.php) - Programming Language
* [Symfony 5](https://symfony.es/) - Framework
* [Composer](https://getcomposer.org/) - Dependencies management
* [Docker](https://www.docker.com/) - To automatize deploy
* [API Platform](https://api-platform.com/) - Create API REST

## Versioning 📌

_Here you have an index of all the features, completed and future ones, on each versions. Each version correponds to a trimester_
* Version 1.0 ✅ ***Released!***
  * Create a To-Do event
  * Check it like finished
  * Check it like NOT finished
* Version 2.0  ✅ ***Released!***
  * Order by created date
  * Sort alphabetically
  * Filter by completed, pending, or all
  * Add category
  * Filter by category, in an independent view
* Version 3.0 ✅ ***Released!***
  * User management
  * User login with token
  * User persist
  * Password recovery management
* Version 4.0 ✅ ***Released!***
  * Dockerized project
* Version 5.0 ✅ ***Released!***
  * Design of an API REST to replace the functionalities of EasyAdmin
    * Use of [OpenApi](https://spec.openapis.org/oas/v3.1.0) as standard 
    * Use of [API Platform](https://symfony.com/doc/current/the-fast-track/es/26-api.html) to implement it
  * Implement the following services
    * getTask
    * addTask
    * updateTask
    * deleteDask
  * Implement of a login functionality in API Platform
* Version 6.0 ✅ ***Released!***
  * Add a custom [Symfony Form](https://symfony.com/doc/current/forms.html) to transfer task to another user
  * This form must be accessible from the task level, next to the task. (Extend from EasyAdmin)
  * The action of transfer a task must meet the following objectives
    * All users can transfer their task to another user
    * Task marked as finished can't be transferred
    * To transfer the task to another user, the receiver one can't have more than three active task
    * A task can't be transferred more than two times
* Version 7.0 🔜 ***Work In progress***
  * ¿?

## Author ✒️


* **Álvaro Miguel Lorente** - [AlvaroMLorente](https://github.com/AlvaroMLorente)
