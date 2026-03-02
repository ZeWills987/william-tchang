<div id="top" align="center">

# WILLIAM-TCHANG

*Empowering Innovation Through Seamless Digital Experiences*

![last-commit](https://img.shields.io/github/last-commit/ZeWills987/william-tchang?style=flat&logo=git&logoColor=white&color=0080ff)
![repo-top-language](https://img.shields.io/github/languages/top/ZeWills987/william-tchang?style=flat&color=0080ff)
![repo-language-count](https://img.shields.io/github/languages/count/ZeWills987/william-tchang?style=flat&color=0080ff)

*Built with the tools and technologies:*

![JSON](https://img.shields.io/badge/JSON-000000.svg?style=flat&logo=JSON&logoColor=white)
![npm](https://img.shields.io/badge/npm-CB3837.svg?style=flat&logo=npm&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630.svg?style=flat&logo=Composer&logoColor=white)
![XML](https://img.shields.io/badge/XML-005FAD.svg?style=flat&logo=XML&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white)
![Swiper](https://img.shields.io/badge/Swiper-6332F6.svg?style=flat&logo=Swiper&logoColor=white)
![YAML](https://img.shields.io/badge/YAML-CB171E.svg?style=flat&logo=YAML&logoColor=white)

</div>

---

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Testing](#testing)

---

## Overview



**Why William Tchang?**


---

## Getting Started

### Prerequisites

This project requires the following dependencies:

- **Programming Language** 

PHP > 7.*, Symfony, JavaScript and SASS

- **Package Manager** 

Npm, Composer

- **Database**

Mysql, Postgre or SQLite

### Installation

Build william-tchang from the source and install dependencies:

1. **Clone the repository :**
```
git clone https://github.com/ZeWills987/william-tchang
```

2. **Install the dependencies:**

Install **npm** dependencies with :
```
npm install
```

Install **composer** dependencies with :
```
composer install
```

### Usage

In first create the **.env** file in repository base thanks to this following example :
````
# In all environments, the following files are loaded if they exist,
# the latter taking precedence over the former:
#
#  * .env                contains default values for the environment variables needed by the app
#  * .env.local          uncommitted file with local overrides
#  * .env.$APP_ENV       committed environment-specific defaults
#  * .env.$APP_ENV.local uncommitted environment-specific overrides
#
# Real environment variables win over .env files.
#
# DO NOT DEFINE PRODUCTION SECRETS IN THIS FILE NOR IN ANY OTHER COMMITTED FILES.
# https://symfony.com/doc/current/configuration/secrets.html
#
# Run "composer dump-env prod" to compile .env files for production use (requires symfony/flex >=1.2).
# https://symfony.com/doc/current/best_practices.html#use-environment-variables-for-infrastructure-configuration

###> symfony/framework-bundle ###
APP_ENV=dev
APP_SECRET=
###< symfony/framework-bundle ###

###> doctrine/doctrine-bundle ###
# Format described at https://www.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html#connecting-using-a-url
# IMPORTANT: You MUST configure your server version, either here or in config/packages/doctrine.yaml
#
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data_%kernel.environment%.db"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=16&charset=utf8"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
###< doctrine/doctrine-bundle ###

###> symfony/messenger ###
# Choose one of the transports below
# MESSENGER_TRANSPORT_DSN=amqp://guest:guest@localhost:5672/%2f/messages
# MESSENGER_TRANSPORT_DSN=redis://localhost:6379/messages
MESSENGER_TRANSPORT_DSN=doctrine://default?auto_setup=0
###< symfony/messenger ###

###> symfony/mailer ###
MAILER_DSN=null://null
###< symfony/mailer ###

````

For .env file uncomment the database url choice you want (MySql,Postgre or SQLite) and complete information to connecte your app to database. For example :

I have a database name titi in the 127.0.0.1:3306 domain with the following user named toto with all rigth acces in titi database. For user password we have 'totoPass1234'. 

```
DATABASE_URL="mysql://toto:totoPass1234@127.0.0.1:3306/titi?serverVersion=16&charset=utf8"
```


**Developpement environnement :**

- using symfony
```
symfony serve 
```
 - or using php
```
php bin\console serve
```


**Production environnement (deploy) :** 

Point the domain point into the "william-tchang/public" repository.


Don't forget to compile the SASS app file to get all style sheet. 
````
php bin/console asset-map:compile
````
---

[⬆ Return](#top)
